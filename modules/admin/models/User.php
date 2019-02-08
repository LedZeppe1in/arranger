<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property int $created_at
 * @property int $updated_at
 * @property string $username
 * @property string $auth_key
 * @property string $email_confirm_token
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $full_name
 * @property string $email
 * @property string $phone
 * @property string $youtube_link
 * @property string $instagram_link
 * @property string $facebook_link
 * @property string $twitter_link
 * @property string $vk_link
 * @property string $biography
 */
class User extends ActiveRecord implements IdentityInterface
{
    public $password;

    /**
     * @return string table name
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @return array the validation rules
     */
    public function rules()
    {
        return [
            ['username', 'required'],
            ['username', 'match', 'pattern' => '#^[\w_-]+$#i'],
            ['username', 'string', 'min' => 5, 'max' => 100],
            ['username', 'unique', 'targetClass' => self::className(),
                'message' => Yii::t('app', 'USER_MODEL_MESSAGE_USERNAME')],
            ['password', 'required', 'on' => 'create_and_update_password_hash'],
            ['password', 'string', 'min' => 5, 'on' => 'create_and_update_password_hash'],
            [['full_name', 'email', 'phone'], 'required'],
            ['full_name', 'match', 'pattern' => '/^[ A-Za-zА-Яа-яs,]+$/u'],
            ['full_name', 'string', 'min' => 5, 'max' => 100],
            [['email', 'phone'], 'string', 'max' => 255],
            [['youtube_link', 'instagram_link', 'facebook_link', 'twitter_link', 'vk_link'], 'string', 'max' => 600],
            ['biography', 'safe'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'USER_MODEL_ID'),
            'created_at' => Yii::t('app', 'USER_MODEL_CREATED_AT'),
            'updated_at' => Yii::t('app', 'USER_MODEL_UPDATED_AT'),
            'username' => Yii::t('app', 'USER_MODEL_USERNAME'),
            'password' => Yii::t('app', 'USER_MODEL_PASSWORD'),
            'auth_key' => Yii::t('app', 'USER_MODEL_AUTH_KEY'),
            'email_confirm_token' => Yii::t('app', 'USER_MODEL_EMAIL_CONFIRM_TOKEN'),
            'password_hash' => Yii::t('app', 'USER_MODEL_PASSWORD_HASH'),
            'password_reset_token' => Yii::t('app', 'USER_MODEL_PASSWORD_RESET_TOKEN'),
            'full_name' => Yii::t('app', 'USER_MODEL_FULL_NAME'),
            'email' => Yii::t('app', 'USER_MODEL_EMAIL'),
            'phone' => Yii::t('app', 'USER_MODEL_PHONE'),
            'youtube_link' => Yii::t('app', 'USER_MODEL_YOUTUBE_LINK'),
            'instagram_link' => Yii::t('app', 'USER_MODEL_INSTAGRAM_LINK'),
            'facebook_link' => Yii::t('app', 'USER_MODEL_FACEBOOK_LINK'),
            'twitter_link' => Yii::t('app', 'USER_MODEL_TWITTER_LINK'),
            'vk_link' => Yii::t('app', 'USER_MODEL_VK_LINK'),
            'biography' => Yii::t('app', 'USER_MODEL_BIOGRAPHY'),
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * Поиск пользователя по идентификатору.
     * @param int|string $id
     * @return null|static
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('findIdentityByAccessToken is not implemented.');
    }

    /**
     * Поиск пользователя по имени.
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * Получить id пользователя.
     * @return mixed
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * Получить ключ аутентификации.
     * @return string
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * Проверка ключа аутентификации.
     * @param string $authKey
     * @return bool
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Генерирование ключа аутентификации при активации "запомнить меня".
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Проверка пароля.
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Установка пароля.
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Finds out if password reset token is valid.
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if(empty($token))
            return false;

        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);

        return $timestamp + $expire >= time();
    }

    /**
     * Finds user by password reset token.
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }
        return static::findOne([
            'password_reset_token' => $token,
        ]);
    }

    /**
     * Generates new password reset token.
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token.
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    /**
     * @param string $email_confirm_token
     * @return static|null
     */
    public static function findByEmailConfirmToken($email_confirm_token)
    {
        return static::findOne(['email_confirm_token' => $email_confirm_token]);
    }

    /**
     * Generates email confirmation token.
     */
    public function generateEmailConfirmToken()
    {
        $this->email_confirm_token = Yii::$app->security->generateRandomString();
    }

    /**
     * Removes email confirmation token.
     */
    public function removeEmailConfirmToken()
    {
        $this->email_confirm_token = null;
    }

    /**
     * Генерация ключа автоматической аутентификации перед записью в БД.
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert)
                $this->generateAuthKey();

            return true;
        }

        return false;
    }
}