<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 11/8/15
 * Time: 03:57
 */

namespace common\components;

use Yii;
use common\models\ReportMenu;
use yii\helpers\Url;



class MenuHelper
{

    public static function getMenu()
    {
        $items = ReportMenu::getDb()->cache(function ($db) {
            return ReportMenu::find()
                ->where(['lvl' => 0])
                ->orderBy('root, lft')
                ->asArray()
                ->all();
        });
//        $items = ReportMenu::find()
//            ->where(['lvl' => 0])
//            ->orderBy('root, lft')
//            ->asArray()
//            ->all();

        $result = [];

        $param ='';
//        if (!empty(Yii::$app->request->queryString)) {
//            $param = '?'.urldecode(Yii::$app->request->queryString);
//        }
        foreach ($items as $item) {
            if ($item['visible']==1) {
                $menuitem = [];
                $menuitem = static::getMenuRecrusive($item['id'], 1, $item['lft'], $item['rgt']);

                $str = $item['url'];
                if (!strpos($str, 'ttp')) {
                    $str = [$str];
                }

                $url = isset($item['url']) ? $str : Url::to(['/report/index', 'id'=>$item['id']]).$param;
                if ($menuitem <> null) {

                    $result[] = [
                        'label' => $item['name'],
                        'items' => $menuitem,
                        //'<li class="divider"></li>',
                    ];
                } else {
                    $result[] = [
                        'label' => $item['name'],
                        'url' => $url,
                        //'<li class="divider"></li>',
                    ];
                }
            }


        }

        return $result;
    }

    private static function getMenuRecrusive($parent, $level, $parent_lft, $parent_rgt)
    {
        $items = ReportMenu::getDb()->cache(function ($db) use ($parent, $level, $parent_lft, $parent_rgt) {
            return ReportMenu::find()
                ->where(['root' => $parent, 'lvl' => $level])
                ->andWhere('id <>'.$parent)
                ->andWhere('lft BETWEEN '.$parent_lft.' AND '.$parent_rgt)
                ->orderBy('root, lft')
                ->asArray()
                ->all();
        });
//        $items = ReportMenu::find()
//            ->where(['root' => $parent, 'lvl' => $level])
//            ->andWhere('id <>'.$parent)
//            ->andWhere('lft BETWEEN '.$parent_lft.' AND '.$parent_rgt)
//            ->orderBy('root, lft')
//            ->asArray()
//            ->all();

        $result = [];
        $param ='';
//        if (!empty(Yii::$app->request->queryString)) {
//            $param = '?'.urldecode(Yii::$app->request->queryString);
//        }

        $rgt = $parent_rgt;
        foreach ($items as $item) {
            if ($item['visible']==1) {
                $menuitem = [];
                $menuitem = static::getMenuRecrusive($parent, $level +1, $item['lft'], $item['rgt']);


                $str = $item['url'];
                if (!strpos($str, 'ttp')) {
                    $str = [$str];
                }




                $url = isset($item['url']) ? $str : Url::to(['report/index', 'id'=>$item['id']]).$param;


                if ($menuitem <> null) {
                    $rgt = $item['rgt'];
                    $result[] = [
                        'label' => $item['name'],
                        'items' => $menuitem,

                        //'<li class="divider"></li>',
                    ];
                    $menuitem = [];
                } else {
                    $menuitem = [];
                    //if ($item['lft'] == $rgt + 1) {

                        //$r = Yii::$app->getRequest()->getQueryParam('r');
                        $id = Yii::$app->getRequest()->getQueryParam('id');
                        $active =  ($id == $item['id']);


                        $rgt = $item['rgt'];
                        $result[] = [
                            'label' => $item['name'],
                            'url' => $url,
                            'active' => $active,

                            //'<li class="divider"></li>',
                        ];
                    //}
                }
            } else {
                $rgt = $item['rgt'];
            }

        }


        return $result;
    }



}