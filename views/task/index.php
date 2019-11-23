<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create Task', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <p>
        <?= Html::a('Search Task', ['search'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?php Pjax::begin([ 'id' => 'pjaxContent']); ?>
<!--    --><?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
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
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'delete' => function ($url) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', '#', [
                            'title' => Yii::t('yii', 'Delete'),
                            'aria-label' => Yii::t('yii', 'Delete'),
                            'onclick' => "
                                if (confirm('Are you sure you want to delete this item?')) {
                                    $.ajax('$url', {
                                        type: 'POST'
                                    }).done(function(data) {
                                       $.pjax.reload({container: '#pjaxContent', async: false});
                                    });
                                }
                                return false;
                            ",
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
