<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Task */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->hiddenInput(['task_id' => $model->id])->label(false)?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

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

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success create']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
