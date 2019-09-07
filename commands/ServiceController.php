<?php

namespace app\commands;

use yii\helpers\Console;
use yii\console\Controller;
use app\modules\admin\models\Service;

/**
 * ServiceController реализует консольные команды для работы с проектами.
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
     * Команда создания проектов по умолчанию.
     */
    public function actionCreate()
    {
        $model = new Service();
        if($model->find()->count() == 0) {
            for ($i = 1; $i <= 20; $i++) {
                // Добавление новой услуги
                $new_service = new Service();
                $new_service->name = 'test' . $i;
                $new_service->price = 0+$i;
                $new_service->description = 'Test-service test-service test-service' . $i;
                $this->log($new_service->save());
            }
        } else
            $this->stdout('Default projects created!', Console::FG_GREEN, Console::BOLD);
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
