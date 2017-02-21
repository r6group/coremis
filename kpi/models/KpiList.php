<?php

namespace kpi\models;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;

/**
 * This is the model class for table "kpi_list".
 *
 * @property integer $id
 * @property string $kpi_year
 * @property string $kpi_level
 * @property string $kpi_no
 * @property double $kpi_order
 * @property string $title
 * @property string $description
 * @property string $kpi_unit
 * @property string $target
 * @property string $pop_target
 * @property double $goal
 * @property double $max_value
 * @property string $method
 * @property string $data_source
 * @property string $a_unit
 * @property string $a_desc
 * @property string $b_unit
 * @property string $b_desc
 * @property string $c_unit
 * @property string $c_desc
 * @property string $d_unit
 * @property string $d_desc
 * @property string $formula
 * @property boolean $level_ministry
 * @property boolean $level_region
 * @property boolean $level_province
 * @property boolean $level_impotant
 * @property boolean $level_ceo_assess
 * @property string $tags
 * @property string $eval_freq
 * @property string $baseline
 * @property string $eval_rule
 * @property string $eval_method
 * @property string $doc
 * @property string $tech_support
 * @property string $director
 * @property string $reporter
 * @property string $areabase_kpi_provcode
 * @property string $areabase_kpi_regioncode
 * @property string $remark
 * @property string $last_update
 * @property string $attach_files
 * @property string $ref
 */
class KpiList extends \yii\db\ActiveRecord
{
    public $level;
    public $level_code;
    public $reporter_id;
    public $assign_by;
    public $assign_date;
    const UPLOAD_FOLDER = 'kpi_attaches';

