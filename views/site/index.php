<?php

/* @var $this yii\web\View */

use yii\bootstrap\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

$this->title = 'My Yii Application';
?>

<div class="site-index">

<h3>
    Balance: <?= $currentBalance ?>
</h3>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'startDate')->widget(DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd',
    ])->label('Start date') ?>

    <?= $form->field($model, 'endDate')->widget(DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd',
    ])->label('End date') ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
