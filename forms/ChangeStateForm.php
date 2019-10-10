<?php

namespace app\forms;

use yii\base\Model;

/**
 * Class ChangeStateForm
 * @package app\forms
 *
 * @property $id integer
 * @property $state string
 */
class ChangeStateForm extends Model
{
    public $id;
    public $state;

    public function rules()
    {
        return [
            ['id', 'integer'],
            ['state', 'string']
        ];
    }
}