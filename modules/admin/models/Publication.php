<?php

namespace app\modules\admin\models;

use Yii;
use yii\helpers\Html;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%publication}}".
 *
 * @property int $id
 * @property int $created_at
 * @property int $updated_at
 * @property string $name
 * @property string $link
 * @property string $text
 */
class Publication extends \yii\db\ActiveRecord
{
    /**
     * @return string table name
     */
    public static function tableName()
    {
        return '{{%publication}}';
    }

    /**
     * @return array the validation rules
     */
    public function rules()
    {
        return [
            ['name', 'required'],
            ['name', 'string', 'max' => 255],
            [['link', 'text'], 'string', 'max' => 600],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'PUBLICATION_MODEL_ID'),
            'created_at' => Yii::t('app', 'PUBLICATION_MODEL_CREATED_AT'),
            'updated_at' => Yii::t('app', 'PUBLICATION_MODEL_UPDATED_AT'),
            'name' => Yii::t('app', 'PUBLICATION_MODEL_NAME'),
            'link' => Yii::t('app', 'PUBLICATION_MODEL_LINK'),
            'text' => Yii::t('app', 'PUBLICATION_MODEL_TEXT'),
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * Получение ссылки на публикацию.
     * @return mixed
     */
    public function getLink()
    {
        return Html::a($this->link, $this->link);
    }
}