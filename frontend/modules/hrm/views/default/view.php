<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Profile $model
 */

$this->title = $model->name. ' '.$model->surname;
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row profile-wrapper">
    <div class="col-xs-12 col-md-3 col-lg-2 profile-left mb20">
        <div class="profile-left-heading">
            <ul class="panel-options">
                <li><a><i class="glyphicon glyphicon-option-vertical"></i></a></li>
            </ul>
            <a href="" class="profile-photo"><img class="img-circle img-responsive" src="<?php echo $model->FullAvatarUrl ?>" alt=""></a>
            <h2 class="profile-name"><?=$model->getFullName()?></h2>
            <h4 class="profile-designation"><?=ArrayHelper::getValue($model->getPositionArray(), $model->main_pst, 'ไม่ระบุ') .' '.ArrayHelper::getValue($model->getPostypenameArray(), $model->plevel, '')?></h4>
            <ul class="list-group">
                <li class="list-group-item"><i class="glyphicon glyphicon-briefcase mr5"></i> <?=$model->getHosArray(27)[$model->off_id]?></li>

            </ul>

            <?=Html::a('<b>Activities</b>', ['/cabinet/default/index', 'id' =>$model->id], ['class' => 'btn btn-primary btn-quirk btn-block profile-btn-follow'])?>

            <?=Html::a('<b>Edit</b>', ['default/update', 'id' =>$model->id], ['class' => 'btn btn-success btn-quirk btn-block profile-btn-follow'])?>

        </div>
        <div class="profile-left-body">
            <h4 class="panel-title">About Me</h4>
            <p>Social media ninja. Pop culture enthusiast. Zombie fanatic. General tv evangelist.</p>
            <p>Alcohol fanatic. Explorer. Passionate reader. Entrepreneur. Lifelong coffee advocate. Avid bacon aficionado. Travel evangelist.</p>




            <hr class="fadeout">

            <h4 class="panel-title">หน่วยงาน</h4>
            <p><i class="glyphicon glyphicon-briefcase mr5"></i> <?=ArrayHelper::getValue($model->getHosArray(27), $model->off_id, 'ไม่ระบุ')?></p>

            <hr class="fadeout">

            <h4 class="panel-title">Contacts</h4>
            <p><i class="glyphicon glyphicon-phone mr5"></i> <?=$model->mobile_tel?></p>

            <hr class="fadeout">

            <h4 class="panel-title">Location</h4>
            <p><i class="glyphicon glyphicon-map-marker mr5"></i> <?=$model->addr_part.' หมู่ '.$model->moo_part .' '.$model->setBankIfNull($model->rd_part)
                .' ต.'. ArrayHelper::getValue($model->getSubdistrictnameArray($model->amp_part), $model->tmb_part, 'ไม่ระบุ')
                .' อ.'. ArrayHelper::getValue($model->getDistrictnameArray($model->chw_part), $model->amp_part, 'ไม่ระบุ')
                .' จ.'. ArrayHelper::getValue($model->getProvinceArray(), $model->chw_part, 'ไม่ระบุ')?></p>

            <hr class="fadeout">

            <h4 class="panel-title">Social</h4>
            <ul class="list-inline profile-social">
                <li><a href=""><i class="fa fa-facebook-official"></i></a></li>
                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                <li><a href=""><i class="fa fa-linkedin"></i></a></li>
            </ul>

        </div>
    </div>
    <div class="col-xs-12 col-md-9 col-lg-8 profile-right">
        <ul class="nav nav-tabs nav-inverse nav-justified">
            <li class="active"><a href="#popular" data-toggle="tab">Popular</a></li>
            <li><a href="#recent" data-toggle="tab">Recent</a></li>
            <li><a href="#comments" data-toggle="tab">Comments</a></li>
        </ul>

        <div class="tab-content mb20">
            <div class="tab-pane active" id="popular">
                <?= DetailView::widget([
                    'model' => $model,
                    'condensed'=>true,
                    'hover'=>true,
                    'bordered' => false,
                    'striped' => false,
                    'mode'=> DetailView::MODE_VIEW,
                    'panel'=>[
                        'heading'=>'<i class="fa fa-user"></i> Personal Information',
                        'type'=>DetailView::TYPE_PRIMARY,
                    ],
                    'attributes' => [

                        //'cid',
                        [
                            'attribute' => 'pname',
                            'value' => ArrayHelper::getValue($model->getTitlesArray(), $model->pname, 'ไม่ระบุ')
                        ],

                        [
                            'attribute' => 'name',
                            'value' => $model->getFullName()
                        ],

                        [
                            'attribute'=>'birthday',
                            'format'=>['date',(isset(Yii::$app->modules['datecontrol']['displaySettings']['date'])) ? Yii::$app->modules['datecontrol']['displaySettings']['date'] : 'd-m-Y'],
                            'type'=>DetailView::INPUT_WIDGET,
                            'widgetOptions'=> [
                                'class'=>DateControl::classname(),
                                'type'=>DateControl::FORMAT_DATE
                            ]
                        ],
                        [
                            'attribute' => 'gender',
                            'value' => ArrayHelper::getValue($model->getGenderArray(), $model->gender, 'ไม่ระบุ')
                        ],

                        'blood_group',

                        [
                            'attribute' => 'marry_status',
                            'value' => ArrayHelper::getValue($model->getMstatusArray(), $model->marry_status, 'ไม่ระบุ')
                        ],



                    ],
                    'deleteOptions'=>[
                        'url'=>['delete', 'id' => $model->id],
                        'data'=>[
                            'confirm'=>'Are you sure you want to delete this item?',
                            'method'=>'post',
                        ],
                    ],
                    'enableEditMode'=>false,
                ]) ?>

                <?= DetailView::widget([
                    'model' => $model,
                    'condensed'=>true,
                    'hover'=>true,
                    'bordered' => false,
                    'striped' => false,
                    'mode'=> DetailView::MODE_VIEW,
                    'panel'=>[
                        'heading'=>'<i class="fa fa-suitcase"></i> Work Information',
                        'type'=>DetailView::TYPE_SUCCESS,
                    ],
                    'attributes' => [
                        'stf_id',
                        [
                            'attribute' => 'off_id',
                            'value' => ArrayHelper::getValue($model->getHosArray(27), $model->off_id, 'ไม่ระบุ')
                        ],
                        [
                            'attribute' => 'off_id18',
                            'value' => ArrayHelper::getValue($model->getHosArray(27), $model->off_id18, 'ไม่ระบุ')
                        ],
                        [
                            'attribute' => 'stf_type',
                            'value' => ArrayHelper::getValue($model->getStftypeArray(), $model->stf_type, 'ไม่ระบุ')
                        ],
                        [
                            'attribute' => 'main_pst',
                            'value' => ArrayHelper::getValue($model->getPositionArray(), $model->main_pst, 'ไม่ระบุ') .' '.ArrayHelper::getValue($model->getPostypenameArray(), $model->plevel, '')
                        ],
                        'position',

                        [
                            'attribute' => 'dr_special',
                            'value' => ArrayHelper::getValue($model->getSpArray(), $model->dr_special, 'ไม่ระบุ')
                        ],
                        'licence_no',
                        [
                            'attribute'=>'birthday',
                            'format'=>['date',(isset(Yii::$app->modules['datecontrol']['displaySettings']['date'])) ? Yii::$app->modules['datecontrol']['displaySettings']['date'] : 'd-m-Y'],
                            'type'=>DetailView::INPUT_WIDGET,
                            'widgetOptions'=> [
                                'class'=>DateControl::classname(),
                                'type'=>DateControl::FORMAT_DATE
                            ]
                        ],


                        [
                            'attribute' => 'workgroup',
                            'value' => $model->getWorkgroup($model->workgroup)
                        ],

                        [
                            'attribute'=>'dt_started',
                            'format'=>['date',(isset(Yii::$app->modules['datecontrol']['displaySettings']['date'])) ? Yii::$app->modules['datecontrol']['displaySettings']['date'] : 'd-m-Y'],
                            'type'=>DetailView::INPUT_WIDGET,
                            'widgetOptions'=> [
                                'class'=>DateControl::classname(),
                                'type'=>DateControl::FORMAT_DATE
                            ]
                        ],

                    ],
                    'deleteOptions'=>[
                        'url'=>['delete', 'id' => $model->id],
                        'data'=>[
                            'confirm'=>'Are you sure you want to delete this item?',
                            'method'=>'post',
                        ],
                    ],
                    'enableEditMode'=>false,
                ]) ?>

                <?= DetailView::widget([
                    'model' => $model,
                    'condensed'=>true,
                    'hover'=>true,
                    'bordered' => false,
                    'striped' => false,
                    'mode'=> DetailView::MODE_VIEW,
                    'panel'=>[
                        'heading'=>'<i class="fa fa-envelope"></i> Contact Information',
                        'type'=>DetailView::TYPE_WARNING,
                    ],
                    'attributes' => [


                        [
                            'attribute' => 'addr_part',
                            'value' => $model->addr_part.' หมู่ '.$model->moo_part .' '.$model->setBankIfNull($model->rd_part)
                                .' ต.'. ArrayHelper::getValue($model->getSubdistrictnameArray($model->amp_part), $model->tmb_part, 'ไม่ระบุ')
                                .' อ.'. ArrayHelper::getValue($model->getDistrictnameArray($model->chw_part), $model->amp_part, 'ไม่ระบุ')
                                .' จ.'. ArrayHelper::getValue($model->getProvinceArray(), $model->chw_part, 'ไม่ระบุ')
                        ],


                        'mobile_tel',
                        'email:email',

                        'Note:ntext',

                    ],
                    'deleteOptions'=>[
                        'url'=>['delete', 'id' => $model->id],
                        'data'=>[
                            'confirm'=>'Are you sure you want to delete this item?',
                            'method'=>'post',
                        ],
                    ],
                    'enableEditMode'=>false,
                ]) ?>
            </div>
            <div class="tab-pane" id="recent">
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>
            </div>
            <div class="tab-pane" id="comments">
                <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
            </div>
        </div>
    </div>

</div>



