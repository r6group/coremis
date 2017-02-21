<?php

namespace app\models;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;

/**
 * This is the model class for table "content".
 *
 * @property integer $id
 * @property string $ref
 * @property string $subject
 * @property string $description
 * @property integer $content_no
 * @property string $content_date
 * @property string $type
 * @property integer $cat_id
 * @property string $to
 * @property string $status
 * @property integer $urgent
 * @property integer $secret
 * @property string $content_file
 * @property string $attach_files
 * @property integer $user_id
 * @property string $remark
 * @property integer $hits
 * @property string $date_create
 * @property string $last_update
 */
class Content extends \yii\db\ActiveRecord
{
    const UPLOAD_FOLDER = 'contents';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'content';
    }

    public static function getDb() {
        return Yii::$app->db_frontpage;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject', 'cat_id'], 'required'],
            [['content_no', 'description', 'status'], 'string'],
            [['cat_id', 'urgent', 'secret', 'user_id', 'hits'], 'integer'],
            [['date_create', 'last_update'], 'safe'],
            [['content_date'], 'safe'],
            [['to', 'remark'], 'string'],
            [['ref'], 'string', 'max' => 50],
            [['subject'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 16],
            [['content_file'],'file','maxFiles'=>10,'skipOnEmpty'=>true],
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
     * @inheritcontent
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ref' => 'Ref',
            'subject' => 'เรื่อง',
            'content_no' => 'เลขที่หนังสือ',
            'content_date' => 'วันที่เผยแพร่',
            'type' => 'ประเภทหนังสือ',
            'cat_id' => 'หมวดหมู่',
            'to' => 'ถึง',
            'urgent' => 'ระดับความเร่งด่วน',
            'secret' => 'ระดับความลับ',
            'content_file' => 'รูปภาพ',
            'attach_files' => 'ไฟล์แนบ (ถ้ามี)',
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
        $contents_file = '';
        if(in_array($type, ['attach_files','content_file'])){
            $data = $type==='attach_files'?$this->attach_files:$this->content_file;
            $files = Json::decode($data);
            if(is_array($files)){
                $contents_file ='<ul class="list list-icons list-icons-style-3">';
                foreach ($files as $key => $value) {
                    $contents_file .= '<li>'.Html::a('<i class="fa fa-download"></i> '.$value[0]. ' ('.$this->formatBytes($value[1]) .')',['/content/download','id'=>$this->id,'file'=>$key,'file_name'=>$value[0]]).'</li>';
                }
                $contents_file .='</ul>';
            }
        }

        return $contents_file;
    }


    public function listImagesCarousel($type){
        $contents_file = '';
        if(in_array($type, ['attach_files','content_file'])){
            $data = $type==='attach_files'?$this->attach_files:$this->content_file;
            $files = Json::decode($data);
            if(is_array($files)){
                $contents_file ='';
                $i = 0;
                foreach ($files as $key => $value) {
                    $i++;

                    if ($i <= 3) {
                        $contents_file .= '<div><div class="img-thumbnail"><img class="img-responsive" src="/contents/'.date('Y-m', strtotime($this->date_create)).'/'.$this->ref.'/thumbnail/'.$key.'" alt=""></div></div>';
                    }

                }
                $contents_file .='';
            }
        }


        return $contents_file;
    }


    public function listImagesMasonry(){
        $contents_file = '';

            $data = $this->content_file;
            $files = Json::decode($data);
            if(is_array($files)){
                $contents_file ='<div class="masonry lightbox" data-plugin-masonry data-plugin-options=\'{"itemSelector": ".masonry-item","delegate": "a", "type": "image", "gallery": {"enabled": true}, "mainClass": "mfp-with-zoom", "zoom": {"enabled": true, "duration": 300}}\'>';
                foreach ($files as $key => $value) {
                    $contents_file .= '<div class="masonry-item">';
                    $contents_file .='<a href="/contents/'.date('Y-m', strtotime($this->date_create)).'/'.$this->ref.'/'.$key.'">';
                    $contents_file .= '<span class="thumb-info thumb-info-centered-info thumb-info-no-borders">';
                    $contents_file .= '<span class="thumb-info-wrapper">';
                    $contents_file .= '<img src="/contents/'.date('Y-m', strtotime($this->date_create)).'/'.$this->ref.'/'.$key.'" class="img-responsive" alt="">';
                    $contents_file .= '<span class="thumb-info-action">';
                    $contents_file .= '<span class="thumb-info-action-icon"><i class="fa fa-search"></i></span>';
                    $contents_file .= '</span>';
                    $contents_file .= '</span>';
                    $contents_file .= '</span>';
                    $contents_file .= '</a>';
                    $contents_file .= '</div>';

                }

                $contents_file .= "</div>";

            }



        return $contents_file;
    }


    public function getFirstThumbnail(){
        $contents_file = '';

            $data = $this->content_file;
            $files = Json::decode($data);
            if(is_array($files)){
                $contents_file ='';
                $i = 0;
                foreach ($files as $key => $value) {
                    if ($i == 0) {
                        $i = 1;
                        $contents_file .= '/contents/'.date('Y-m', strtotime($this->date_create)).'/'.$this->ref.'/thumbnail_150_150/'.$key;
                    }

                }
                $contents_file .='';
            }



        return $contents_file;
    }



    public function listFilesUrl($type){
        $contents_file = '';
        if(in_array($type, ['attach_files','content_file'])){
            $data = $type==='attach_files'?$this->attach_files:$this->content_file;
            $files = Json::decode($data);
            if(is_array($files)){
                foreach ($files as $key => $value) {
                    $contents_file = Yii::$app->urlManager->createAbsoluteUrl(['/content/download', 'id'=>$this->id,'file'=>$key,'file_name'=>$value[0]]);
                }
            }
        }

        return $contents_file;
    }

    public function initialPreview($data,$field,$type='file'){
        $initial = [];
        $files = Json::decode($data);
        if(is_array($files)){
            foreach ($files as $key => $value) {
                if($type=='file'){
                    $initial[] = "<div><img src='".Url::toRoute(['/content/download','id'=>$this->id,'file'=>$key,'file_name'=>$value[0]])."' class='file-preview-image' alt='".$value[0]."' title='".$value[0]."'></div>";
                }elseif($type=='icon'){
                    $initial[] = "<div class='file-preview-other'><h2><i class='glyphicon glyphicon-file'></i></h2></div>";
                }elseif($type=='config'){
                    $initial[] = [
                        'caption'=> $value,
                        'width'  => '80px',
                        'url'    => Url::to(['/content/deletefile','id'=>$this->id,'fileName'=>$key,'field'=>$field]),
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
