<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 *
 */
class CsvImport extends Model
{
    public $userfile;
    public $use_csv_header; //use first line of file OR generated columns names
    public $field_separate_char; //character to separate fields
    public $field_enclose_char; //character to enclose fields, which contain separator char into content
    public $field_escape_char;  //char to escape special symbols
    public $encoding; //encoding table, used to parse the incoming file. Added in 1.5 version
    public $table_name;
    public $file_name;
    public $error; //error message
    public $arr_csv_columns; //array of columns
    public $table_exists; //flag: does table for import exist
    public $sql_str;


    public function rules()
    {
        return [
            [['userfile'], 'safe'],
            [['userfile'], 'file', 'checkExtensionByMimeType' => false, 'extensions' => 'zip,csv', 'skipOnEmpty' => false],
            [['use_csv_header', 'field_separate_char', 'field_enclose_char', 'field_escape_char', 'encoding'], 'string'],


        ];
    }


    public function import()
    {

        $con = mysqli_connect("203.157.133.5", "root", "NewzjkowfhFvg8");

        if ($con){
            if (!mysqli_select_db($con, 'kpi')) die("MySQLi Select Error: ".mysqli_error($con));
        }else die("MySQLi Connect Error: ".mysqli_error($con));


        if($this->table_name=="")
            $this->table_name = "temp_".date("d_m_Y_H_i_s");

        $this->table_exists = false;
        $this->create_import_table($con);

        //if(empty($this->arr_csv_columns))
        $this->get_csv_header_fields($con);

        /* change start. Added in 1.5 version */
        if("" != $this->encoding && "default" != $this->encoding)
            $this->set_encoding($con);
        /* change end */

        $escape_char_cmd = '';
        if ($this->field_escape_char != "") {
            $escape_char_cmd = "' ESCAPED BY '".mysqli_escape_string($con, $this->field_escape_char. "' ");
        }

        if($this->table_exists)
        {
            $sql = "LOAD DATA LOCAL INFILE '".mysqli_escape_string($con, $this->file_name).
                "' REPLACE INTO TABLE `".$this->table_name.
                "` FIELDS TERMINATED BY '".mysqli_escape_string($con, $this->field_separate_char).
                "' OPTIONALLY ENCLOSED BY '".mysqli_escape_string($con, $this->field_enclose_char)."' ".
                $escape_char_cmd.
//                " LINES TERMINATED BY '\\r\\n'".
                ($this->use_csv_header ? " IGNORE 1 LINES " : "")
                ."(`".implode("`,`", $this->arr_csv_columns)."`)";
            $res = mysqli_query($con,$sql);// @mysqli_query($sql);

//            $connection=Yii::app()->db;
//            $transaction=$connection->beginTransaction();
//            try
//            {
//
//                $connection->createCommand($sql)->execute();
//                $transaction->commit();
//            }
//            catch(Exception $e) // an exception is raised if a query fails
//            {
//                print_r($e);
//                exit;
//                $transaction->rollBack();
//
//            }

            $this->sql_str = $sql;
            $this->error = mysqli_error($con);
        }
    }

    //returns array of CSV file columns
    public function get_csv_header_fields($con)
    {
        $this->arr_csv_columns = array();
        $fpointer = fopen($this->file_name, "r");
        if ($fpointer)
        {
            $arr = fgetcsv($fpointer, 10*1024, $this->field_separate_char);
            if(is_array($arr) && !empty($arr))
            {
                if($this->use_csv_header)
                {
                    foreach($arr as $val)
                        if(trim($val)!="")
                            $this->arr_csv_columns[] = str_replace("\"","",preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $val)) ;
                }
                else
                {
                    $i = 1;
                    foreach($arr as $val)
                        if(trim($val)!="")
                            $this->arr_csv_columns[] = "column".$i++;
                }
            }
            unset($arr);
            fclose($fpointer);
        }
        else
            $this->error = "file cannot be opened: ".(""==$this->file_name ? "[empty]" : mysqli_escape_string($con, $this->file_name));
        return $this->arr_csv_columns;
    }

    public function create_import_table($con)
    {
        $sql = "CREATE TABLE IF NOT EXISTS ".$this->table_name." (";

        if(empty($this->arr_csv_columns))
            $this->get_csv_header_fields($con);

        if(!empty($this->arr_csv_columns))
        {
            $arr = array();
            for($i=0; $i<sizeof($this->arr_csv_columns); $i++)
                $arr[] = "`".$this->arr_csv_columns[$i]."` TEXT";
            $sql .= implode(",", $arr);
            $sql .= ")";
            $res = mysqli_query($con, $sql);
            $this->sql_str = $sql;
            $this->error = mysqli_error($con);
            $this->table_exists = ""==mysqli_error($con);
        }

    }

    /* change start. Added in 1.5 version */
    //returns recordset with all encoding tables names, supported by your database
    public function get_encodings($con)
    {
        $rez = array();
        $sql = "SHOW CHARACTER SET";
        $res = mysqli_query($con, $sql);
        if(mysql_num_rows($res) > 0)
        {
            while ($row = mysqli_fetch_assoc ($res))
            {
                $rez[$row["Charset"]] = ("" != $row["Description"] ? $row["Description"] : $row["Charset"]); //some MySQL databases return empty Description field
            }
        }
        return $rez;
    }

    //defines the encoding of the server to parse to file
    public function set_encoding($con, $encoding="")
    {
        if("" == $encoding)
            $encoding = $this->encoding;
        $sql = "SET SESSION character_set_database = " . $encoding; //'character_set_database' MySQL server variable is [also] to parse file with rigth encoding
        $res = mysqli_query($con, $sql);
        return mysqli_error($con);
    }
    /* change end */

    public function delete_files($target)
    {
        if (is_dir($target)) {
            $files = glob($target . '*', GLOB_MARK); //GLOB_MARK adds a slash to directories returned

            foreach ($files as $file) {
                $this->delete_files($file);
            }

            if (is_dir($target)) {rmdir($target);}
        } elseif (is_file($target)) {
            unlink($target);
        }
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userfile' => 'CSV',
            'use_csv_header' => 'Use Column Header',
            'field_separate_char' => 'Separate Character',
            'field_enclose_char' => 'Enclose Character',
            'field_escape_char' => 'Escape Character',
            'encoding' => 'Encoding',
        ];
    }

}



?>