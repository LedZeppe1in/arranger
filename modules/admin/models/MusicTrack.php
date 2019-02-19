<?php

namespace app\modules\admin\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%music_track}}".
 *
 * @property int $id
 * @property int $created_at
 * @property int $updated_at
 * @property string $name
 * @property int $type
 * @property string $duration
 * @property string $price
 * @property string $preview
 * @property string $file
 * @property string $description
 */
class MusicTrack extends \yii\db\ActiveRecord
{
    const TYPE_JINGLE = 0; // Тип трека "Джингл"
    const TYPE_STEMS = 1;  // Тип трека "Мультитрек"

    public $preview_file;     // Файл превью трека
    public $music_track_file; // Файл трека

    /**
     * @return string table name
     */
    public static function tableName()
    {
        return '{{%music_track}}';
    }

    /**
     * @return array the validation rules
     */
    public function rules()
    {
        return [
            [['name', 'duration', 'price', 'preview', 'file'], 'required'],
            ['name', 'string', 'max' => 255],
            ['type', 'integer'],
            ['duration', 'safe'],
            ['price', 'match', 'pattern'=>'/^[0-9]{1,12}(\.[0-9]{0,2})?$/',
                'message' => Yii::t('app', 'MUSIC_TRACK_MODEL_MESSAGE_PRICE')],
            [['preview', 'file', 'description'], 'string'],
            ['preview_file', 'file', 'skipOnEmpty' => !$this->isNewRecord, 'extensions' => 'mp3'],
            ['music_track_file', 'file', 'skipOnEmpty' => !$this->isNewRecord, 'extensions' => 'wav'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'MUSIC_TRACK_MODEL_ID'),
            'created_at' => Yii::t('app', 'MUSIC_TRACK_MODEL_CREATED_AT'),
            'updated_at' => Yii::t('app', 'MUSIC_TRACK_MODEL_UPDATED_AT'),
            'name' => Yii::t('app', 'MUSIC_TRACK_MODEL_NAME'),
            'type' => Yii::t('app', 'MUSIC_TRACK_MODEL_TYPE'),
            'duration' => Yii::t('app', 'MUSIC_TRACK_MODEL_DURATION'),
            'price' => Yii::t('app', 'MUSIC_TRACK_MODEL_PRICE'),
            'preview' => Yii::t('app', 'MUSIC_TRACK_MODEL_PREVIEW'),
            'file' => Yii::t('app', 'MUSIC_TRACK_MODEL_FILE'),
            'description' => Yii::t('app', 'MUSIC_TRACK_MODEL_DESCRIPTION'),
            'preview_file' => Yii::t('app', 'MUSIC_TRACK_MODEL_PREVIEW'),
            'music_track_file' => Yii::t('app', 'MUSIC_TRACK_MODEL_FILE'),
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * Получение списка типов треков.
     * @return array - массив всех возможных типов партитур
     */
    public static function getTypesArray()
    {
        return [
            self::TYPE_JINGLE => Yii::t('app', 'MUSIC_TRACK_MODEL_TYPE_JINGLE'),
            self::TYPE_STEMS => Yii::t('app', 'MUSIC_TRACK_MODEL_TYPE_STEMS'),
        ];
    }

    /**
     * Получение названия типа трека.
     * @return mixed
     */
    public function getTypeName()
    {
        return ArrayHelper::getValue(self::getTypesArray(), $this->type);
    }
}