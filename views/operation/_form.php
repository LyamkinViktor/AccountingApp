<?php

use app\models\Category;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Operation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="operation-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'created_at')->widget(DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd',
    ])->label('Date') ?>

    <?= $form->field($model, 'type')->radioList([1 => 'income', 0 => 'expense'])->label('Select type') ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?php
        $categories = Category::find()->all();
        $items = ArrayHelper::map($categories, 'id', 'name');
        $params = [
            'prompt' => 'Select a category',
        ];
    ?>
    <?= $form->field($model, 'category_id')->dropDownList($items, $params)->label('Category') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
