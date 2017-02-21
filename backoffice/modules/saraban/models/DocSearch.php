<?php

namespace app\modules\saraban\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\saraban\models\Doc;

/**
 * DocSearch represents the model behind the search form about `app\modules\saraban\models\Doc`.
 */
class DocSearch extends Doc
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'doc_no', 'from', 'urgent', 'secret', 'user_id'], 'integer'],
            [['ref', 'subject', 'description', 'doc_date', 'type', 'to', 'doc_file', 'attach_files', 'remark', 'date_create', 'last_update'], 'safe'],
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
        $query = Doc::find();

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
            'doc_no' => $this->doc_no,
            'doc_date' => $this->doc_date,
            'from' => $this->from,
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
            ->andFilterWhere(['like', 'doc_file', $this->doc_file])
            ->andFilterWhere(['like', 'attach_files', $this->attach_files])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }


    public function searchQuery($params)
    {
        $query = Doc::find();


        $this->load($params);

        $query->andFilterWhere([
            'id' => $this->id,
            'doc_no' => $this->doc_no,
            'doc_date' => $this->doc_date,
            'from' => $this->from,
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
            ->andFilterWhere(['like', 'doc_file', $this->doc_file])
            ->andFilterWhere(['like', 'attach_files', $this->attach_files])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $query;
    }
}
