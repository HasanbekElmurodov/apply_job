<?php

namespace app\modules\admin\models\search;

use app\models\Examiner;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Interview;

/**
 * InterviewSearch represents the model behind the search form of `app\models\Interview`.
 */
class InterviewSearch extends Interview
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'examiner_id', 'applicant_id'], 'integer'],
            [['interview_time'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Interview::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'examiner_id' => $this->getExaminer()->all(),
            'applicant_id' => $this->applicant_id,
            'interview_time' => $this->interview_time,
        ]);

        return $dataProvider;
    }
}
