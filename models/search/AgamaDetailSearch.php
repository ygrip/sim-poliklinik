<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AgamaDetail;

/**
* AgamaDetailSearch represents the model behind the search form about `app\models\AgamaDetail`.
*/
class AgamaDetailSearch extends AgamaDetail
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'agama_id'], 'integer'],
            [['nama'], 'safe'],
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
$query = AgamaDetail::find();

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
            'agama_id' => $this->agama_id,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama]);

return $dataProvider;
}
}