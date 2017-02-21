<?php
namespace kpi\models;

use Yii;
use yii\base\Model;
use kpi\models\KpiSumTmp;
use kpi\models\KpiSum;
use kpi\models\KpiList;
/**
 *
 */
class KpiCsvImport extends Model
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

        $con = mysqli_connect("localhost", "root", "zjkowfh!@#"); //zjkowfh!@#
//        mysqli_select_db($con, "kpi");

        if ($con){
          if (!mysqli_select_db($con, 'kpi')) die("MySQLi Select Error: ".mysqli_error($con));
        }else die("MySQLi Connect Error: ".mysqli_error($con));


        $this->table_name = 'kpi_sum_'. \Yii::$app->user->identity->getId();

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
            $res = mysqli_query($con,"TRUNCATE `".$this->table_name."`;");

            $sql = "LOAD DATA LOCAL INFILE '".mysqli_escape_string($con, $this->file_name).
                "' REPLACE INTO TABLE `".$this->table_name.
                "` FIELDS TERMINATED BY '".mysqli_escape_string($con, $this->field_separate_char).
                "' OPTIONALLY ENCLOSED BY '".mysqli_escape_string($con, $this->field_enclose_char)."' ".
                $escape_char_cmd.
//                " LINES TERMINATED BY '\\r\\n'".
                ($this->use_csv_header ? " IGNORE 1 LINES " : "")
                ."(`".implode("`,`", $this->arr_csv_columns)."`)";
            $res = mysqli_query($con,$sql);// @mysqli_query($sql);


            //KpiSumTmp::tableName($this->table_name);



            //$this->sql_str = $sql;
            $this->error = mysqli_error($con);


            $tmp_data = KpiSumTmp::find()->all() ;



            foreach ($tmp_data as $data) {
                //$kpi_sum = KpiSum::find()->where(['hospcode' => $data->hospcode, 'kpi_year' => $data->kpi_year, 'kpi_no' => $data->kpi_no])->one();


                if (($kpi_list = KpiList::findOne([ 'kpi_year' => $data->kpi_year, 'kpi_no' => $data->kpi_no])) !== null) {



                if (($kpi_sum = KpiSum::findOne(['hospcode' => $data->hospcode, 'kpi_year' => $data->kpi_year, 'kpi_no' => $data->kpi_no])) !== null) {
//                    return $kpi_sum;
                } else {
                    $kpi_sum = new KpiSum();

                    $kpi_sum->hospcode = $data->hospcode;
                    $kpi_sum->kpi_year = $data->kpi_year;
                    $kpi_sum->kpi_no = $data->kpi_no;
                    $kpi_sum->kpi_id = $kpi_list->id;
                }



                    $kpi_sum->kpi_provcode = $data->kpi_provcode ;

                    $kpi_sum->kpi_a_value = $data->kpi_fixed_a_value;
                    $kpi_sum->kpi_b_value = $data->kpi_fixed_b_value;
                    $kpi_sum->kpi_c_value = $data->kpi_fixed_c_value;
                    $kpi_sum->kpi_d_value = $data->kpi_fixed_d_value;
                    $kpi_sum->kpi_e_value = $data->kpi_fixed_e_value;
                    $kpi_sum->kpi_f_value = $data->kpi_fixed_f_value;


                    $kpi_sum->kpi_a_value_q1 = $data->kpi_a_value_q1;
                    $kpi_sum->kpi_a_value_q2 = $data->kpi_a_value_q2;
                    $kpi_sum->kpi_a_value_q3 = $data->kpi_a_value_q3;
                    $kpi_sum->kpi_a_value_q4 = $data->kpi_a_value_q4;

                    $kpi_sum->kpi_b_value_q1 = $data->kpi_b_value_q1;
                    $kpi_sum->kpi_b_value_q2 = $data->kpi_b_value_q2;
                    $kpi_sum->kpi_b_value_q3 = $data->kpi_b_value_q3;
                    $kpi_sum->kpi_b_value_q4 = $data->kpi_b_value_q4;

                    $kpi_sum->kpi_c_value_q1 = $data->kpi_c_value_q1;
                    $kpi_sum->kpi_c_value_q2 = $data->kpi_c_value_q2;
                    $kpi_sum->kpi_c_value_q3 = $data->kpi_c_value_q3;
                    $kpi_sum->kpi_c_value_q4 = $data->kpi_c_value_q4;

                    $kpi_sum->kpi_d_value_q1 = $data->kpi_d_value_q1;
                    $kpi_sum->kpi_d_value_q2 = $data->kpi_d_value_q2;
                    $kpi_sum->kpi_d_value_q3 = $data->kpi_d_value_q3;
                    $kpi_sum->kpi_d_value_q4 = $data->kpi_d_value_q4;

                    $kpi_sum->kpi_e_value_q1 = $data->kpi_e_value_q1;
                    $kpi_sum->kpi_e_value_q2 = $data->kpi_e_value_q2;
                    $kpi_sum->kpi_e_value_q3 = $data->kpi_e_value_q3;
                    $kpi_sum->kpi_e_value_q4 = $data->kpi_e_value_q4;

                    $kpi_sum->kpi_f_value_q1 = $data->kpi_f_value_q1;
                    $kpi_sum->kpi_f_value_q2 = $data->kpi_f_value_q2;
                    $kpi_sum->kpi_f_value_q3 = $data->kpi_f_value_q3;
                    $kpi_sum->kpi_f_value_q4 = $data->kpi_f_value_q4;

                    $kpi_sum->update_by = \Yii::$app->user->identity->getId();

                    $kpi_sum->validate();

                    if ($kpi_sum->save()) {
                        $data->status = 'Success: ';
                    } else {
                        $data->status = 'Error: ';
                    }
                    $data->save();


                $this->table_name .= $data->hospcode;
            }
        }

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
        $sql = "CREATE TABLE IF NOT EXISTS `".$this->table_name."` (
	`hospcode` varchar(5) NOT NULL,
	`kpi_year` varchar(4) NOT NULL,
	`kpi_no` varchar(5) NOT NULL,
	`kpi_provcode` varchar(2) NOT NULL,
	`kpi_fixed_a_value` decimal(10,2) DEFAULT NULL,
    `kpi_fixed_b_value` decimal(10,2) DEFAULT NULL,
    `kpi_fixed_c_value` decimal(10,2) DEFAULT NULL,
    `kpi_fixed_d_value` decimal(10,2) DEFAULT NULL,
    `kpi_fixed_e_value` decimal(10,2) DEFAULT NULL,
    `kpi_fixed_f_value` decimal(10,2) DEFAULT NULL,
	`kpi_a_value_q1` decimal(11,2) DEFAULT NULL,
	`kpi_b_value_q1` decimal(11,2) DEFAULT NULL,
	`kpi_c_value_q1` decimal(11,2) DEFAULT NULL,
	`kpi_d_value_q1` decimal(11,2) DEFAULT NULL,
	`kpi_e_value_q1` decimal(10,2) DEFAULT NULL,
	`kpi_f_value_q1` decimal(10,2) DEFAULT NULL,
	`kpi_a_value_q2` decimal(11,2) DEFAULT NULL,
	`kpi_b_value_q2` decimal(11,2) DEFAULT NULL,
	`kpi_c_value_q2` decimal(11,2) DEFAULT NULL,
	`kpi_d_value_q2` decimal(11,2) DEFAULT NULL,
	`kpi_e_value_q2` decimal(10,2) DEFAULT NULL,
	`kpi_f_value_q2` decimal(10,2) DEFAULT NULL,
	`kpi_a_value_q3` decimal(11,2) DEFAULT NULL,
	`kpi_b_value_q3` decimal(11,2) DEFAULT NULL,
	`kpi_c_value_q3` decimal(11,2) DEFAULT NULL,
	`kpi_d_value_q3` decimal(11,2) DEFAULT NULL,
	`kpi_e_value_q3` decimal(10,2) DEFAULT NULL,
	`kpi_f_value_q3` decimal(10,2) DEFAULT NULL,
	`kpi_a_value_q4` decimal(11,2) DEFAULT NULL,
	`kpi_b_value_q4` decimal(11,2) DEFAULT NULL,
	`kpi_c_value_q4` decimal(11,2) DEFAULT NULL,
	`kpi_d_value_q4` decimal(11,2) DEFAULT NULL,
	`kpi_e_value_q4` decimal(10,2) DEFAULT NULL,
	`kpi_f_value_q4` decimal(10,2) DEFAULT NULL,
	`status` varchar(255) DEFAULT NULL,
	PRIMARY KEY (`hospcode`, `kpi_year`, `kpi_no`)
) ENGINE=`MyISAM` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ROW_FORMAT=DYNAMIC COMMENT='' CHECKSUM=0 DELAY_KEY_WRITE=0;";


        $res = mysqli_query($con, $sql);
        $this->sql_str = $sql;
        $this->error = mysqli_error($con);
        $this->table_exists = ""==mysqli_error($con);

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