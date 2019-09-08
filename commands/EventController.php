<?php

namespace app\commands;

use DateTime;
use DateTimeZone;
use yii\helpers\Console;
use yii\console\Controller;
use app\modules\admin\models\Event;

/**
 * EventController реализует консольные команды для работы с событиями.
 */
class EventController extends Controller
{
    /**
     * Инициализация команд.
     */
    public function actionIndex()
    {
        echo 'yii event/create' . PHP_EOL;
        echo 'yii event/remove' . PHP_EOL;
    }

    /**
     * Команда создания событий по умолчанию.
     */
    public function actionCreate()
    {
        $model = new Event();
        if($model->find()->count() == 0) {
            for ($i = 1; $i <= 20; $i++) {
                // Добавление нового события
                $new_event = new Event();
                $new_event->name = 'test' . $i;
                $new_event->date = date('d.m.Y H:i', strtotime('+' . $i . ' days'));
                $new_event->duration = date('H:i', strtotime('+' . $i . ' hours'));
                $new_event->location = 'Test location-' . $i;                
                $new_event->link = 'https://test.event' . $i . '.ru';
                $new_event->description = 'Test-event test-event test-event-' . $i;
                $this->log($new_event->save());
            }
        } else
            $this->stdout('Default events are created!', Console::FG_GREEN, Console::BOLD);
    }

    /**
     * Команда удаления всех событий.
     */
    public function actionRemove()
    {
        $model = new Event();
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