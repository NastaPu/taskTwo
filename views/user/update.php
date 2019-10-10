<?php

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\User */
/* @var $isUpdate bool */
/* @var $user */

$this->title = 'Обновление пользователя';

$items = ['онлайн' => 'онлайн', 'офлайн' => 'офлайн'];
?>
<div class="create">
    <h2><?= $this->title ?></h2>
        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'form-update', 'method' => 'post']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'value' => $user->username]) ?>
                <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>
                <?= $form->field($model, 'state')->dropDownList($items, ['value' => $user->state])->label('Состояние')?>

                <div class="form-group">
                    <?= Html::submitButton('Обновить', ['class' => 'btn btn-primary']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
</div>
