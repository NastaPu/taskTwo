<?php

namespace app\forms;

use yii\base\Model;

/**
 * Class GetUserForm
 * @package app\forms
 *
 * @property $id integer
 * @property $name string
 */
class GetUserForm extends Model
{
    public $id;
    public $name;

    public function rules()
    {
        return [
            ['id', 'integer'],
            ['name', 'string']
        ];
    }
}