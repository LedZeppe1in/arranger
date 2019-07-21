<?php

namespace app\commands;

use yii\helpers\Console;
use yii\console\Controller;
use app\modules\admin\models\Project;

/**
 * ProjectController реализует консольные команды для работы с проектами.
 */
class ProjectController extends Controller
{
    /**
     * Инициализация команд.
     */
    public function actionIndex()
    {
        echo 'yii project/create' . PHP_EOL;
        echo 'yii project/remove' . PHP_EOL;
    }

    /**
     * Команда создания проектов по умолчанию.
     */
    public function actionCreate()
    {
        $model = new Project();
        if($model->find()->count() == 0) {
            for ($i = 1; $i <= 20; $i++) {
                // Добавление нового проекта
                $new_project = new Project();
                $new_project->name = 'test' . $i;
                $new_project->link = 'https://test.project' . $i . '.ru';
                $new_project->description = 'Test-project test-project test-project' . $i;
                $this->log($new_project->save());
            }
        } else
            $this->stdout('Default projects created!', Console::FG_GREEN, Console::BOLD);
    }

    /**
     * Команда удаления всех проектов.
     */
    public function actionRemove()
    {
        $model = new Project();
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