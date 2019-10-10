<?php

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\Message */
/* @var $users array */

$this->title = 'Создание сообщения';

?>
<div class="create">
    <h2><?= $this->title ?></h2>
        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'form-create', 'method' => 'post']); ?>

                <?= $form->field($model, 'user_id')->dropDownList($users)->label('От  кого:')?>
                <?= $form->field($model, 'contact_id')->dropDownList($users)->label('Кому:')?>
                <?= $form->field($model, 'content')->textarea()->label('Текст сообщения:')?>

                <div class="form-group">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary',]) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
</div>
