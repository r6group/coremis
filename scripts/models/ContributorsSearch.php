<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Contributors;

/**
 * ContributorsSearch represents the model behind the search form about `app\models\Contributors`.
 */
class ContributorsSearch extends Contributors
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'script_id', 'user_id'], 'integer'],
            [['join_date'], 'safe'],
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
        $query = Contributors::find();

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
            'id' => $this->id,
            'script_id' => $this->script_id,
            'user_id' => $this->user_id,
            'join_date' => $this->join_date,
        ]);

        return $dataProvider;
    }
}
