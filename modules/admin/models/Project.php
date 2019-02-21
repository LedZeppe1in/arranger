<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%project}}".
 *
 * @property int $id
 * @property int $created_at
 * @property int $updated_at
 * @property string $name
 * @property string $link
 * @property string $description
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%project}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'link'], 'required'],
            [['link', 'description'], 'string', 'max' => 600],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'PROJECT_MODEL_ID'),
            'created_at' => Yii::t('app', 'PROJECT_MODEL_CREATED_AT'),
            'updated_at' => Yii::t('app', 'PROJECT_MODEL_UPDATED_AT'),
            'name' => Yii::t('app', 'PROJECT_MODEL_NAME'),
            'link' => Yii::t('app', 'PROJECT_MODEL_LINK'),
            'description' => Yii::t('app', 'PROJECT_MODEL_DESCRIPTION'),
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
}
