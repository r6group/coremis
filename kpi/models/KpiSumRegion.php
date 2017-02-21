<?php

namespace kpi\models;

use Yii;
use kpi\models\CoProvince;
use kpi\models\KpiList;
use common\models\CHospital;

/**
 * This is the model class for table "kpi_sum_region".
 *
 * @property integer $id
 * @property string $kpi_provcode
 * @property string $kpi_year
 * @property integer $kpi_id
 * @property integer $kpi_order
 * @property string $kpi_definition
 * @property integer $kpi_a_value
 * @property integer $kpi_b_value
 * @property integer $kpi_c_value
 * @property integer $kpi_d_value
 * @property double $kpi_result
 * @property string $kpi_condition
 * @property string $kpi_formula
 * @property string $kpi_sql
 * @property string $formula
 * @property integer $update_by
 * @property string $last_update
 */
class KpiSumRegion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kpi_sum_region';
    }


    public function beforeSave($insert)
    {


        $model = KpiList::findOne($this->kpi_id);




        $formula_tmp = strtoupper($model->formula);


        if ($model->fixed_a) {
//            $this->kpi_a_value_q1 = $this->kpi_a_value;
//            $this->kpi_a_value_q2 = $this->kpi_a_value;
//            $this->kpi_a_value_q3 = $this->kpi_a_value;
//            $this->kpi_a_value_q4 = $this->kpi_a_value;
            $this->kpi_a_value_q1 = null;
            $this->kpi_a_value_q2 = null;
            $this->kpi_a_value_q3 = null;
            $this->kpi_a_value_q4 = null;
        } else {
            $this->kpi_a_value = $this->kpi_a_value_q1 + $this->kpi_a_value_q2 + $this->kpi_a_value_q3 + $this->kpi_a_value_q4;
//            $this->kpi_a_value = $this->kpi_a_value_q4 > 0 ? $this->kpi_a_value_q4 : ($this->kpi_a_value_q3 > 0 ? $this->kpi_a_value_q3 :($this->kpi_a_value_q2 > 0 ? $this->kpi_a_value_q2 : ($this->kpi_a_value_q1 > 0 ? $this->kpi_a_value_q1 : 0)));
        }

        if ($model->fixed_b) {
//            $this->kpi_b_value_q1 = $this->kpi_b_value;
//            $this->kpi_b_value_q2 = $this->kpi_b_value;
//            $this->kpi_b_value_q3 = $this->kpi_b_value;
//            $this->kpi_b_value_q4 = $this->kpi_b_value;
            $this->kpi_b_value_q1 = null;
            $this->kpi_b_value_q2 = null;
            $this->kpi_b_value_q3 = null;
            $this->kpi_b_value_q4 = null;
        } else {
            $this->kpi_b_value = $this->kpi_b_value_q1 + $this->kpi_b_value_q2 + $this->kpi_b_value_q3 + $this->kpi_b_value_q4;
//            $this->kpi_b_value = $this->kpi_b_value_q4 > 0 ? $this->kpi_b_value_q4 : ($this->kpi_b_value_q3 > 0 ? $this->kpi_b_value_q3 :($this->kpi_b_value_q2 > 0 ? $this->kpi_b_value_q2 : ($this->kpi_b_value_q1 > 0 ? $this->kpi_b_value_q1 : 0)));

        }

        if ($model->fixed_c) {
//            $this->kpi_c_value_q1 = $this->kpi_c_value;
//            $this->kpi_c_value_q2 = $this->kpi_c_value;
//            $this->kpi_c_value_q3 = $this->kpi_c_value;
//            $this->kpi_c_value_q4 = $this->kpi_c_value;
            $this->kpi_c_value_q1 = null;
            $this->kpi_c_value_q2 = null;
            $this->kpi_c_value_q3 = null;
            $this->kpi_c_value_q4 = null;
        } else {
//            $this->kpi_c_value = $this->kpi_c_value_q4 > 0 ? $this->kpi_c_value_q4 : ($this->kpi_c_value_q3 > 0 ? $this->kpi_c_value_q3 :($this->kpi_c_value_q2 > 0 ? $this->kpi_c_value_q2 : ($this->kpi_c_value_q1 > 0 ? $this->kpi_c_value_q1 : 0)));
            $this->kpi_c_value = $this->kpi_c_value_q1 + $this->kpi_c_value_q2 + $this->kpi_c_value_q3 + $this->kpi_c_value_q4;
        }

        if ($model->fixed_d) {
//            $this->kpi_d_value_q1 = $this->kpi_d_value;
//            $this->kpi_d_value_q2 = $this->kpi_d_value;
//            $this->kpi_d_value_q3 = $this->kpi_d_value;
//            $this->kpi_d_value_q4 = $this->kpi_d_value;
            $this->kpi_d_value_q1 = null;
            $this->kpi_d_value_q2 = null;
            $this->kpi_d_value_q3 = null;
            $this->kpi_d_value_q4 = null;
        } else {
//            $this->kpi_d_value = $this->kpi_d_value_q4 > 0 ? $this->kpi_d_value_q4 : ($this->kpi_d_value_q3 > 0 ? $this->kpi_d_value_q3 :($this->kpi_d_value_q2 > 0 ? $this->kpi_d_value_q2 : ($this->kpi_d_value_q1 > 0 ? $this->kpi_d_value_q1 : 0)));
            $this->kpi_d_value = $this->kpi_d_value_q1 + $this->kpi_d_value_q2 + $this->kpi_d_value_q3 + $this->kpi_d_value_q4;
        }

        if ($model->fixed_e) {
//            $this->kpi_e_value_q1 = $this->kpi_e_value;
//            $this->kpi_e_value_q2 = $this->kpi_e_value;
//            $this->kpi_e_value_q3 = $this->kpi_e_value;
//            $this->kpi_e_value_q4 = $this->kpi_e_value;
            $this->kpi_e_value_q1 = null;
            $this->kpi_e_value_q2 = null;
            $this->kpi_e_value_q3 = null;
            $this->kpi_e_value_q4 = null;
        } else {
//            $this->kpi_e_value = $this->kpi_e_value_q4 > 0 ? $this->kpi_e_value_q4 : ($this->kpi_e_value_q3 > 0 ? $this->kpi_e_value_q3 :($this->kpi_e_value_q2 > 0 ? $this->kpi_e_value_q2 : ($this->kpi_e_value_q1 > 0 ? $this->kpi_e_value_q1 : 0)));
            $this->kpi_e_value = $this->kpi_e_value_q1 + $this->kpi_e_value_q2 + $this->kpi_e_value_q3 + $this->kpi_e_value_q4;
        }

        if ($model->fixed_f) {
//            $this->kpi_f_value_q1 = $this->kpi_f_value;
//            $this->kpi_f_value_q2 = $this->kpi_f_value;
//            $this->kpi_f_value_q3 = $this->kpi_f_value;
//            $this->kpi_f_value_q4 = $this->kpi_f_value;
            $this->kpi_f_value_q1 = null;
            $this->kpi_f_value_q2 = null;
            $this->kpi_f_value_q3 = null;
            $this->kpi_f_value_q4 = null;
        } else {
//            $this->kpi_f_value = $this->kpi_f_value_q4 > 0 ? $this->kpi_f_value_q4 : ($this->kpi_f_value_q3 > 0 ? $this->kpi_f_value_q3 :($this->kpi_f_value_q2 > 0 ? $this->kpi_f_value_q2 : ($this->kpi_f_value_q1 > 0 ? $this->kpi_f_value_q1 : 0)));
            $this->kpi_f_value = $this->kpi_f_value_q1 + $this->kpi_f_value_q2 + $this->kpi_f_value_q3 + $this->kpi_f_value_q4;
        }


        if ($formula_tmp) {
            $a = $this->kpi_a_value;
            $b = $this->kpi_b_value;
            $c = $this->kpi_c_value;
            $d = $this->kpi_d_value;
            $e = $this->kpi_e_value;
            $f = $this->kpi_f_value;

            $formula = $formula_tmp;
            $formula = str_replace("A", $a, $formula);
            $formula = str_replace("B", $b, $formula);
            $formula = str_replace("C", $c, $formula);
            $formula = str_replace("D", $d, $formula);
            $formula = str_replace("E", $e, $formula);
            $formula = str_replace("F", $f, $formula);
            $formula = str_replace(",", "", $formula);
            $formula = str_replace("X", "*", $formula);


            @trigger_error(''); // a dummy to detect when error didn't occur
            @(eval('return ' . $formula . ';'));
            $e = error_get_last();
            if ($e['message'] != '') {
                $this->kpi_result = null;
            } else {
                $value = eval('return ' . $formula . ';');

                $this->kpi_result = $value;
            }

            $formula = $formula_tmp;
            $formula = str_replace("A", ($model->fixed_a ? $this->kpi_a_value : $this->kpi_a_value_q1), $formula);
            $formula = str_replace("B", ($model->fixed_b ? $this->kpi_b_value : $this->kpi_b_value_q1), $formula);
            $formula = str_replace("C", ($model->fixed_c ? $this->kpi_c_value : $this->kpi_c_value_q1), $formula);
            $formula = str_replace("D", ($model->fixed_d ? $this->kpi_d_value : $this->kpi_d_value_q1), $formula);
            $formula = str_replace("E", ($model->fixed_e ? $this->kpi_e_value : $this->kpi_e_value_q1), $formula);
            $formula = str_replace("F", ($model->fixed_f ? $this->kpi_f_value : $this->kpi_f_value_q1), $formula);
            $formula = str_replace(",", "", $formula);
            $formula = str_replace("X", "*", $formula);


            @trigger_error(''); // a dummy to detect when error didn't occur
            @(eval('return ' . $formula . ';'));
            $e = error_get_last();
            if ($e['message'] != '') {
                $this->kpi_result_q1 = null;
            } else {
                $value = eval('return ' . $formula . ';');
                if ($this->kpi_a_value_q1 > 0 || $this->kpi_b_value_q1 > 0 || $this->kpi_c_value_q1 > 0 || $this->kpi_d_value_q1 > 0 || $this->kpi_e_value_q1 > 0 || $this->kpi_f_value_q1 > 0) {
                    $this->kpi_result_q1 = $value;
                } else {
                    $this->kpi_result_q1 = null;
                }

            }


            $formula = $formula_tmp;
            $formula = str_replace("A", ($model->fixed_a ? $this->kpi_a_value : $this->kpi_a_value_q1 + $this->kpi_a_value_q2), $formula);
            $formula = str_replace("B", ($model->fixed_b ? $this->kpi_b_value : $this->kpi_b_value_q1 + $this->kpi_b_value_q2), $formula);
            $formula = str_replace("C", ($model->fixed_c ? $this->kpi_c_value : $this->kpi_c_value_q1 + $this->kpi_c_value_q2), $formula);
            $formula = str_replace("D", ($model->fixed_d ? $this->kpi_d_value : $this->kpi_d_value_q1 + $this->kpi_d_value_q2), $formula);
            $formula = str_replace("E", ($model->fixed_e ? $this->kpi_e_value : $this->kpi_e_value_q1 + $this->kpi_e_value_q2), $formula);
            $formula = str_replace("F", ($model->fixed_f ? $this->kpi_f_value : $this->kpi_f_value_q1 + $this->kpi_f_value_q2), $formula);
            $formula = str_replace(",", "", $formula);
            $formula = str_replace("X", "*", $formula);


            @trigger_error(''); // a dummy to detect when error didn't occur
            @(eval('return ' . $formula . ';'));
            $e = error_get_last();
            if ($e['message'] != '') {
                $this->kpi_result_q2 = null;
            } else {
                $value = eval('return ' . $formula . ';');

                if ($this->kpi_a_value_q2 > 0 || $this->kpi_b_value_q2 > 0 || $this->kpi_c_value_q2 > 0 || $this->kpi_d_value_q2 > 0 || $this->kpi_e_value_q2 > 0 || $this->kpi_f_value_q2 > 0) {
                    $this->kpi_result_q2 = $value;
                } else {
                    $this->kpi_result_q2 = null;
                }
            }


            $formula = $formula_tmp;
            $formula = str_replace("A", ($model->fixed_a ? $this->kpi_a_value : $this->kpi_a_value_q1 + $this->kpi_a_value_q2 + $this->kpi_a_value_q3), $formula);
            $formula = str_replace("B", ($model->fixed_b ? $this->kpi_b_value : $this->kpi_b_value_q1 + $this->kpi_b_value_q2 + $this->kpi_b_value_q3), $formula);
            $formula = str_replace("C", ($model->fixed_c ? $this->kpi_c_value : $this->kpi_c_value_q1 + $this->kpi_c_value_q2 + $this->kpi_c_value_q3), $formula);
            $formula = str_replace("D", ($model->fixed_d ? $this->kpi_d_value : $this->kpi_d_value_q1 + $this->kpi_d_value_q2 + $this->kpi_d_value_q3), $formula);
            $formula = str_replace("E", ($model->fixed_e ? $this->kpi_e_value : $this->kpi_e_value_q1 + $this->kpi_e_value_q2 + $this->kpi_e_value_q3), $formula);
            $formula = str_replace("F", ($model->fixed_f ? $this->kpi_f_value : $this->kpi_f_value_q1 + $this->kpi_f_value_q2 + $this->kpi_f_value_q3), $formula);
            $formula = str_replace(",", "", $formula);
            $formula = str_replace("X", "*", $formula);


            @trigger_error(''); // a dummy to detect when error didn't occur
            @(eval('return ' . $formula . ';'));
            $e = error_get_last();
            if ($e['message'] != '') {
                $this->kpi_result_q3 = null;
            } else {
                $value = eval('return ' . $formula . ';');

                if ($this->kpi_a_value_q3 > 0 || $this->kpi_b_value_q3 > 0 || $this->kpi_c_value_q3 > 0 || $this->kpi_d_value_q3 > 0 || $this->kpi_e_value_q3 > 0 || $this->kpi_f_value_q3 > 0) {
                    $this->kpi_result_q3 = $value;
                } else {
                    $this->kpi_result_q3 = null;
                }
            }



            $formula = $formula_tmp;
            $formula = str_replace("A", ($model->fixed_a ? $this->kpi_a_value : $this->kpi_a_value_q1 + $this->kpi_a_value_q2 + $this->kpi_a_value_q3 + $this->kpi_a_value_q4), $formula);
            $formula = str_replace("B", ($model->fixed_b ? $this->kpi_b_value : $this->kpi_b_value_q1 + $this->kpi_b_value_q2 + $this->kpi_b_value_q3 + $this->kpi_b_value_q4), $formula);
            $formula = str_replace("C", ($model->fixed_c ? $this->kpi_c_value : $this->kpi_c_value_q1 + $this->kpi_c_value_q2 + $this->kpi_c_value_q3 + $this->kpi_c_value_q4), $formula);
            $formula = str_replace("D", ($model->fixed_d ? $this->kpi_d_value : $this->kpi_d_value_q1 + $this->kpi_d_value_q2 + $this->kpi_d_value_q3 + $this->kpi_d_value_q4), $formula);
            $formula = str_replace("E", ($model->fixed_e ? $this->kpi_e_value : $this->kpi_e_value_q1 + $this->kpi_e_value_q2 + $this->kpi_e_value_q3 + $this->kpi_e_value_q4), $formula);
            $formula = str_replace("F", ($model->fixed_f ? $this->kpi_f_value : $this->kpi_f_value_q1 + $this->kpi_f_value_q2 + $this->kpi_f_value_q3 + $this->kpi_f_value_q4), $formula);
            $formula = str_replace(",", "", $formula);
            $formula = str_replace("X", "*", $formula);


            @trigger_error(''); // a dummy to detect when error didn't occur
            @(eval('return ' . $formula . ';'));
            $e = error_get_last();
            if ($e['message'] != '') {
                $this->kpi_result_q4 = null;
            } else {
                $value = eval('return ' . $formula . ';');

                if ($this->kpi_a_value_q4 > 0 || $this->kpi_b_value_q4 > 0 || $this->kpi_c_value_q4 > 0 || $this->kpi_d_value_q4 > 0 || $this->kpi_e_value_q4 > 0 || $this->kpi_f_value_q4 > 0) {
                    $this->kpi_result_q4 = $value;
                } else {
                    $this->kpi_result_q4 = null;
                }
            }






        }







        if (!Yii::$app->user->isGuest) {
            $this->update_by = Yii::$app->user->identity->getId();
        }

        return parent::beforeSave($insert);
    }




    public function afterSave($insert, $changedAttributes)
    {


        $model = KpiList::findOne($this->kpi_id);
        $formula_tmp = strtoupper($model->formula);


        if ($formula_tmp) {

            $sql = "SELECT
co_province.zoneid,
IFNULL(SUM(s.kpi_a_value),0) AS a,
IFNULL(SUM(s.kpi_b_value),0) AS b,
IFNULL(SUM(s.kpi_c_value),0) AS c,
IFNULL(SUM(s.kpi_d_value),0) AS d,
IFNULL(SUM(s.kpi_e_value),0) AS e,
IFNULL(SUM(s.kpi_f_value),0) AS f,

IFNULL(SUM(s.kpi_a_value_q1),0) AS a1,
IFNULL(SUM(s.kpi_a_value_q2),0) AS a2,
IFNULL(SUM(s.kpi_a_value_q3),0) AS a3,
IFNULL(SUM(s.kpi_a_value_q4),0) AS a4,

IFNULL(SUM(s.kpi_b_value_q1),0) AS b1,
IFNULL(SUM(s.kpi_b_value_q2),0) AS b2,
IFNULL(SUM(s.kpi_b_value_q3),0) AS b3,
IFNULL(SUM(s.kpi_b_value_q4),0) AS b4,

IFNULL(SUM(s.kpi_c_value_q1),0) AS c1,
IFNULL(SUM(s.kpi_c_value_q2),0) AS c2,
IFNULL(SUM(s.kpi_c_value_q3),0) AS c3,
IFNULL(SUM(s.kpi_c_value_q4),0) AS c4,

IFNULL(SUM(s.kpi_d_value_q1),0) AS d1,
IFNULL(SUM(s.kpi_d_value_q2),0) AS d2,
IFNULL(SUM(s.kpi_d_value_q3),0) AS d3,
IFNULL(SUM(s.kpi_d_value_q4),0) AS d4,

IFNULL(SUM(s.kpi_e_value_q1),0) AS e1,
IFNULL(SUM(s.kpi_e_value_q2),0) AS e2,
IFNULL(SUM(s.kpi_e_value_q3),0) AS e3,
IFNULL(SUM(s.kpi_e_value_q4),0) AS e4,

IFNULL(SUM(s.kpi_f_value_q1),0) AS f1,
IFNULL(SUM(s.kpi_f_value_q2),0) AS f2,
IFNULL(SUM(s.kpi_f_value_q3),0) AS f3,
IFNULL(SUM(s.kpi_f_value_q4),0) AS f4


FROM
co_province
LEFT JOIN kpi_sum_region s
ON co_province.provid = s.kpi_provcode AND s.kpi_id = ".$this->kpi_id."
GROUP BY
co_province.zoneid
ORDER BY
co_province.zoneid ASC
";


            $connection = Yii::$app->db_kpi;
            $kpi = $connection->createCommand($sql)->queryAll();

            $sum_a = 0;
            $sum_b = 0;
            $sum_c = 0;
            $sum_d = 0;
            $sum_e = 0;
            $sum_f = 0;

            for ($i = 0; $i < sizeof($kpi); $i++) {
                $sum_a += $kpi[$i]['a'];
                $sum_b += $kpi[$i]['b'];
                $sum_c += $kpi[$i]['c'];
                $sum_d += $kpi[$i]['d'];
                $sum_e += $kpi[$i]['e'];
                $sum_f += $kpi[$i]['f'];


                $a = $kpi[$i]['a'];
                $b = $kpi[$i]['b'];
                $c = $kpi[$i]['c'];
                $d = $kpi[$i]['d'];
                $e = $kpi[$i]['e'];
                $f = $kpi[$i]['f'];

                $formula = $formula_tmp;
                $formula = str_replace("A", $a, $formula);
                $formula = str_replace("B", $b, $formula);
                $formula = str_replace("C", $c, $formula);
                $formula = str_replace("D", $d, $formula);
                $formula = str_replace("E", $e, $formula);
                $formula = str_replace("F", $f, $formula);
                $formula = str_replace(",", "", $formula);
                $formula = str_replace("X", "*", $formula);

                $result = null;
                @trigger_error(''); // a dummy to detect when error didn't occur
                @(eval('return ' . $formula . ';'));
                $e = error_get_last();
                if ($e['message'] != '') {
                    $result = null;
                } else {
                    $value = eval('return ' . $formula . ';');

                    $result = $value;
                }


                $formula = $formula_tmp;
                $formula = str_replace("A", ($model->fixed_a == 1 ? $a : $kpi[$i]['a1']), $formula);
                $formula = str_replace("B", ($model->fixed_b == 1 ? $b : $kpi[$i]['b1']), $formula);
                $formula = str_replace("C", ($model->fixed_c == 1 ? $c : $kpi[$i]['c1']), $formula);
                $formula = str_replace("D", ($model->fixed_d == 1 ? $d :$kpi[$i]['d1']), $formula);
                $formula = str_replace("E", ($model->fixed_e == 1 ? $e :$kpi[$i]['e1']), $formula);
                $formula = str_replace("F", ($model->fixed_f == 1 ? $f : $kpi[$i]['f1']), $formula);
                $formula = str_replace(",", "", $formula);
                $formula = str_replace("X", "*", $formula);


                @trigger_error(''); // a dummy to detect when error didn't occur
                @(eval('return ' . $formula . ';'));
                $e = error_get_last();
                if ($e['message'] != '') {
                    $result_q1 = null;
                } else {
                    $value = eval('return ' . $formula . ';');

                    if ($kpi[$i]['a1'] > 0 || $kpi[$i]['b1'] > 0 || $kpi[$i]['c1'] > 0 || $kpi[$i]['d1'] > 0 || $kpi[$i]['e1'] > 0 || $kpi[$i]['f1'] > 0) {
                        $result_q1 = $value;
                    } else {
                        $result_q1 = null;
                    }
                }


                $formula = $formula_tmp;
                $formula = str_replace("A", ($model->fixed_a == 1 ? $a : $kpi[$i]['a1'] + $kpi[$i]['a2']), $formula);
                $formula = str_replace("B", ($model->fixed_b == 1 ? $b : $kpi[$i]['b1'] + $kpi[$i]['b2']), $formula);
                $formula = str_replace("C", ($model->fixed_c == 1 ? $c : $kpi[$i]['c1'] + $kpi[$i]['c2']), $formula);
                $formula = str_replace("D", ($model->fixed_d == 1 ? $d : $kpi[$i]['d1'] + $kpi[$i]['d2']), $formula);
                $formula = str_replace("E", ($model->fixed_e == 1 ? $e : $kpi[$i]['e1'] + $kpi[$i]['e2']), $formula);
                $formula = str_replace("F", ($model->fixed_f == 1 ? $f : $kpi[$i]['f1'] + $kpi[$i]['f2']), $formula);
                $formula = str_replace(",", "", $formula);
                $formula = str_replace("X", "*", $formula);


                @trigger_error(''); // a dummy to detect when error didn't occur
                @(eval('return ' . $formula . ';'));
                $e = error_get_last();
                if ($e['message'] != '') {
                    $result_q2 = null;
                } else {
                    $value = eval('return ' . $formula . ';');

                    if ($kpi[$i]['a2'] > 0 || $kpi[$i]['b2'] > 0 || $kpi[$i]['c2'] > 0 || $kpi[$i]['d2'] > 0 || $kpi[$i]['e2'] > 0 || $kpi[$i]['f2'] > 0) {
                        $result_q2 = $value;
                    } else {
                        $result_q2 = null;
                    }
                }


                $formula = $formula_tmp;
                $formula = str_replace("A", ($model->fixed_a == 1 ? $a : $kpi[$i]['a1'] + $kpi[$i]['a2'] + $kpi[$i]['a3']), $formula);
                $formula = str_replace("B", ($model->fixed_b == 1 ? $b : $kpi[$i]['b1'] + $kpi[$i]['b2'] + $kpi[$i]['b3']), $formula);
                $formula = str_replace("C", ($model->fixed_c == 1 ? $c : $kpi[$i]['c1'] + $kpi[$i]['c2'] + $kpi[$i]['c3']), $formula);
                $formula = str_replace("D", ($model->fixed_d == 1 ? $d : $kpi[$i]['d1'] + $kpi[$i]['d2'] + $kpi[$i]['d3']), $formula);
                $formula = str_replace("E", ($model->fixed_e == 1 ? $e : $kpi[$i]['e1'] + $kpi[$i]['e2'] + $kpi[$i]['e3']), $formula);
                $formula = str_replace("F", ($model->fixed_f == 1 ? $f : $kpi[$i]['f1'] + $kpi[$i]['f2'] + $kpi[$i]['f3']), $formula);
                $formula = str_replace(",", "", $formula);
                $formula = str_replace("X", "*", $formula);


                @trigger_error(''); // a dummy to detect when error didn't occur
                @(eval('return ' . $formula . ';'));
                $e = error_get_last();
                if ($e['message'] != '') {
                    $result_q3 = null;
                } else {
                    $value = eval('return ' . $formula . ';');

                    if ($kpi[$i]['a3'] > 0 || $kpi[$i]['b3'] > 0 || $kpi[$i]['c3'] > 0 || $kpi[$i]['d3'] > 0 || $kpi[$i]['e3'] > 0 || $kpi[$i]['f3'] > 0) {
                        $result_q3 = $value;
                    } else {
                        $result_q3 = null;
                    }
                }



                $formula = $formula_tmp;
                $formula = str_replace("A", ($model->fixed_a == 1 ? $a : $kpi[$i]['a1'] + $kpi[$i]['a2'] + $kpi[$i]['a3'] + $kpi[$i]['a4']), $formula);
                $formula = str_replace("B", ($model->fixed_b == 1 ? $b : $kpi[$i]['b1'] + $kpi[$i]['b2'] + $kpi[$i]['b3'] + $kpi[$i]['b4']), $formula);
                $formula = str_replace("C", ($model->fixed_c == 1 ? $c : $kpi[$i]['c1'] + $kpi[$i]['c2'] + $kpi[$i]['c3'] + $kpi[$i]['c4']), $formula);
                $formula = str_replace("D", ($model->fixed_d == 1 ? $d : $kpi[$i]['d1'] + $kpi[$i]['d2'] + $kpi[$i]['d3'] + $kpi[$i]['d4']), $formula);
                $formula = str_replace("E", ($model->fixed_e == 1 ? $e : $kpi[$i]['e1'] + $kpi[$i]['e2'] + $kpi[$i]['e3'] + $kpi[$i]['e4']), $formula);
                $formula = str_replace("F", ($model->fixed_f == 1 ? $f : $kpi[$i]['f1'] + $kpi[$i]['f2'] + $kpi[$i]['f3'] + $kpi[$i]['f4']), $formula);
                $formula = str_replace(",", "", $formula);
                $formula = str_replace("X", "*", $formula);


                @trigger_error(''); // a dummy to detect when error didn't occur
                @(eval('return ' . $formula . ';'));
                $e = error_get_last();
                if ($e['message'] != '') {
                    $result_q4 = null;
                } else {
                    $value = eval('return ' . $formula . ';');
                    if ($kpi[$i]['a4'] > 0 || $kpi[$i]['b4'] > 0 || $kpi[$i]['c4'] > 0 || $kpi[$i]['d4'] > 0 || $kpi[$i]['e4'] > 0 || $kpi[$i]['f4'] > 0) {
                        $result_q4 = $value;
                    } else {
                        $result_q4 = null;
                    }

                }


                switch ($kpi[$i]['zoneid']) {
                    case "01":
                        $model->result_r01 = $result;
                        $model->result_r01_q1 = $result_q1;
                        $model->result_r01_q2 = $result_q2;
                        $model->result_r01_q3 = $result_q3;
                        $model->result_r01_q4 = $result_q4;
                        break;
                    case "02":
                        $model->result_r02 = $result;
                        $model->result_r02_q1 = $result_q1;
                        $model->result_r02_q2 = $result_q2;
                        $model->result_r02_q3 = $result_q3;
                        $model->result_r02_q4 = $result_q4;
                        break;
                    case "03":
                        $model->result_r03 = $result;
                        $model->result_r03_q1 = $result_q1;
                        $model->result_r03_q2 = $result_q2;
                        $model->result_r03_q3 = $result_q3;
                        $model->result_r03_q4 = $result_q4;
                        break;
                    case "04":
                        $model->result_r04 = $result;
                        $model->result_r04_q1 = $result_q1;
                        $model->result_r04_q2 = $result_q2;
                        $model->result_r04_q3 = $result_q3;
                        $model->result_r04_q4 = $result_q4;
                        break;
                    case "05":
                        $model->result_r05 = $result;
                        $model->result_r05_q1 = $result_q1;
                        $model->result_r05_q2 = $result_q2;
                        $model->result_r05_q3 = $result_q3;
                        $model->result_r05_q4 = $result_q4;
                        break;
                    case "06":
                        $model->result_r06 = $result;
                        $model->result_r06_q1 = $result_q1;
                        $model->result_r06_q2 = $result_q2;
                        $model->result_r06_q3 = $result_q3;
                        $model->result_r06_q4 = $result_q4;
                        break;
                    case "07":
                        $model->result_r07 = $result;
                        $model->result_r07_q1 = $result_q1;
                        $model->result_r07_q2 = $result_q2;
                        $model->result_r07_q3 = $result_q3;
                        $model->result_r07_q4 = $result_q4;
                        break;
                    case "08":
                        $model->result_r08 = $result;
                        $model->result_r08_q1 = $result_q1;
                        $model->result_r08_q2 = $result_q2;
                        $model->result_r08_q3 = $result_q3;
                        $model->result_r08_q4 = $result_q4;
                        break;
                    case "09":
                        $model->result_r09 = $result;
                        $model->result_r09_q1 = $result_q1;
                        $model->result_r09_q2 = $result_q2;
                        $model->result_r09_q3 = $result_q3;
                        $model->result_r09_q4 = $result_q4;
                        break;
                    case "10":
                        $model->result_r10 = $result;
                        $model->result_r10_q1 = $result_q1;
                        $model->result_r10_q2 = $result_q2;
                        $model->result_r10_q3 = $result_q3;
                        $model->result_r10_q4 = $result_q4;
                        break;
                    case "11":
                        $model->result_r11 = $result;
                        $model->result_r11_q1 = $result_q1;
                        $model->result_r11_q2 = $result_q2;
                        $model->result_r11_q3 = $result_q3;
                        $model->result_r11_q4 = $result_q4;
                        break;
                    case "12":
                        $model->result_r12 = $result;
                        $model->result_r12_q1 = $result_q1;
                        $model->result_r12_q2 = $result_q2;
                        $model->result_r12_q3 = $result_q3;
                        $model->result_r12_q4 = $result_q4;
                        break;
                    case "13":
                        $model->result_r13 = $result;
                        $model->result_r13_q1 = $result_q1;
                        $model->result_r13_q2 = $result_q2;
                        $model->result_r13_q3 = $result_q3;
                        $model->result_r13_q4 = $result_q4;
                        break;

                }

            }

            $a = $sum_a;
            $b = $sum_b;
            $c = $sum_c;
            $d = $sum_d;
            $e = $sum_e;
            $f = $sum_f;

            $formula = $formula_tmp;
            $formula = str_replace("A", $a, $formula);
            $formula = str_replace("B", $b, $formula);
            $formula = str_replace("C", $c, $formula);
            $formula = str_replace("D", $d, $formula);
            $formula = str_replace("E", $e, $formula);
            $formula = str_replace("F", $f, $formula);
            $formula = str_replace(",", "", $formula);
            $formula = str_replace("X", "*", $formula);

            $result = null;
            @trigger_error(''); // a dummy to detect when error didn't occur
            @(eval('return ' . $formula . ';'));
            $e = error_get_last();
            if ($e['message'] != '') {
                $result = null;
            } else {
                $value = eval('return ' . $formula . ';');

                $result = $value;
            }
            $model->result = $result;
            $model->save();
        }






        parent::afterSave($insert, $changedAttributes);
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
        if(in_array($type, ['attach_files','content_file','qwin_q1','qwin_q2','qwin_q3','qwin_q4','rep_q1','rep_q2','rep_q3','rep_q4'])){

            switch ($type) {
                case "attach_files":
                    $data = $this->attach_files;
                    break;
                case "content_file":
                    $data = $this->content_file;
                    break;
                case "qwin_q1":
                    $data = $this->qwin_q1;
                    break;
                case "qwin_q2":
                    $data = $this->qwin_q2;
                    break;
                case "qwin_q3":
                    $data = $this->qwin_q3;
                    break;
                case "qwin_q4":
                    $data = $this->qwin_q4;
                    break;
                case "rep_q1":
                    $data = $this->rep_q1;
                    break;
                case "rep_q2":
                    $data = $this->rep_q2;
                    break;
                case "rep_q3":
                    $data = $this->rep_q3;
                    break;
                case "rep_q4":
                    $data = $this->rep_q4;
                    break;
                default:
                    $data = $this->attach_files;
            }



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
        if(in_array($type, ['attach_files','content_file','qwin_q1','qwin_q2','qwin_q3','qwin_q4','rep_q1','rep_q2','rep_q3','rep_q4'])){

            switch ($type) {
                case "attach_files":
                    $data = $this->attach_files;
                    break;
                case "content_file":
                    $data = $this->content_file;
                    break;
                case "qwin_q1":
                    $data = $this->qwin_q1;
                    break;
                case "qwin_q2":
                    $data = $this->qwin_q2;
                    break;
                case "qwin_q3":
                    $data = $this->qwin_q3;
                    break;
                case "qwin_q4":
                    $data = $this->qwin_q4;
                    break;
                case "rep_q1":
                    $data = $this->rep_q1;
                    break;
                case "rep_q2":
                    $data = $this->rep_q2;
                    break;
                case "rep_q3":
                    $data = $this->rep_q3;
                    break;
                case "rep_q4":
                    $data = $this->rep_q4;
                    break;
                default:
                    $data = $this->attach_files;
            }
            $files = Json::decode($data);
            if(is_array($files)){
                foreach ($files as $key => $value) {
                    $contents_file = Yii::$app->urlManager->createAbsoluteUrl(['/kpi-sum/download', 'id'=>$this->id,'file'=>$key,'file_name'=>$value[0]]);
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
                    $initial[] = "<div><img src='".Url::toRoute(['/kpi-sum/download','id'=>$this->id,'file'=>$key,'file_name'=>$value[0]])."' class='file-preview-image' alt='".$value[0]."' title='".$value[0]."'></div>";
                }elseif($type=='icon'){
                    $initial[] = "<div class='file-preview-other'><h2><i class='glyphicon glyphicon-file'></i></h2></div>";
                }elseif($type=='config'){
                    $initial[] = [
                        'caption'=> $value,
                        'width'  => '80px',
                        'url'    => Url::to(['/kpi-sum/deletefile','id'=>$this->id,'fileName'=>$key,'field'=>$field]),
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
            [['hospcode', 'kpi_no', 'kpi_provcode', 'kpi_id'], 'required'],
            [['kpi_id', 'update_by'], 'integer'],
            [['kpi_a_value', 'kpi_b_value', 'kpi_c_value', 'kpi_d_value'], 'number'],
            //[['kpi_a_value', 'kpi_b_value'], 'required'],
            [['kpi_a_value', 'kpi_b_value'], 'safe'],

            [['kpi_a_value_q1', 'kpi_b_value_q1', 'kpi_c_value_q1', 'kpi_d_value_q1'], 'number'],
            //[['kpi_a_value_q1', 'kpi_b_value_q1'], 'required'],
            [['kpi_a_value_q1', 'kpi_b_value_q1'], 'safe'],

            [['kpi_a_value_q2', 'kpi_b_value_q2', 'kpi_c_value_q2', 'kpi_d_value_q2'], 'number'],
            //[['kpi_a_value_q2', 'kpi_b_value_q2'], 'required'],
            [['kpi_a_value_q2', 'kpi_b_value_q2'], 'safe'],

            [['kpi_a_value_q3', 'kpi_b_value_q3', 'kpi_c_value_q3', 'kpi_d_value_q3'], 'number'],
            //[['kpi_a_value_q3', 'kpi_b_value_q3'], 'required'],
            [['kpi_a_value_q3', 'kpi_b_value_q3'], 'safe'],

            [['kpi_a_value_q4', 'kpi_b_value_q4', 'kpi_c_value_q4', 'kpi_d_value_q4'], 'number'],
            //[['kpi_a_value_q4', 'kpi_b_value_q4'], 'required'],
            [['kpi_a_value_q4', 'kpi_b_value_q4'], 'safe'],

            [['attach_files', 'qwin_q1', 'qwin_q2', 'qwin_q3', 'qwin_q4'],'file','maxFiles'=>10,'skipOnEmpty'=>true],
            [['content_file', 'rep_q1', 'rep_q2', 'rep_q3', 'rep_q4'],'file','maxFiles'=>10,'skipOnEmpty'=>true],

            //[['kpi_a_value', 'kpi_b_value'], 'number', 'min'=>0, 'max'=>500000000],
            [['kpi_formula', 'kpi_sql', 'note'], 'string'],
            [['kpi_result', 'kpi_result_q1', 'kpi_result_q2', 'kpi_result_q3', 'kpi_result_q4'], 'number'],
            [['last_update'], 'safe'],
            [['hospcode', 'kpi_no'], 'string', 'max' => 5],
            [['kpi_provcode'], 'string', 'max' => 2],
            [['kpi_year'], 'string', 'max' => 4],
            [['kpi_condition'], 'string', 'max' => 255]
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kpi_provcode' => 'Kpi Provcode',
            'kpi_year' => 'Kpi Year',
            'kpi_id' => 'Kpi ID',
            'kpi_a_value' => 'Kpi A Value',
            'kpi_b_value' => 'Kpi B Value',
            'kpi_c_value' => 'Kpi C Value',
            'kpi_d_value' => 'Kpi D Value',
            'kpi_result' => 'Kpi Result',
            'update_by' => 'Update โดย',
            'kpi_condition' => 'Kpi Condition',
            'kpi_formula' => 'Kpi Formula',
            'kpi_sql' => 'Kpi Sql',
            'content_file' => 'แนบรูปภาพกิจกรรม',
            'attach_files' => 'แนบไฟล์',
            'qwin_q1' => 'แนบรายงาน Quick Win ไตรมาส 1',
            'qwin_q2' => 'แนบรายงาน Quick Win ไตรมาส 2',
            'qwin_q3' => 'แนบรายงาน Quick Win ไตรมาส 3',
            'qwin_q4' => 'แนบรายงาน Quick Win ไตรมาส 4',
            'last_update' => 'Last Update',
        ];
    }


    /**
     * @inheritdoc
     */
    public function getProvname()
    {
        return $this->hasOne(CoProvince::classname(), ['provid' => 'kpi_provcode']);
    }


    /**
     * @inheritdoc
     */
    public function getHosname()
    {
        return $this->hasOne(CHospital::classname(), ['hoscode' => 'hospcode']);
    }
}
