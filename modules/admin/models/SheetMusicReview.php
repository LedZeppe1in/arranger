<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%sheet_music_review}}".
 *
 * @property int $id
 * @property int $created_at
 * @property int $updated_at
 * @property int $sheet_music
 * @property int $review
 *
 * @property Review $arrReview
 * @property SheetMusic $arrSheetMusic
 */
class SheetMusicReview extends \yii\db\ActiveRecord
{
    /**
     * @return string table name
     */
    public static function tableName()
    {
        return '{{%sheet_music_review}}';
    }

    /**
     * @return array the validation rules
     */
    public function rules()
    {
        return [
            [['sheet_music', 'review'], 'required'],
            [['sheet_music', 'review'], 'default', 'value' => null],
            [['sheet_music', 'review'], 'integer'],
            [['review'], 'exist', 'skipOnError' => true, 'targetClass' => Review::className(),
                'targetAttribute' => ['review' => 'id']],
            [['sheet_music'], 'exist', 'skipOnError' => true, 'targetClass' => SheetMusic::className(),
                'targetAttribute' => ['sheet_music' => 'id']],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'SHEET_MUSIC_REVIEW_MODEL_ID'),
            'created_at' => Yii::t('app', 'SHEET_MUSIC_REVIEW_MODEL_CREATED_AT'),
            'updated_at' => Yii::t('app', 'SHEET_MUSIC_REVIEW_MODEL_UPDATED_AT'),
            'sheet_music' => Yii::t('app', 'SHEET_MUSIC_REVIEW_MODEL_SHEET_MUSIC'),
            'review' => Yii::t('app', 'SHEET_MUSIC_REVIEW_MODEL_REVIEW'),
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
    public function getArrSheetMusic()
    {
        return $this->hasOne(SheetMusic::className(), ['id' => 'sheet_music']);
    }
}