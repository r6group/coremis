<?php

namespace app\modules\hrm\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Profile;

/**
 * ProfileSearch represents the model behind the search form about `common\models\Profile`.
 */
class ProfileSearch extends Profile
{
    public function rules()
    {
        return [
            [['id', 'gender', 'user_affiliate_id', 'workgroup', 'update_by', 'user_id'], 'integer'],
            [['stf_id', 'off_id', 'off_id18', 'cid', 'pname', 'name', 'surname', 'middle_name', 'photo_path', 'stf_type', 'main_pst', 'position', 'plevel', 'dr_special', 'licence_no', 'insig', 'birthday', 'avatar_url', 'ctzshp', 'nthlty', 'religion', 'occptn', 'blood_group', 'addr_part', 'rd_part', 'moo_part', 'tmb_part', 'amp_part', 'chw_part', 'home_tel', 'mobile_tel', 'email', 'marry_status', 'sps_name', 'mth_name', 'fth_name', 'last_update', 'Status', 'Note', 'dept_id', 'dt_hired', 'dt_started', 'dt_term', 'work_phone', 'phone_ext', 'emer_contact', 'emer_phone'], 'safe'],
            [['balance', 'bonus_balance', 'Income'], 'number'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Profile::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            $query->andFilterWhere(['like', 'off_id', '00017']);
            return $query;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'birthday' => $this->birthday,
            'gender' => $this->gender,
            'balance' => $this->balance,
            'bonus_balance' => $this->bonus_balance,
            'user_affiliate_id' => $this->user_affiliate_id,
            'workgroup' => $this->workgroup,
            'Income' => $this->Income,
            'last_update' => $this->last_update,
            'update_by' => $this->update_by,
            'user_id' => $this->user_id,
            'dt_hired' => $this->dt_hired,
            'dt_started' => $this->dt_started,
        ]);

        $query->andFilterWhere(['like', 'stf_id', $this->stf_id])
            ->andFilterWhere(['like', 'off_id', $this->off_id])
            ->andFilterWhere(['like', 'off_id18', $this->off_id18])
            ->andFilterWhere(['like', 'cid', $this->cid])
            ->andFilterWhere(['like', 'pname', $this->pname])
            ->andFilterWhere(['like', 'name', $this->name])
            ->orFilterWhere(['like', 'surname', $this->name])
            ->andFilterWhere(['like', 'middle_name', $this->middle_name])
            ->andFilterWhere(['like', 'photo_path', $this->photo_path])
            ->andFilterWhere(['like', 'stf_type', $this->stf_type])
            ->andFilterWhere(['like', 'main_pst', $this->main_pst])
            ->andFilterWhere(['like', 'position', $this->position])
            ->andFilterWhere(['like', 'plevel', $this->plevel])
            ->andFilterWhere(['like', 'dr_special', $this->dr_special])
            ->andFilterWhere(['like', 'licence_no', $this->licence_no])
            ->andFilterWhere(['like', 'insig', $this->insig])
            ->andFilterWhere(['like', 'avatar_url', $this->avatar_url])
            ->andFilterWhere(['like', 'ctzshp', $this->ctzshp])
            ->andFilterWhere(['like', 'nthlty', $this->nthlty])
            ->andFilterWhere(['like', 'religion', $this->religion])
            ->andFilterWhere(['like', 'occptn', $this->occptn])
            ->andFilterWhere(['like', 'blood_group', $this->blood_group])
            ->andFilterWhere(['like', 'addr_part', $this->addr_part])
            ->andFilterWhere(['like', 'rd_part', $this->rd_part])
            ->andFilterWhere(['like', 'moo_part', $this->moo_part])
            ->andFilterWhere(['like', 'tmb_part', $this->tmb_part])
            ->andFilterWhere(['like', 'amp_part', $this->amp_part])
            ->andFilterWhere(['like', 'chw_part', $this->chw_part])
            ->andFilterWhere(['like', 'home_tel', $this->home_tel])
            ->andFilterWhere(['like', 'mobile_tel', $this->mobile_tel])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'marry_status', $this->marry_status])
            ->andFilterWhere(['like', 'sps_name', $this->sps_name])
            ->andFilterWhere(['like', 'mth_name', $this->mth_name])
            ->andFilterWhere(['like', 'fth_name', $this->fth_name])
            ->andFilterWhere(['like', 'Status', $this->Status])
            ->andFilterWhere(['like', 'Note', $this->Note])
            ->andFilterWhere(['like', 'dept_id', $this->dept_id])
            ->andFilterWhere(['like', 'dt_term', $this->dt_term])
            ->andFilterWhere(['like', 'work_phone', $this->work_phone])
            ->andFilterWhere(['like', 'phone_ext', $this->phone_ext])
            ->andFilterWhere(['like', 'emer_contact', $this->emer_contact])
            ->andFilterWhere(['like', 'emer_phone', $this->emer_phone]);

        return $query;
    }
}
