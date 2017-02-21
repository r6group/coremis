<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use team\modules\user\User;


/* @var $this yii\web\View */
/* @var $model \common\models\User */
/* @var $isActiveAffiliateProgram backend\modules\pay\models\Pay::isActiveAffiliateProgram(); */

$this->title = 'Profile';
$this->params['breadcrumbs'][] = ['label' => 'Personal Area', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-9 box">
        <div class="panel panel-profile">
            <div class="panel-heading">
                <h3><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="panel-body">


                <div class="user-view">


                    <?=
                    DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'profile.FullAvatarUrl:image:' . Yii::t('app', 'Avatar'),
                            'id',
                            'profile.surname',
                            'profile.name',
                            'profile.middle_name',
                            'phone',
                            'email:email',
                            [
                                'attribute' => 'profile.gender',
                                'value' => $model->profile->genderArray[$model->profile->gender]
                            ],
                            'profile.birthday:date',
                            'profile.balance',
                            'profile.bonus_balance',
                            'created_at:datetime',
                            'updated_at:datetime',
//            [
//                'label'  => User::t('user-team', 'Referral link to the home page'),
//                'format' => 'raw',
//                'value'  => ($isActiveAffiliateProgram) ?
//                        Html::input(
//                                'text', 'ref-link', Yii::$app->request->getHostInfo() . '/?ref=' . $model->id,
//                            [
//                                'class'    => 'form-control input-sm',
//                                'readonly' => 'readonly',
//                                'onclick' => 'this.select();',
//                            ]
//                        ) :
//                    User::t('user-team', 'Link available')
//            ],
                        ],
                    ])
                    ?>

                </div>
            </div>


        </div>
    </div>
    <div class="col-md-3">
        <?= $this->render('//layouts/side-menu') ?>
    </div>
</div>
