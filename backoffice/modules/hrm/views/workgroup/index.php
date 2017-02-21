<?php
use kartik\tree\TreeView;
use common\models\WorkGroup;

$this->title = 'Workgroup Editor';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">Workgroup editor</h4>
    </div>
    <div class="panel-body">
        <?php
        echo TreeView::widget([
            // single query fetch to render the tree
            // use the Product model you have in the previous step
            'query' => WorkGroup::find()->addOrderBy('root, lft'),
            'headingOptions' => ['label' => 'กลุ่มงาน/งาน'],
            'fontAwesome' => false,     // optional
            'isAdmin' => true,         // optional (toggle to enable admin mode)
            'displayValue' => 1,        // initial display value
            'softDelete' => true,       // defaults to true
            'cacheSettings' => [
                'enableCache' => true   // defaults to true
            ],
            'rootOptions' => [
                'label' => '<b>สำนักงานสาธารณสุขจังหวัดสระแก้ว</b>',
                'class' => 'text-primary'
            ],
            'iconEditSettings' => [
                'show' => 'list',
                'listData' => [
                    'folder' => 'Folder',
                    'file' => 'File',
                    'mobile' => 'Phone',
                    'bell' => 'Bell',
                ]
            ],
            'mainTemplate' => '
                <div class="row">
                    <div class="col-sm-4">
                        {wrapper}
                    </div>
                    <div class="col-sm-8">
                        {detail}
                    </div>
                </div>
            '
        ]);
        ?>
    </div>
</div>


