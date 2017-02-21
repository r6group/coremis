<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Scripts;

/**
 * ScriptsSearch represents the model behind the search form about `app\models\Scripts`.
 */
class ScriptsSearch extends Scripts
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cat_id', 'user_id'], 'integer'],
            [['title', 'description', 'master_active', 'master_cron', 'force_master_cron', 'create_date', 'last_update', 'public'], 'safe'],
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
        $query = Scripts::find();

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
            'cat_id' => $this->cat_id,
            'create_date' => $this->create_date,
            'last_update' => $this->last_update,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'master_active', $this->master_active])
            ->andFilterWhere(['like', 'master_cron', $this->master_cron])
            ->andFilterWhere(['like', 'force_master_cron', $this->force_master_cron])
            ->andFilterWhere(['like', 'public', $this->public]);

        return $dataProvider;
    }
}
