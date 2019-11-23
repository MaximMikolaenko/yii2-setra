<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property string $name
 * @property string $create_datetime
 * @property int $type
 * @property int $status
 * @property string $description
 * @property string $start_datetime
 * @property string $end_datetime
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'name', 'type', 'status'], 'required'],
            [['create_datetime', 'start_datetime', 'end_datetime', 'description', 'name', 'type', 'status'], 'safe'],
            [['type', 'status'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
//            'id' => 'ID',
            'name' => 'Name',
            'create_datetime' => 'Create Datetime',
            'type' => 'Type',
            'status' => 'Status',
            'description' => 'Description',
            'start_datetime' => 'Start Datetime',
            'end_datetime' => 'End Datetime',
        ];
    }
}
