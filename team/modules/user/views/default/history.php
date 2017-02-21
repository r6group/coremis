<?php

use yii\helpers\Html;
use yii\grid\GridView;
use team\modules\user\User;

/* @var $this yii\web\View */
/* @var $searchModel team\modules\user\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                 = 'Payment history';
$this->params['breadcrumbs'] = [
    [
        'label' => 'Personal Area',
        'url'   => ['default/index'],
    ],
    $this->title
];
?>
<div class="user-index">

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns'      => [
            [
                'attribute' => 'create_at',
            ],
            [
                'attribute' => 'ticket_id',
                'value'     => function ($model) {
                    return $model->ticket->title;
                },
            ],
            'current_cost',
            'cash',
            'bonus_cash',
            [
                'header'   => 'Actions',
                'class'   => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view-pay' => function($url, $model, $key) {
                        return Html::a(
                            '<i class="glyphicon glyphicon-eye-open"></i>',
                            $url,
                            [
                                'title' => 'View details',
                                'class' => 'btn btn-primary btn-xs'
                            ]
                        );
                    },
                        ],
                        'template'     => '{view-pay}'
                    ]
                ],
            ]);
            ?>

</div>
