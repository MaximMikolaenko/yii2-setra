<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TaskSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'type')->dropDownList([
        '0' => 'New',
        '1' => 'Initiated',
        '2'=> 'Finished'
    ], [
        'prompt' => 'Select type'
    ]); ?>

    <?= $form->field($model, 'status')->dropDownList([
        '0' => 'Inactive',
        '1' => 'Active'
    ], [
        'prompt' => 'Select status'
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
