<?php

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\User */
/* @var $id integer */
/* @var $isCreate bool */

$this->title = 'Создание пользователя';

$items = ['онлайн' => 'онлайн', 'офлайн' => 'офлайн'];
?>
<div class="create">
    <h2><?= $this->title ?></h2>
    <?php if($isCreate): ?>
        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'form-create', 'method' => 'post']); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                    <?= $form->field($model, 'password')->passwordInput(['required' => true])->label() ?>
                    <?= $form->field($model, 'state')->dropDownList($items)->label('Состояние')?>

                    <div class="form-group">
                        <?= Html::submitButton('Создать', ['class' => 'btn btn-primary',]) ?>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
     <?php else:?>
        <p>ID пользователя: <?= $id ?> </p>
    <?php endif; ?>
</div>
