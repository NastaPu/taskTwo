<?php

use yii\grid\GridView;
use app\models\User;

/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel  app\models\MessageSearch */

$this->title = 'Список сообщений';

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel'  => $searchModel,
    'columns' => [
        [
            'attribute' => 'user_id',
            'label' => 'ID',
            'value' => function ($data) {
                return $data->user_id;
            },
        ],
        [
            'attribute' => 'name',
            'label' => 'От кого',
            'value' => function ($data) {
                $user = User::getUser($data->user_id);
                return $user->username;
            },
        ],
        [
            'attribute' => 'contact_id',
            'label' => 'Кому',
            'value' => function ($data) {
                $user = User::getUser($data->contact_id);
                return $user->username;
            },
        ],
        [
            'attribute' => 'send_time',
            'label' => 'Время отпрвки',
            'value' => function ($data) {
               return $data->send_time;
            },
        ],
        [
            'attribute' => 'delivery_time',
            'label' => 'Время получения',
            'value' => function ($data) {
                return $data->delivery_time;
            },
        ],
        [
            'attribute' => 'content',
            'label' => 'Сообщение',
            'value' => function ($data) {
                return $data->content;
            },
        ],
    ]
]);