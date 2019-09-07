<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%service}}".
 *
 * @property int $id
 * @property int $created_at
 * @property int $updated_at
 * @property string $name
 * @property string $price
 * @property string $description
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%service}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price'], 'required'],
            ['price', 'match', 'pattern'=>'/^[0-9]{1,12}(\.[0-9]{0,2})?$/',
                'message' => Yii::t('app', 'SERVICE_MODEL_MESSAGE_PRICE')],
            [['description'], 'string', 'max' => 600],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'SERVICE_MODEL_ID'),
            'created_at' => Yii::t('app', 'SERVICE_MODEL_CREATED_AT'),
            'updated_at' => Yii::t('app', 'SERVICE_MODEL_UPDATED_AT'),
            'name' => Yii::t('app', 'SERVICE_MODEL_NAME'),
            'price' => Yii::t('app', 'SERVICE_MODEL_PRICE'),
            'description' => Yii::t('app', 'SERVICE_MODEL_DESCRIPTION'),
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
}
