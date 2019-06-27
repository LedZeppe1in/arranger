<?php

namespace app\modules\admin\models;

use Imagick;
use Yii;
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
            [['file', 'description'], 'string'],
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
     * Генерация изображения партитуры в формате JPG на основе PDF-документа.
     */
    public function generateSheetMusicJpg()
    {
        // Создание объекта изображения
        $imagick = new Imagick();
        // Установка разрешения результирующего jpg
        $imagick->setResolution(300, 300);
        // Чтение первой страницы pdf
        $imagick->readImage($this->file.'[0]');
        // Установка формата jpg
        $imagick->setImageFormat('jpg');
        // Получить итератор пикселей
        $imageIterator = $imagick->getPixelIterator();
        // Вычисление кол-ва рядов (строк) пикселей в изображении
        $count = 0;
        while ($pixels = $imageIterator->getNextIteratorRow())
            $count++;
        // Получить итератор пикселей
        $imageIterator = $imagick->getPixelIterator();
        // Устанавливает итератор пикселей на последний ряд
        $imageIterator->setIteratorLastRow();
        // Переменная для хранения счетчика количества рядов пикселей
        $row_number = 0;
        // Обход всех рядов пикселей с последнего ряда
        while ($pixels = $imageIterator->getPreviousIteratorRow()) {
            // Если текущее кол-во пройденных рядов пикселей меньше половины от общего кол-ва
            if ($row_number < round($count / 2) ) {
                // Поход по пикселям в строке (столбцы)
                foreach ($pixels as $column => $pixel) {
                    /* @var $pixel \ImagickPixel */
                    // Перекрашивание каждого пикселя в белый цвет
                    $pixel->setColor('rgba(255, 255, 255, 255)');
                }
                // Синхронизация итератора (это необходимо делать на каждой итерации)
                $imageIterator->syncIterator();
            }
            $row_number++;
        }
        // Название файла полученного изображения
        $output_file = 'image_preview.jpg';
        // Сохранение изображения
        file_put_contents($output_file, $imagick, FILE_USE_INCLUDE_PATH);
    }
}