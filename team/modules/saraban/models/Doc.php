<?php

namespace app\modules\saraban\models;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;

/**
 * This is the model class for table "doc".
 *
 * @property integer $id
 * @property string $ref
 * @property string $subject
 * @property string $description
 * @property integer $doc_no
 * @property string $doc_date
 * @property string $type
 * @property integer $from
 * @property string $to
 * @property string $status
 * @property integer $urgent
 * @property integer $secret
 * @property string $doc_file
 * @property string $attach_files
 * @property integer $user_id
 * @property string $remark
 * @property string $date_create
 * @property string $last_update
 */
class Doc extends \yii\db\ActiveRecord
{
    const UPLOAD_FOLDER = 'docs';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject', 'doc_no', 'from', 'doc_date', 'to'], 'required'],
            [['doc_no', 'description', 'status'], 'string'],
            [['from', 'urgent', 'secret', 'user_id'], 'integer'],
            [['date_create', 'last_update'], 'safe'],
            [['doc_date'], 'safe'],
            [['to', 'remark'], 'string'],
            [['ref'], 'string', 'max' => 50],
            [['subject'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 16],
            [['doc_file'],'file','maxFiles'=>1],
            [['attach_files'],'file','maxFiles'=>10,'skipOnEmpty'=>true]
        ];
    }


    public function beforeSave($insert) {
        if ($insert == true) {
//                $this->date_create = date('Y-m-d h:i:sa');
                $this->user_id = \Yii::$app->user->identity->id;
            return true;
        }

        return parent::beforeSave($insert);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ref' => 'Ref',
            'subject' => 'เรื่อง',
            'doc_no' => 'เลขที่หนังสือ',
            'doc_date' => 'วันที่หนังสือ',
            'type' => 'ประเภทหนังสือ',
            'from' => 'จาก',
            'to' => 'ถึง',
            'urgent' => 'ระดับความเร่งด่วน',
            'secret' => 'ระดับความลับ',
            'doc_file' => 'ไฟล์หนังสือ (pdf เท่านั้น)',
            'attach_files' => 'เอกสารแนบ (ถ้ามี)',
            'user_id' => 'User ID',
            'remark' => 'หมายเหตุ',
            'date_create' => 'วันที่สร้าง',
            'last_update' => 'วันที่ปรับปรุงล่าสุด',
            'description' => 'รายละเอียด'
        ];
    }

    public static function formatBytes($bytes, $precision = 2) {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');


            $bytes = max($bytes, 0);
            $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
            $pow = min($pow, count($units) - 1);

            // Uncomment one of the following alternatives
            // $bytes /= pow(1024, $pow);
            $bytes /= (1 << (10 * $pow));

            return round($bytes, $precision) . ' ' . $units[$pow];



    }

    public static function getUploadPath(){
        return Yii::getAlias('@webroot').'/'.self::UPLOAD_FOLDER.'/';
    }

    public static function getUploadUrl(){
        return Url::base(true).'/'.self::UPLOAD_FOLDER.'/';
    }

    public function listDownloadFiles($type){
        $docs_file = '';
        if(in_array($type, ['attach_files','doc_file'])){
            $data = $type==='attach_files'?$this->attach_files:$this->doc_file;
            $files = Json::decode($data);
            if(is_array($files)){
                $docs_file ='<ul class="list-unstyled list-attachments">';
                foreach ($files as $key => $value) {
                    $docs_file .= '<li>'.Html::a('<i class="fa fa-file-pdf-o"></i> '.$value[0]. ' ('.$this->formatBytes($value[1]) .')',['/saraban/doc/download','id'=>$this->id,'file'=>$key,'file_name'=>$value[0]]).'</li>';
                }
                $docs_file .='</ul>';
            }
        }

        return $docs_file;
    }

    public function listFilesUrl($type){
        $docs_file = '';
        if(in_array($type, ['attach_files','doc_file'])){
            $data = $type==='attach_files'?$this->attach_files:$this->doc_file;
            $files = Json::decode($data);
            if(is_array($files)){
                foreach ($files as $key => $value) {
                    $docs_file = Yii::$app->urlManager->createAbsoluteUrl(['/saraban/doc/download', 'id'=>$this->id,'file'=>$key,'file_name'=>$value[0]]);
                }
            }
        }

        return $docs_file;
    }

    public function initialPreview($data,$field,$type='file'){
        $initial = [];
        $files = Json::decode($data);
        if(is_array($files)){
            foreach ($files as $key => $value) {
                if($type=='file'){
                    $initial[] = "<div class='file-preview-other'><h2><i class='glyphicon glyphicon-file'></i></h2></div>";
                }elseif($type=='config'){
                    $initial[] = [
                        'caption'=> $value,
                        'width'  => '120px',
                        'url'    => Url::to(['/saraban/doc/deletefile','id'=>$this->id,'fileName'=>$key,'field'=>$field]),
                        'key'    => $key
                    ];
                }
                else{
                    $initial[] = Html::img(self::getUploadUrl().$this->ref.'/'.$value,['class'=>'file-preview-image', 'alt'=>$model->file_name, 'title'=>$model->file_name]);
                }
            }
        }
        return $initial;
    }
}
