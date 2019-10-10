<?php

namespace app\forms;

use yii\base\Model;

/**
 * Class SearchForm
 * @package app\forms
 *
 * @property $search string
 */
class SearchForm extends Model
{
    public $search;

    public function rules()
    {
        return [
            ['search', 'string']
        ];
    }
}