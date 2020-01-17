<?php

namespace app\commands;

use yii\helpers\Console;
use yii\console\Controller;
use app\modules\admin\models\Publication;

/**
 * PublicationController реализует консольные команды для работы с публикациями.
 */
class PublicationController extends Controller
{
    /**
     * Инициализация команд.
     */
    public function actionIndex()
    {
        echo 'yii publication/create' . PHP_EOL;
        echo 'yii publication/remove' . PHP_EOL;
    }

    /**
     * Команда создания публикаций по умолчанию.
     */
    public function actionCreate()
    {
        $model = new Publication();
        if($model->find()->count() == 0) {
            for ($i = 1; $i <= 20; $i++) {
                // Добавление новой публикации
                $new_publication = new Publication();
                $new_publication->name = 'test' . $i;
                $new_publication->link = 'https://test.publication' . $i . '.ru';
                $new_publication->text = 'Test-publication test-publication test-publication' . $i;
                $this->log($new_publication->save());
            }
        } else
            $this->stdout('Default publications are created!', Console::FG_GREEN, Console::BOLD);
    }

    /**
     * Команда удаления всех публикаций.
     */
    public function actionRemove()
    {
        $model = new Publication();
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