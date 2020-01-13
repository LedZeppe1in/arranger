<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%review}}".
 *
 * @property int $id
 * @property int $created_at
 * @property int $updated_at
 * @property string $name
 * @property string $city
 * @property string $occupation
 * @property string $text
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * @return string table name
     */
    public static function tableName()
    {
        return '{{%review}}';
    }

    /**
     * @return array the validation rules
     */
    public function rules()
    {
        return [
            [['name', 'text'], 'required'],
            [['name', 'city', 'occupation'], 'string', 'max' => 255],
            [['text'], 'string'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'REVIEW_MODEL_ID'),
            'created_at' => Yii::t('app', 'REVIEW_MODEL_CREATED_AT'),
            'updated_at' => Yii::t('app', 'REVIEW_MODEL_UPDATED_AT'),
            'name' => Yii::t('app', 'REVIEW_MODEL_NAME'),
            'city' => Yii::t('app', 'REVIEW_MODEL_CITY'),
            'occupation' => Yii::t('app', 'REVIEW_MODEL_OCCUPATION'),
            'text' => Yii::t('app', 'REVIEW_MODEL_TEXT'),
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
}