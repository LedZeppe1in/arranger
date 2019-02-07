<?php

namespace app\commands;

use Yii;
use yii\base\Model;
use yii\console\Controller;
use yii\console\Exception;
use yii\helpers\Console;
use app\modules\admin\models\User;

/**
 * UserController реализует консольные команды для работы с пользователем.
 */
class UserController extends Controller
{
    /**
     * Инициализация команд.
     */
    public function actionIndex()
    {
        echo 'yii user/create-default-user' . PHP_EOL;
        echo 'yii user/create' . PHP_EOL;
        echo 'yii user/remove' . PHP_EOL;
        echo 'yii user/change-password' . PHP_EOL;
    }

    /**
     * Команда создания пользователя (администратора) по умолчанию.
     */
    public function actionCreateDefaultUser()
    {
        $model = new User();
        $model->username = 'admin';
        $model->setPassword('admin');
        $model->generateAuthKey();
        $model->full_name = 'Рузняев Андрей';
        $model->email = 'ruzbone@gmail.com, a.ruzz@yandex.ru';
        $model->phone = '+7 926 012 24 51';
        $model->youtube_link = 'https://www.youtube.com/channel/UCWxt6ZM6MBpcMXshsouIBBg?view_as=subscriber';
        $model->instagram_link = 'https://www.instagram.com/andrey_ruznyaev/?hl=ru';
        $model->facebook_link = 'https://www.facebook.com/profile.php?id=100001576236817';
        $model->twitter_link = 'https://twitter.com/AndreyRuz';
        $model->vk_link = 'https://vk.com/a.ruzz';
        $this->log($model->save());
    }

    /**
     * Команда создания пользователя (администратора).
     */
    public function actionCreate()
    {
        $model = new User();
        $this->readValue($model, 'username');
        $this->readValue($model, 'email');
        $model->setPassword($this->prompt('Password:', [
            'required' => true,
            'pattern' => '#^.{5,255}$#i',
            'error' => 'More than 5 symbols',
        ]));
        $model->generateAuthKey();
        $this->log($model->save());
    }

    /**
     * Команда удаления пользователя.
     */
    public function actionRemove()
    {
        $username = $this->prompt('Username:', ['required' => true]);
        $model = $this->findModel($username);
        $this->log($model->delete());
    }

    /**
     * Команда смены пароля пользователю.
     */
    public function actionChangePassword()
    {
        $username = $this->prompt('Username:', ['required' => true]);
        $model = $this->findModel($username);
        $model->setPassword($this->prompt('New password:', [
            'required' => true,
            'pattern' => '#^.{5,255}$#i',
            'error' => 'More than 5 symbols',
        ]));
        $this->log($model->save());
    }

    /**
     * Поиск пользователя по имени.
     * @param string $username
     * @throws \yii\console\Exception
     * @return User the loaded model
     */
    private function findModel($username)
    {
        if (!$model = User::findOne(['username' => $username])) {
            throw new Exception('User not found');
        }
        return $model;
    }

    /**
     * Чтение введенных пользователем значений (атрибутов команды) через командную строку.
     * @param Model $model
     * @param string $attribute
     */
    private function readValue($model, $attribute)
    {
        $model->$attribute = $this->prompt(mb_convert_case($attribute, MB_CASE_TITLE, 'utf-8') . ':', [
            'validator' => function ($input, &$error) use ($model, $attribute) {
                $model->$attribute = $input;
                if ($model->validate([$attribute])) {
                    return true;
                } else {
                    $error = implode(',', $model->getErrors($attribute));
                    return false;
                }
            },
        ]);
    }

    /**
     * Вывод сообщений на экран (консоль)
     * @param bool $success
     */
    private function log($success)
    {
        if ($success) {
            $this->stdout('Success!', Console::FG_GREEN, Console::BOLD);
        } else {
            $this->stderr('Error!', Console::FG_RED, Console::BOLD);
        }
        echo PHP_EOL;
    }
}