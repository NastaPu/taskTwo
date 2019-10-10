<?php

namespace app\forms;

use yii\base\Model;

/**
 * Class UserMessageForm
 * @package app\forms
 *
 * @property $id integer
 */
class UserMessageForm extends Model
{
    public $id;

    public function rules()
    {
        return [
            ['id', 'integer']
        ];
    }
}