    /**
     * @var string Name regular pattern
     */
    public static $patternFormula = '/^[abcdefABCDEFxX+\-*\/() 0-9.,]{1,255}$/';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kpi_list';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_kpi');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kpi_no', 'owner_off_id'], 'string', 'max' => 5],
            [['4e', 'plan_id', 'project_id'], 'string', 'max' => 2],
            [['kpi_order', 'goal', 'pa', 'bie', 'hdc', 'q1_goal', 'q2_goal', 'q3_goal', 'q4_goal', 'fixed_a', 'fixed_b', 'fixed_c', 'fixed_d', 'fixed_e', 'fixed_f', 'max_value', 'user_id', 'my_kpi', 'parent_id'], 'number'],
            [['title', 'description', 'target', 'hosp_specifics', 'hosp_ignore', 'method', 'sql_display','data_source', 'a_desc', 'b_desc', 'c_desc', 'd_desc', 'e_desc', 'f_desc', 'operator', 'tags', 'eval_freq', 'baseline', 'eval_rule', 'eval_method', 'doc', 'tech_support', 'director', 'reporter', 'remark', 'pop_target'], 'string'],
            [['level_ministry', 'level_region', 'level_province', 'level_impotant', 'level_ceo_assess'], 'boolean'],
            [['last_update', 'user_id', 'content_date', 'my_kpi', 'hosp_visible'], 'safe'],
            [['kpi_year'], 'string', 'max' => 4],
            [['kpi_level'], 'string', 'max' => 20],
            [['a_desc_q1', 'b_desc_q1', 'c_desc_q1', 'd_desc_q1', 'e_desc_q1', 'f_desc_q1', 'operator_q1'], 'string'],
            [['a_unit_q1', 'b_unit_q1', 'c_unit_q1', 'd_unit_q1', 'e_unit_q1', 'f_unit_q1'], 'string', 'max' => 120],
            [['a_desc_q2', 'b_desc_q2', 'c_desc_q2', 'd_desc_q2', 'e_desc_q2', 'f_desc_q2', 'operator_q2'], 'string'],
            [['a_unit_q2', 'b_unit_q2', 'c_unit_q2', 'd_unit_q2', 'e_unit_q2', 'f_unit_q2'], 'string', 'max' => 120],
            [['a_desc_q3', 'b_desc_q3', 'c_desc_q3', 'd_desc_q3', 'e_desc_q3', 'f_desc_q3', 'operator_q3'], 'string'],
            [['a_unit_q3', 'b_unit_q3', 'c_unit_q3', 'd_unit_q3', 'e_unit_q3', 'f_unit_q3'], 'string', 'max' => 120],
            [['a_desc_q4', 'b_desc_q4', 'c_desc_q4', 'd_desc_q4', 'e_desc_q4', 'f_desc_q4', 'operator_q4'], 'string'],
            [['a_unit_q4', 'b_unit_q4', 'c_unit_q4', 'd_unit_q4', 'e_unit_q4', 'f_unit_q4'], 'string', 'max' => 120],
            [['formula_q1', 'formula_q2', 'formula_q3', 'formula_q4'], 'string', 'max' => 255],
            [['ref'], 'string', 'max' => 120],
            [['formula'], 'match', 'pattern' => self::$patternFormula],
            [['attach_files'],'file','maxFiles'=>10,'skipOnEmpty'=>true],
            [['content_file'],'file','maxFiles'=>10,'skipOnEmpty'=>true],
            [['kpi_unit', 'formula'], 'string', 'max' => 255],
            [['a_unit', 'b_unit', 'c_unit', 'd_unit', 'e_unit', 'f_unit'], 'string', 'max' => 120],
            [['areabase_kpi_provcode', 'areabase_kpi_regioncode'], 'string', 'max' => 2],
            [['result', 'result_q1', 'result_q2', 'result_q3', 'result_q4', 'result_r01', 'result_r02', 'result_r03', 'result_r04', 'result_r05', 'result_r06', 'result_r07', 'result_r08', 'result_r09', 'result_r10', 'result_r11', 'result_r12', 'result_r13', 'my_kpi_group'], 'number'],
            [['result_r01_q1','result_r01_q2','result_r01_q3','result_r01_q4','result_r02_q1','result_r02_q2','result_r02_q3','result_r02_q4','result_r03_q1','result_r03_q2','result_r03_q3','result_r03_q4','result_r04_q1','result_r04_q2','result_r04_q3','result_r04_q4','result_r05_q1','result_r05_q2','result_r05_q3','result_r05_q4','result_r06_q1','result_r06_q2','result_r06_q3','result_r06_q4','result_r07_q1','result_r07_q2','result_r07_q3','result_r07_q4','result_r08_q1','result_r08_q2','result_r08_q3','result_r08_q4','result_r09_q1','result_r09_q2','result_r09_q3','result_r09_q4','result_r10_q1','result_r10_q2','result_r10_q3','result_r10_q4','result_r11_q1','result_r11_q2','result_r11_q3','result_r11_q4','result_r12_q1','result_r12_q2','result_r12_q3','result_r12_q4','result_r13_q1','result_r13_q2','result_r13_q3','result_r13_q4'], 'number'],
        ];
    }


    public function beforeSave($insert) {


        (!empty($this->hosp_visible) && is_array($this->hosp_visible)) ? $this->hosp_visible = implode(",", $this->hosp_visible) : $this->hosp_visible = null;


        if ($insert == true) {
//            if (empty($this->content_date)) {
//                $this->content_date = date('Y-m-d h:i:sa');
//            }

            $this->user_id = \Yii::$app->user->identity->id;
            return true;
        }

        return parent::beforeSave($insert);
    }


    public static function getReporters($id, $level) {

//        if (\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin') || \Yii::$app->user->can('kpi-admin')) {
//            $query = KpiDataPermission::findAll(['kpi_id' => $id]) ;
//        }
//        else {
//            $query = KpiDataPermission::findAll(['kpi_id' => $id, 'assign_by' => \Yii::$app->user->identity->getId()]) ;
//        }


        $query = KpiDataPermission::findAll(['kpi_id' => $id, 'assign_by' => \Yii::$app->user->identity->getId()]) ;

        $result = '';
        foreach ($query as $row) {
            $result .= '  <img src="'.\common\models\Profile::getAvatarByUserId($row->user_id).'" title="" data-placement="top" data-toggle="tooltip" data-original-title="'.\common\models\Profile::getFullNameByUserId($row->user_id) .' มอบโดย '.\common\models\Profile::getFullNameByUserId($row->assign_by).'" class="media-object img-circle tooltips pull-right" style="width: 28px">';

        }

        return $result;
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
                    $contents_file .= '<li>'.Html::a('<i class="fa fa-download"></i> '.$value[0]. ' ('.$this->formatBytes($value[1]) .')',['/kpi-list/download','id'=>$this->id,'file'=>$key,'file_name'=>$value[0]]).'</li>';
                }
                $contents_file .='</ul>';
            }
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
                    $contents_file = Yii::$app->urlManager->createAbsoluteUrl(['/kpi-list/download', 'id'=>$this->id,'file'=>$key,'file_name'=>$value[0]]);
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
                    $initial[] = "<div><img src='".Url::toRoute(['/kpi-list/download','id'=>$this->id,'file'=>$key,'file_name'=>$value[0]])."' class='file-preview-image' alt='".$value[0]."' title='".$value[0]."'></div>";
                }elseif($type=='icon'){
                    $initial[] = "<div class='file-preview-other'><h2><i class='glyphicon glyphicon-file'></i></h2></div>";
                }elseif($type=='config'){
                    $initial[] = [
                        'caption'=> $value,
                        'width'  => '80px',
                        'url'    => Url::to(['/kpi-list/deletefile','id'=>$this->id,'fileName'=>$key,'field'=>$field]),
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

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kpi_year' => 'ปีงบประมาณ',
            'kpi_level' => 'ระดับตัวชี้วัด',
            'kpi_no' => 'ตัวชี้วัดที่',
            'kpi_order' => 'Sort Order',
            'title' => 'ชื่อตัวชี้วัด',
            'description' => 'คำนิยาม',
            'kpi_unit' => 'หน่วยตัวชี้วัด',
            'target' => 'เกณฑ์เป้าหมาย',
            'pop_target' => 'ประชากรกลุ่มเป้าหมาย',
            'goal' => 'ค่าเป้าหมาย',
            'operator' => 'Operator',
            'max_value' => 'Max Value',
            'method' => 'วิธีการจัดเก็บข้อมูล',
            'data_source' => 'แหล่งข้อมูล',
            'a_unit' => 'หน่วยของค่า A',
            'a_desc' => 'นิยามของค่า A',
            'b_unit' => 'หน่วยของค่า B',
            'b_desc' => 'นิยามของค่า B',
            'c_unit' => 'หน่วยของค่า C',
            'c_desc' => 'นิยามของค่า C',
            'd_unit' => 'หน่วยของค่า D',
            'd_desc' => 'นิยามของค่า D',
            'e_unit' => 'หน่วยของค่า E',
            'e_desc' => 'นิยามของค่า E',
            'f_unit' => 'หน่วยของค่า F',
            'f_desc' => 'นิยามของค่า F',
            'formula' => 'สูตรคำนวนตัวชี้วัด',
            'level_ministry' => 'ตัวชี้วัดระดับกระทรวง',
            'level_region' => 'ตัวชี้วัดระดับเขต',
            'level_province' => 'ตัวชี้วัดระดับจังหวัด',
            'level_impotant' => 'ตัวชี้วัดสำคัญ',
            'level_ceo_assess' => 'ตัวชี้วัด Area Base',
            'tags' => 'Tags',
            'eval_freq' => 'ระยะเวลาการประเมินผล',
            'baseline' => 'ข้อมูล Baseline',
            'eval_rule' => 'เกณฑ์การประเมินผล',
            'eval_method' => 'วิธีการประเมินผล',
            'doc' => 'เอกสารสนับสนุน',
            'sql_display'=> 'SQL แสดงตามรางข้อมูล',
            'tech_support' => 'ผู้ให้ข้อมูลทางวิชาการ/ผู้ประสานงานตัวชี้วัด',
            'director' => 'หน่วยงานประมวลผลและจัดทำจ้อมูล (ระดับส่วนกลาง)',
            'reporter' => 'ผู้รับผิดชอบการรายงานผลการดำเนินงาน',
            'areabase_kpi_provcode' => 'รหัสจังหวัดตัวชี้วัด Area base',
            'areabase_kpi_regioncode' => 'Areabase Kpi Regioncode',
            'remark' => 'หมายเหตุ',
            'attach_files' => 'แนบไฟล์',
            'content_file' => 'แนบรูป',
            'hosp_visible' => 'หน่วยงานเป้าหมาย',
            'hosp_specifics' => 'หน่วยงานเป้าหมาย เฉพาะที่มีรหัสดังต่อไปนี้ (พิมพ์รหัสหน่วยงาน และคั่นด้วย Comma เช่น 00001,00002,00003 เป็นต้น)',
            'last_update' => 'Last Update',
        ];
    }
}
