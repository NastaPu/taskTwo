<?php

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\forms\UserMessageForm */
/* @var $users array */

$this->title = 'Поиск сообщений пользователя';
?>
<div class="create">
    <h2><?= $this->title ?></h2>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-find', 'method' => 'post']); ?>

            <?= $form->field($model, 'id')->dropDownList($users)->label('Имя пользователя:')?>

            <div class="form-group">
                <?= Html::submitButton('Найти', ['class' => 'btn btn-primary',]) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
