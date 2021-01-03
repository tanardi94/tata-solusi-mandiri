<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "promos".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string|null $start_date
 * @property string|null $end_date
 * @property int|null $use_alert
 * @property int|null $status
 * @property string $created_at
 * @property int|null $created_by
 * @property string $updated_at
 * @property int|null $updated_by
 */
class Promos extends \frontend\models\CustomActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'promos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['description'], 'string'],
            [['start_date', 'end_date', 'created_at', 'updated_at'], 'safe'],
            [['use_alert', 'status', 'created_by', 'updated_by'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Judul',
            'description' => 'Deskripsi',
            'start_date' => 'Tanggal Mulai',
            'end_date' => 'Tanggal Selesai',
            'use_alert' => 'Use Alert',
            'status' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
