<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%event}}".
 *
 * @property int $id
 * @property int $created_at
 * @property int $updated_at
 * @property string $name
 * @property string $date
 * @property string $duration
 * @property string $location
 * @property string $link
 * @property string $description
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * @return string table name
     */
    public static function tableName()
    {
        return '{{%event}}';
    }

    /**
     * @return array the validation rules
     */
    public function rules()
    {
        return [
            [['name', 'date', 'duration', 'location'], 'required'],
            [['date'], 'date', 'format' => 'php:d.m.Y H:i'],
            [['duration'], 'time', 'format' => 'H:i'],
            [['name', 'location'], 'string', 'max' => 255],
            [['link', 'description'], 'string', 'max' => 600],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'EVENT_MODEL_ID'),
            'created_at' => Yii::t('app', 'EVENT_MODEL_CREATED_AT'),
            'updated_at' => Yii::t('app', 'EVENT_MODEL_UPDATED_AT'),
            'name' => Yii::t('app', 'EVENT_MODEL_NAME'),
            'date' => Yii::t('app', 'EVENT_MODEL_DATE'),
            'duration' => Yii::t('app', 'EVENT_MODEL_DURATION'),
            'location' => Yii::t('app', 'EVENT_MODEL_LOCATION'),
            'link' => Yii::t('app', 'EVENT_MODEL_LINK'),
            'description' => Yii::t('app', 'EVENT_MODEL_DESCRIPTION'),
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * Представление даты и времени в правильном формате в поле ввода.
     */
    public function afterFind() {
        parent::afterFind ();
        $this->date = Yii::$app->formatter->asDatetime($this->date);
    }
}