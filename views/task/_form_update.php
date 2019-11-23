<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Task */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-form">
    <?php Pjax::begin(); ?>
    <?php $form = ActiveForm::begin(['id' => 'update_form',]); ?>

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
        <?= Html::submitButton('Save', ['class' => 'btn btn-success update']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php Pjax::end(); ?>
<?php
$js = <<<JS
  $('#update_form').on('beforeSubmit', function(){
        var task_id = $('#task-id').val();
        var name = $('#task-name').val();
        var type = $('#task-type').val();
        var status = $('#task-status').val();
        var description = $('#task-description').val();

        $.ajax({
            url: '/task/submit?id=' + task_id,
            data: {
                name: name,
                type: type,
                status: status,
                description: description
            },
            type: 'POST',
            success: function () {
                alert('success');
            },
            error: function () {
                alert('Error');
            }
        })
        return false;
    });
JS;
$this->registerJs($js);

?>
</div>
