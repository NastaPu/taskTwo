<?php

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\forms\ChangeStateForm */
/* @var $ids array */
/* @var $isResponse bool */
/* @var $user \app\models\User */

$this->title = 'Измнение состояния пользователя';
$states = ['онлайн' => 'онлайн', 'офлайн' => 'офлайн'];
?>
<div class="create">
    <h2><?= $this->title ?></h2>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-state', 'method' => 'post']); ?>

            <?= $form->field($model, 'id')->dropDownList($ids)->label('ID пользователя:') ?>
            <?= $form->field($model, 'state')->dropDownList($states)->label('Состояние:') ?>

            <div class="form-group">
                <?= Html::submitButton('Обновить', ['class' => 'btn btn-primary',]) ?>
            </div>

            <?php if($isResponse): ?>
                <p>ID: <?= $user->id ?></p>
                <p>Состояние: <?= $user->state ?></p>
            <?php endif; ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
