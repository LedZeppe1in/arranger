<?php

namespace app\commands;

use yii\helpers\Console;
use yii\console\Controller;
use app\modules\admin\models\Service;

/**
 * ServiceController реализует консольные команды для работы с услугами.
 */
class ServiceController extends Controller
{
    /**
     * Инициализация команд.
     */
    public function actionIndex()
    {
        echo 'yii service/create' . PHP_EOL;
        echo 'yii service/remove' . PHP_EOL;
    }

    /**
     * Команда создания услуг по умолчанию.
     */
    public function actionCreate()
    {
        $model = new Service();
        if($model->find()->count() == 0) {
            // Добавление новой услуги
            $first_service = new Service();
            $first_service->name = 'Аранжировка, инструментовка и оркестровка';
            $first_service->price = 100;
            $this->log($first_service->save());
            // Добавление новой услуги
            $second_service = new Service();
            $second_service->name = 'Написание партитур и создание партий';
            $second_service->price = 100;
            $this->log($second_service->save());
            // Добавление новой услуги
            $third_service = new Service();
            $third_service->name = 'Транскрипция музыки и адаптация для различных составов инструментов';
            $third_service->price = 100;
            $this->log($third_service->save());
            // Добавление новой услуги
            $fourth_service = new Service();
            $fourth_service->name = 'Создание минусовок, а так же полного музыкального сопровождения, для различных целей';
            $fourth_service->price = 100;
            $this->log($fourth_service->save());
            // Добавление новой услуги
            $fifth_service = new Service();
            $fifth_service->name = 'Работа со всеми видами музыкального производства (создание музыки, запись, сведение, мастеринг)';
            $fifth_service->price = 100;
            $this->log($fifth_service->save());
            // Добавление новой услуги
            $sixth_service = new Service();
            $sixth_service->name = 'Уроки по созданию музыки и аранжировок';
            $sixth_service->price = 100;
            $this->log($sixth_service->save());
            // Добавление новой услуги
            $seventh_service = new Service();
            $seventh_service->name = 'Уроки по джазовой гармонии';
            $seventh_service->price = 100;
            $this->log($seventh_service->save());
            // Добавление новой услуги
            $eighth_service = new Service();
            $eighth_service->name = 'Основы игры на гитаре и бас-гитаре';
            $eighth_service->price = 100;
            $this->log($eighth_service->save());
        } else
            $this->stdout('Default services are created!', Console::FG_GREEN, Console::BOLD);
    }

    /**
     * Команда удаления всех услуг.
     */
    public function actionRemove()
    {
        $model = new Service();
        $this->log($model->deleteAll());
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