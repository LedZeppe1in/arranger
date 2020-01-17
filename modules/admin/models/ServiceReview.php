<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%service_review}}".
 *
 * @property int $id
 * @property int $created_at
 * @property int $updated_at
 * @property int $service
 * @property int $review
 *
 * @property Review $arrReview
 * @property Service $arrService
 */
class ServiceReview extends \yii\db\ActiveRecord
{
    /**
     * @return string table name
     */
    public static function tableName()
    {
        return '{{%service_review}}';
    }

    /**
     * @return array the validation rules
     */
    public function rules()
    {
        return [
            [['service', 'review'], 'required'],
            [['service', 'review'], 'default', 'value' => null],
            [['service', 'review'], 'integer'],
            [['review'], 'exist', 'skipOnError' => true, 'targetClass' => Review::className(),
                'targetAttribute' => ['review' => 'id']],
            [['service'], 'exist', 'skipOnError' => true, 'targetClass' => Service::className(),
                'targetAttribute' => ['service' => 'id']],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'SERVICE_REVIEW_MODEL_ID'),
            'created_at' => Yii::t('app', 'SERVICE_REVIEW_MODEL_CREATED_AT'),
            'updated_at' => Yii::t('app', 'SERVICE_REVIEW_MODEL_UPDATED_AT'),
            'service' => Yii::t('app', 'SERVICE_REVIEW_MODEL_SHEET_MUSIC'),
            'review' => Yii::t('app', 'SERVICE_REVIEW_MODEL_REVIEW'),
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArrReview()
    {
        return $this->hasOne(Review::className(), ['id' => 'review']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArrService()
    {
        return $this->hasOne(Service::className(), ['id' => 'service']);
    }
}