<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class User
 * @package app\models
 *
 * @property $id integer
 * @property $username string
 * @property $password string
 * @property $state string
 */
class User extends ActiveRecord
{
    public function rules()
    {
        return [
            [['username', 'state'], 'required'],
            [['username', 'state'], 'string'],
            ['username', 'string', 'min' => 6],
            ['password', 'string', 'min' => 6],
            ['id', 'integer']
        ];
    }

    public static function tableName()
    {
        return '{{%user}}';
    }

    public static function getUser($id)
    {
        return User::find()->where(['id' => $id])->one();
    }

    public static function getUsers()
    {
        return User::find()->all();
    }
    
}
