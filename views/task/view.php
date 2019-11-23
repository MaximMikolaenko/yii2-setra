<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Task */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="task-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'create_datetime',
            [
                'attribute' => 'type',
                'value' => function($data){
                    if($data->type == 0) {
                        return 'New';
                    } elseif ($data->type == 1) {
                        return 'Initiated';
                    } else {
                        return 'Finished';
                    }

                }
            ],
            [
                'attribute' => 'status',
                'value' => function($data){
                     return $data->status ? 'Active' : 'Inactive';
                }
            ],
            'description:ntext',
            'start_datetime',
            'end_datetime',
        ],
    ]) ?>

</div>
