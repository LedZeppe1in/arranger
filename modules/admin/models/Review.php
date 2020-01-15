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
 *
 * @property SheetMusicReview[] $SheetMusicReviews
 * @property SheetMusic[] $SheetMusics
 * @property MusicTrackReview[] $MusicTrackReviews
 * @property MusicTrack[] $MusicTracks
 * @property ServiceReview[] $ServiceReviews
 * @property Service[] $Services
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSheetMusicReviews()
    {
        return $this->hasMany(SheetMusicReview::className(), ['review' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSheetMusics()
    {
        return $this->hasMany(SheetMusic::className(), ['id' => 'sheet_music'])->via('sheetMusicReviews');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicTrackReviews()
    {
        return $this->hasMany(MusicTrackReview::className(), ['review' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicTracks()
    {
        return $this->hasMany(MusicTrack::className(), ['id' => 'music_track'])->via('musicTrackReviews');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceReviews()
    {
        return $this->hasMany(ServiceReview::className(), ['review' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServices()
    {
        return $this->hasMany(Service::className(), ['id' => 'service'])->via('serviceReviews');
    }
}