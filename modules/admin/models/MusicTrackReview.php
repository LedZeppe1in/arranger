<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%music_track_review}}".
 *
 * @property int $id
 * @property int $created_at
 * @property int $updated_at
 * @property int $music_track
 * @property int $review
 *
 * @property MusicTrack $arrMusicTrack
 * @property Review $arrReview
 */
class MusicTrackReview extends \yii\db\ActiveRecord
{
    /**
     * @return string table name
     */
    public static function tableName()
    {
        return '{{%music_track_review}}';
    }

    /**
     * @return array the validation rules
     */
    public function rules()
    {
        return [
            [['music_track', 'review'], 'required'],
            [['music_track', 'review'], 'default', 'value' => null],
            [['music_track', 'review'], 'integer'],
            [['music_track'], 'exist', 'skipOnError' => true, 'targetClass' => MusicTrack::className(),
                'targetAttribute' => ['music_track' => 'id']],
            [['review'], 'exist', 'skipOnError' => true, 'targetClass' => Review::className(),
                'targetAttribute' => ['review' => 'id']],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'MUSIC_TRACK_REVIEW_MODEL_ID'),
            'created_at' => Yii::t('app', 'MUSIC_TRACK_REVIEW_MODEL_CREATED_AT'),
            'updated_at' => Yii::t('app', 'MUSIC_TRACK_REVIEW_MODEL_UPDATED_AT'),
            'music_track' => Yii::t('app', 'MUSIC_TRACK_REVIEW_MODEL_MUSIC_TRACK'),
            'review' => Yii::t('app', 'MUSIC_TRACK_REVIEW_MODEL_REVIEW'),
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
    public function getArrMusicTrack()
    {
        return $this->hasOne(MusicTrack::className(), ['id' => 'music_track']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArrReview()
    {
        return $this->hasOne(Review::className(), ['id' => 'review']);
    }
}