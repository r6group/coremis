<?php

namespace kpi\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use kpi\models\KpiList;

/**
 * KpiListSearch represents the model behind the search form about `kpi\models\KpiList`.
 */
class KpiListSearch extends KpiList
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'kpi_no'], 'integer'],
            [['kpi_year', 'kpi_level', 'title', 'description', 'kpi_unit', 'target', 'pop_target', 'method', 'data_source', 'a_unit', 'a_desc', 'b_unit', 'b_desc', 'operator', 'tags', 'eval_freq', 'baseline', 'eval_rule', 'eval_method', 'doc', 'tech_support', 'director', 'reporter', 'areabase_kpi_provcode', 'areabase_kpi_regioncode', 'remark', 'last_update'], 'safe'],
            [['kpi_order', 'goal', 'max_value'], 'number'],
            [['level_ministry', 'level_region', 'level_province', 'level_impotant', 'level_ceo_assess'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = KpiList::find()->orderBy('kpi_no');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        if (\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin') || \Yii::$app->user->can('kpi-admin')) {

        } else {
            $query->andFilterWhere([
                'user_id' => \Yii::$app->user->getId(),
            ]);
        }

        $query->andFilterWhere([
            'my_kpi' => 0,
        ]);


        $query->andFilterWhere(['<>', 'hdc', '1']);


        $query->andFilterWhere([
            'id' => $this->id,
            'kpi_no' => $this->kpi_no,
            'kpi_order' => $this->kpi_order,
            'goal' => $this->goal,
            'max_value' => $this->max_value,
            'level_ministry' => $this->level_ministry,
            'level_region' => $this->level_region,
            'level_province' => $this->level_province,
            'level_impotant' => $this->level_impotant,
            'level_ceo_assess' => $this->level_ceo_assess,
            'last_update' => $this->last_update,
        ]);

        $query->andFilterWhere(['like', 'kpi_year', $this->kpi_year])
            ->andFilterWhere(['like', 'kpi_level', $this->kpi_level])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'kpi_unit', $this->kpi_unit])
            ->andFilterWhere(['like', 'target', $this->target])
            ->andFilterWhere(['like', 'pop_target', $this->pop_target])
            ->andFilterWhere(['like', 'method', $this->method])
            ->andFilterWhere(['like', 'data_source', $this->data_source])
            ->andFilterWhere(['like', 'a_unit', $this->a_unit])
            ->andFilterWhere(['like', 'a_desc', $this->a_desc])
            ->andFilterWhere(['like', 'b_unit', $this->b_unit])
            ->andFilterWhere(['like', 'b_desc', $this->b_desc])
            ->andFilterWhere(['like', 'operator', $this->operator])
            ->andFilterWhere(['like', 'tags', $this->tags])
            ->andFilterWhere(['like', 'eval_freq', $this->eval_freq])
            ->andFilterWhere(['like', 'baseline', $this->baseline])
            ->andFilterWhere(['like', 'eval_rule', $this->eval_rule])
            ->andFilterWhere(['like', 'eval_method', $this->eval_method])
            ->andFilterWhere(['like', 'doc', $this->doc])
            ->andFilterWhere(['like', 'tech_support', $this->tech_support])
            ->andFilterWhere(['like', 'director', $this->director])
            ->andFilterWhere(['like', 'reporter', $this->reporter])
            ->andFilterWhere(['like', 'areabase_kpi_provcode', $this->areabase_kpi_provcode])
            ->andFilterWhere(['like', 'areabase_kpi_regioncode', $this->areabase_kpi_regioncode])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }



    public function searchAssign($level, $district = 0)
    {
        $query = KpiList::find()->orderBy('kpi_no');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

//        $this->load($params);
//
//        if (!$this->validate()) {
//            // uncomment the following line if you do not want to any records when validation fails
//            // $query->where('0=1');
//            return $dataProvider;
//        }

        $query->select('kpi_list.id,
kpi_list.kpi_year,
kpi_list.kpi_level,
kpi_list.kpi_no,
kpi_list.kpi_order,
kpi_list.title,
kpi_data_permission.`level`,
kpi_data_permission.level_code,
kpi_data_permission.user_id AS reporter_id,
kpi_data_permission.assign_by,
kpi_data_permission.assign_date')->leftJoin('kpi_data_permission', 'kpi_list.id = kpi_data_permission.kpi_id');


        $query->andFilterWhere([
            'kpi_year' => '2560',
        ]);

        $query->andFilterWhere([
            'my_kpi' => 0,
        ]);
        $query->andFilterWhere(['<>', 'hdc', '1']);


        if (is_array($level) && (sizeof($level) > 0)) {
            $query->andFilterWhere(['in', 'kpi_level', $level]);
        } else {
            $query->andFilterWhere(['kpi_level' => '-',]);
        }


        if ($district == 1) {
            $query->andWhere(['kpi_data_permission.user_id' => \Yii::$app->user->identity->getId()]);
            $query->having(['user_id' => \Yii::$app->user->identity->getId()]);
        }



        $query->andFilterWhere(['like', 'kpi_year', $this->kpi_year])
            ->andFilterWhere(['like', 'kpi_level', $this->kpi_level])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'kpi_unit', $this->kpi_unit])
            ->andFilterWhere(['like', 'target', $this->target])
            ->andFilterWhere(['like', 'pop_target', $this->pop_target])
            ->andFilterWhere(['like', 'method', $this->method])
            ->andFilterWhere(['like', 'data_source', $this->data_source])
            ->andFilterWhere(['like', 'a_unit', $this->a_unit])
            ->andFilterWhere(['like', 'a_desc', $this->a_desc])
            ->andFilterWhere(['like', 'b_unit', $this->b_unit])
            ->andFilterWhere(['like', 'b_desc', $this->b_desc])
            ->andFilterWhere(['like', 'operator', $this->operator])
            ->andFilterWhere(['like', 'tags', $this->tags])
            ->andFilterWhere(['like', 'eval_freq', $this->eval_freq])
            ->andFilterWhere(['like', 'baseline', $this->baseline])
            ->andFilterWhere(['like', 'eval_rule', $this->eval_rule])
            ->andFilterWhere(['like', 'eval_method', $this->eval_method])
            ->andFilterWhere(['like', 'doc', $this->doc])
            ->andFilterWhere(['like', 'tech_support', $this->tech_support])
            ->andFilterWhere(['like', 'director', $this->director])
            ->andFilterWhere(['like', 'reporter', $this->reporter])
            ->andFilterWhere(['like', 'areabase_kpi_provcode', $this->areabase_kpi_provcode])
            ->andFilterWhere(['like', 'areabase_kpi_regioncode', $this->areabase_kpi_regioncode])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }



    public function searchMyAssign()
    {
        $query = KpiList::find()->orderBy('kpi_no');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

//        $this->load($params);
//
//        if (!$this->validate()) {
//            // uncomment the following line if you do not want to any records when validation fails
//            // $query->where('0=1');
//            return $dataProvider;
//        }

        $query->select('kpi_list.id,
kpi_list.kpi_year,
kpi_list.kpi_level,
kpi_list.kpi_no,
kpi_list.kpi_order,
kpi_list.title,
kpi_data_permission.`level`,
kpi_data_permission.level_code,
kpi_data_permission.user_id AS reporter_id,
kpi_data_permission.assign_by,
kpi_data_permission.assign_date')->rightjoin('kpi_data_permission', 'kpi_list.id = kpi_data_permission.kpi_id');


        $query->andFilterWhere([
            'kpi_year' => '2560',
            'kpi_data_permission.user_id' => \Yii::$app->user->identity->getId(),
        ]);

        $query->andFilterWhere(['<>', 'hdc', '1']);


        $query->andFilterWhere(['like', 'kpi_year', $this->kpi_year])
            ->andFilterWhere(['like', 'kpi_level', $this->kpi_level])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'kpi_unit', $this->kpi_unit])
            ->andFilterWhere(['like', 'target', $this->target])
            ->andFilterWhere(['like', 'pop_target', $this->pop_target])
            ->andFilterWhere(['like', 'method', $this->method])
            ->andFilterWhere(['like', 'data_source', $this->data_source])
            ->andFilterWhere(['like', 'a_unit', $this->a_unit])
            ->andFilterWhere(['like', 'a_desc', $this->a_desc])
            ->andFilterWhere(['like', 'b_unit', $this->b_unit])
            ->andFilterWhere(['like', 'b_desc', $this->b_desc])
            ->andFilterWhere(['like', 'operator', $this->operator])
            ->andFilterWhere(['like', 'tags', $this->tags])
            ->andFilterWhere(['like', 'eval_freq', $this->eval_freq])
            ->andFilterWhere(['like', 'baseline', $this->baseline])
            ->andFilterWhere(['like', 'eval_rule', $this->eval_rule])
            ->andFilterWhere(['like', 'eval_method', $this->eval_method])
            ->andFilterWhere(['like', 'doc', $this->doc])
            ->andFilterWhere(['like', 'tech_support', $this->tech_support])
            ->andFilterWhere(['like', 'director', $this->director])
            ->andFilterWhere(['like', 'reporter', $this->reporter])
            ->andFilterWhere(['like', 'areabase_kpi_provcode', $this->areabase_kpi_provcode])
            ->andFilterWhere(['like', 'areabase_kpi_regioncode', $this->areabase_kpi_regioncode])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }


    public function mykpi_search($params)
    {
        $query = KpiList::find()->orderBy('kpi_no');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'user_id' => \Yii::$app->user->getId(),
        ]);
        $query->andFilterWhere(['<>', 'hdc', '1']);

        $query->andFilterWhere([
            'id' => $this->id,
            'kpi_no' => $this->kpi_no,
            'kpi_order' => $this->kpi_order,
            'goal' => $this->goal,
            'max_value' => $this->max_value,
            'level_ministry' => $this->level_ministry,
            'level_region' => $this->level_region,
            'level_province' => $this->level_province,
            'level_impotant' => $this->level_impotant,
            'level_ceo_assess' => $this->level_ceo_assess,
            'last_update' => $this->last_update,
        ]);

        $query->andFilterWhere(['like', 'kpi_year', $this->kpi_year])
            ->andFilterWhere(['like', 'kpi_level', $this->kpi_level])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'kpi_unit', $this->kpi_unit])
            ->andFilterWhere(['like', 'target', $this->target])
            ->andFilterWhere(['like', 'pop_target', $this->pop_target])
            ->andFilterWhere(['like', 'method', $this->method])
            ->andFilterWhere(['like', 'data_source', $this->data_source])
            ->andFilterWhere(['like', 'a_unit', $this->a_unit])
            ->andFilterWhere(['like', 'a_desc', $this->a_desc])
            ->andFilterWhere(['like', 'b_unit', $this->b_unit])
            ->andFilterWhere(['like', 'b_desc', $this->b_desc])
            ->andFilterWhere(['like', 'operator', $this->operator])
            ->andFilterWhere(['like', 'tags', $this->tags])
            ->andFilterWhere(['like', 'eval_freq', $this->eval_freq])
            ->andFilterWhere(['like', 'baseline', $this->baseline])
            ->andFilterWhere(['like', 'eval_rule', $this->eval_rule])
            ->andFilterWhere(['like', 'eval_method', $this->eval_method])
            ->andFilterWhere(['like', 'doc', $this->doc])
            ->andFilterWhere(['like', 'tech_support', $this->tech_support])
            ->andFilterWhere(['like', 'director', $this->director])
            ->andFilterWhere(['like', 'reporter', $this->reporter])
            ->andFilterWhere(['like', 'areabase_kpi_provcode', $this->areabase_kpi_provcode])
            ->andFilterWhere(['like', 'areabase_kpi_regioncode', $this->areabase_kpi_regioncode])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }


    public function kpigroup_search($params, $group_id)
    {
        $query = KpiList::find()->orderBy('kpi_no');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'my_kpi_group' => $group_id,
        ]);
        $query->andFilterWhere(['<>', 'hdc', '1']);


        $query->andFilterWhere([
            'id' => $this->id,
            'kpi_no' => $this->kpi_no,
            'kpi_order' => $this->kpi_order,
            'goal' => $this->goal,
            'max_value' => $this->max_value,
            'level_ministry' => $this->level_ministry,
            'level_region' => $this->level_region,
            'level_province' => $this->level_province,
            'level_impotant' => $this->level_impotant,
            'level_ceo_assess' => $this->level_ceo_assess,
            'last_update' => $this->last_update,
        ]);

        $query->andFilterWhere(['like', 'kpi_year', $this->kpi_year])
            ->andFilterWhere(['like', 'kpi_level', $this->kpi_level])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'kpi_unit', $this->kpi_unit])
            ->andFilterWhere(['like', 'target', $this->target])
            ->andFilterWhere(['like', 'pop_target', $this->pop_target])
            ->andFilterWhere(['like', 'method', $this->method])
            ->andFilterWhere(['like', 'data_source', $this->data_source])
            ->andFilterWhere(['like', 'a_unit', $this->a_unit])
            ->andFilterWhere(['like', 'a_desc', $this->a_desc])
            ->andFilterWhere(['like', 'b_unit', $this->b_unit])
            ->andFilterWhere(['like', 'b_desc', $this->b_desc])
            ->andFilterWhere(['like', 'operator', $this->operator])
            ->andFilterWhere(['like', 'tags', $this->tags])
            ->andFilterWhere(['like', 'eval_freq', $this->eval_freq])
            ->andFilterWhere(['like', 'baseline', $this->baseline])
            ->andFilterWhere(['like', 'eval_rule', $this->eval_rule])
            ->andFilterWhere(['like', 'eval_method', $this->eval_method])
            ->andFilterWhere(['like', 'doc', $this->doc])
            ->andFilterWhere(['like', 'tech_support', $this->tech_support])
            ->andFilterWhere(['like', 'director', $this->director])
            ->andFilterWhere(['like', 'reporter', $this->reporter])
            ->andFilterWhere(['like', 'areabase_kpi_provcode', $this->areabase_kpi_provcode])
            ->andFilterWhere(['like', 'areabase_kpi_regioncode', $this->areabase_kpi_regioncode])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }

}
