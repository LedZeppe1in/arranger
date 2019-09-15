<?php

namespace app\modules\admin\models;

use Yii;
use Imagick;
use yii\helpers\ArrayHelper;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%sheet_music}}".
 *
 * @property int $id
 * @property int $created_at
 * @property int $updated_at
 * @property string $name
 * @property integer $type
 * @property string $price
 * @property string $preview
 * @property string $file
 * @property string $description
 */
class SheetMusic extends \yii\db\ActiveRecord
{
    const TYPE_BIG_BAND = 0;   // Тип партитуры "Big Band"
    const TYPE_JAZZ_COMBO = 1; // Тип партитуры "Jazz Combo"
    const TYPE_POP_MUSIC = 2;  // Тип партитуры "Pop music"

    public $sheet_music_file;  // Файл партитур

    /**
     * @return string table name
     */
    public static function tableName()
    {
        return '{{%sheet_music}}';
    }

    /**
     * @return array the validation rules
     */
    public function rules()
    {
        return [
            [['name', 'type', 'price', 'file'], 'required'],
            ['name', 'string', 'max' => 255],
            ['type', 'integer'],
            ['price', 'match', 'pattern'=>'/^[0-9]{1,12}(\.[0-9]{0,2})?$/',
                'message' => Yii::t('app', 'SHEET_MUSIC_MODEL_MESSAGE_PRICE')],
            [['preview', 'file', 'description'], 'string'],
            ['sheet_music_file', 'file', 'skipOnEmpty' => !$this->isNewRecord, 'extensions' => 'pdf'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'SHEET_MUSIC_MODEL_ID'),
            'created_at' => Yii::t('app', 'SHEET_MUSIC_MODEL_CREATED_AT'),
            'updated_at' => Yii::t('app', 'SHEET_MUSIC_MODEL_UPDATED_AT'),
            'name' => Yii::t('app', 'SHEET_MUSIC_MODEL_NAME'),
            'type' => Yii::t('app', 'SHEET_MUSIC_MODEL_TYPE'),
            'price' => Yii::t('app', 'SHEET_MUSIC_MODEL_PRICE'),
            'preview' => Yii::t('app', 'SHEET_MUSIC_MODEL_PREVIEW'),
            'file' => Yii::t('app', 'SHEET_MUSIC_MODEL_FILE'),
            'description' => Yii::t('app', 'SHEET_MUSIC_MODEL_DESCRIPTION'),
            'sheet_music_file' => Yii::t('app', 'SHEET_MUSIC_MODEL_FILE'),
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * Получение списка типов партитур.
     * @return array - массив всех возможных типов партитур
     */
    public static function getTypesArray()
    {
        return [
            self::TYPE_BIG_BAND => Yii::t('app', 'SHEET_MUSIC_MODEL_TYPE_BIG_BAND'),
            self::TYPE_JAZZ_COMBO => Yii::t('app', 'SHEET_MUSIC_MODEL_TYPE_JAZZ_COMBO'),
            self::TYPE_POP_MUSIC => Yii::t('app', 'SHEET_MUSIC_MODEL_TYPE_POP_MUSIC'),
        ];
    }

    /**
     * Получение названия типа партитуры.
     * @return mixed
     */
    public function getTypeName()
    {
        return ArrayHelper::getValue(self::getTypesArray(), $this->type);
    }

    /**
     * Получение кол-ва страниц в партитуре.
     * @return int
     */
    public function getPdfPageCount()
    {
        $im = new Imagick();
        $im->pingImage($this->file);
        $page_count = $im->getNumberImages();

        return $page_count;
    }
}