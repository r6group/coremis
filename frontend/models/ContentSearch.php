<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Content;

/**
 * ContentSearch represents the model behind the search form about `app\modules\saraban\models\Content`.
 */
class ContentSearch extends Content
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'content_no', 'cat_id', 'urgent', 'secret', 'user_id'], 'integer'],
            [['ref', 'subject', 'description', 'content_date', 'type', 'to', 'content_file', 'attach_files', 'remark', 'date_create', 'last_update'], 'safe'],
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
        $query = Content::find();

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
            'content_no' => $this->content_no,
            'content_date' => $this->content_date,
            'cat_id' => $this->cat_id,
            'urgent' => $this->urgent,
            'secret' => $this->secret,
            'user_id' => $this->user_id,
            'date_create' => $this->date_create,
            'last_update' => $this->last_update,
        ]);

        $query->andFilterWhere(['like', 'ref', $this->ref])
            ->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'to', $this->to])
            ->andFilterWhere(['like', 'content_file', $this->content_file])
            ->andFilterWhere(['like', 'attach_files', $this->attach_files])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }


    public function searchQuery($params)
    {
        $query = Content::find();


        $this->load($params);

        $query->andFilterWhere([
            'id' => $this->id,
            'content_no' => $this->content_no,
            'content_date' => $this->content_date,
            'cat_id' => $this->cat_id,
            'urgent' => $this->urgent,
            'secret' => $this->secret,
            'user_id' => $this->user_id,
            'date_create' => $this->date_create,
            'last_update' => $this->last_update,
        ]);

        $query->andFilterWhere(['like', 'ref', $this->ref])
            ->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'to', $this->to])
            ->andFilterWhere(['like', 'content_file', $this->content_file])
            ->andFilterWhere(['like', 'attach_files', $this->attach_files])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $query;
    }
}
