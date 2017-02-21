<?php

namespace kpi\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use kpi\models\KpiSumMoph;
use kpi\models\KpiSumRegion;
use kpi\models\KpiSum;
/**
 * KpiSumSearch represents the model behind the search form about `kpi\models\KpiSum`.
 */
class KpiSumSearch extends KpiSum
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'kpi_id', 'kpi_order', 'kpi_a_value', 'kpi_b_value'], 'integer'],
            [['kpi_provcode', 'kpi_year', 'kpi_definition', 'kpi_condition', 'kpi_formula', 'kpi_sql', 'last_update'], 'safe'],
            [['kpi_result'], 'number'],
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
    public function searchMoph($params)
    {
        $query = KpiSumMoph::find();


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'kpi_id' => $this->kpi_id,
            'kpi_order' => $this->kpi_order,
            'kpi_a_value' => $this->kpi_a_value,
            'kpi_b_value' => $this->kpi_b_value,
            'kpi_result' => $this->kpi_result,
            'last_update' => $this->last_update,
        ]);

        $query->andFilterWhere(['like', 'kpi_provcode', $this->kpi_provcode])
            ->andFilterWhere(['like', 'kpi_year', $this->kpi_year])
            ->andFilterWhere(['like', 'kpi_definition', $this->kpi_definition])
            ->andFilterWhere(['like', 'kpi_condition', $this->kpi_condition])
            ->andFilterWhere(['like', 'kpi_formula', $this->kpi_formula])
            ->andFilterWhere(['like', 'kpi_sql', $this->kpi_sql]);

        $query->orderBy(['hospcode' => SORT_ASC]);

        return $dataProvider;
    }


    public function searchRegion($params)
    {
        $query = KpiSumRegion::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'kpi_id' => $this->kpi_id,
            'kpi_order' => $this->kpi_order,
            'kpi_a_value' => $this->kpi_a_value,
            'kpi_b_value' => $this->kpi_b_value,
            'kpi_result' => $this->kpi_result,
            'last_update' => $this->last_update,
        ]);

        $query->andFilterWhere(['like', 'kpi_provcode', $this->kpi_provcode])
            ->andFilterWhere(['like', 'kpi_year', $this->kpi_year])
            ->andFilterWhere(['like', 'kpi_definition', $this->kpi_definition])
            ->andFilterWhere(['like', 'kpi_condition', $this->kpi_condition])
            ->andFilterWhere(['like', 'kpi_formula', $this->kpi_formula])
            ->andFilterWhere(['like', 'kpi_sql', $this->kpi_sql]);


        $query->orderBy(['hospcode' => SORT_ASC]);
        return $dataProvider;
    }


    public function searchProvince($params)
    {
        $query = KpiSum::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'kpi_id' => $this->kpi_id,
            'kpi_order' => $this->kpi_order,
            'kpi_a_value' => $this->kpi_a_value,
            'kpi_b_value' => $this->kpi_b_value,
            'kpi_result' => $this->kpi_result,
            'last_update' => $this->last_update,
        ]);

        $query->andFilterWhere(['like', 'kpi_provcode', $this->kpi_provcode])
            ->andFilterWhere(['like', 'kpi_year', $this->kpi_year])
            ->andFilterWhere(['like', 'kpi_definition', $this->kpi_definition])
            ->andFilterWhere(['like', 'kpi_condition', $this->kpi_condition])
            ->andFilterWhere(['like', 'kpi_formula', $this->kpi_formula])
            ->andFilterWhere(['like', 'kpi_sql', $this->kpi_sql]);

        $query->orderBy(['hospcode' => SORT_ASC]);

        return $dataProvider;
    }
}
