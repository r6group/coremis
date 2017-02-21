<?php

namespace kpi\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use kpi\models\KpiData;

/**
 * KpiDataSearch represents the model behind the search form about `app\models\KpiData`.
 */
class KpiDataSearch extends KpiData
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hoscode', 'kpi_year', 'last_update', 'provcode', 'distcode', 'subdistcode'], 'safe'],
            [['kpi_id', 'kpi_a_value', 'kpi_b_value'], 'integer'],
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
        $query = KpiData::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'kpi_id' => $this->kpi_id,
            'kpi_a_value' => $this->kpi_a_value,
            'kpi_b_value' => $this->kpi_b_value,
            'last_update' => $this->last_update,
        ]);

        $query->andFilterWhere(['like', 'hoscode', $this->hoscode])
            ->andFilterWhere(['like', 'kpi_year', $this->kpi_year])
            ->andFilterWhere(['like', 'provcode', $this->provcode])
            ->andFilterWhere(['like', 'distcode', $this->distcode])
            ->andFilterWhere(['like', 'subdistcode', $this->subdistcode]);

        return $dataProvider;
    }
}
