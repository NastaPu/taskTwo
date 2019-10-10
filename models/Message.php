<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Message
 * @package app\models
 *
 * @property $id integer
 * @property $user_id integer
 * @property $contact_id integer
 * @property $send_time string
 * @property $delivery_time string
 * @property $content string

 */
class Message extends ActiveRecord
{
    public function rules()
    {
        return [
            [['user_id', 'contact_id'], 'required'],
            ['content', 'string'],
            [['user_id', 'contact_id'], 'integer']
        ];
    }

    public static function tableName()
    {
        return '{{%message}}';
    }
}
