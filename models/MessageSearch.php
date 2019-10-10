<?php

namespace app\models;

use yii\data\ActiveDataProvider;

class MessageSearch extends Message
{
    public $content;
    public $user_id;

    public function rules()
    {
        return [
            [['content', 'user_id'], 'safe']
        ];
    }

    /**
     * Search function
     *
     * @param $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Message::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'user_id',
                'send_time',
                'delivery_time',
                'content'
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $this->content = trim($this->content);

        $query->andWhere(['user_id' => $this->user_id]);
        $query->andWhere('content like "%' . $this->content . '%" ');
        

        return $dataProvider;
    }
}
