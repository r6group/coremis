<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ScriptDetails;

/**
 * ScriptDetailsSearch represents the model behind the search form about `app\models\ScriptDetails`.
 */
class ScriptDetailsSearch extends ScriptDetails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent_id'], 'integer'],
            [['table_name', 'title', 'description', 'script', 'script_cron', 'force_script_cron', 'active', 'client_office_type', 'create_date', 'last_update'], 'safe'],
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
        $query = ScriptDetails::find();

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
            'parent_id' => $this->parent_id,
        ]);

        $query->andFilterWhere(['like', 'table_name', $this->table_name])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'script', $this->script])
            ->andFilterWhere(['like', 'script_cron', $this->script_cron])
            ->andFilterWhere(['like', 'force_script_cron', $this->force_script_cron])
            ->andFilterWhere(['like', 'active', $this->active])
            ->andFilterWhere(['like', 'client_office_type', $this->client_office_type]);

        return $dataProvider;
    }
}
