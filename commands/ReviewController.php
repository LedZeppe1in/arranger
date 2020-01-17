<?php

namespace app\commands;

use yii\helpers\Console;
use yii\console\Controller;
use app\modules\admin\models\Review;
use app\modules\admin\models\MusicTrackReview;
use app\modules\admin\models\SheetMusicReview;

/**
 * ReviewController реализует консольные команды для работы с отзывами.
 */
class ReviewController extends Controller
{
    /**
     * Инициализация команд.
     */
    public function actionIndex()
    {
        echo 'yii review/create' . PHP_EOL;
        echo 'yii review/remove' . PHP_EOL;
    }

    /**
     * Команда создания отзывов по умолчанию.
     */
    public function actionCreate()
    {
        $model = new Review();
        if($model->find()->count() == 0) {
            for ($i = 1; $i <= 20; $i++) {
                // Добавление нового отзыва
                $new_review = new Review();
                $new_review->name = 'test' . $i;
                $new_review->city = 'Irkutsk';
                $new_review->occupation = 'Artist';
                $new_review->text = 'Test-review test-review test-review' . $i;
                $this->log($new_review->save());
                // Добавление связи отзыва с нотами и аудио
                if (($i % 2) == 0) {
                    $new_sheet_music_review = new SheetMusicReview();
                    $new_sheet_music_review->sheet_music = $i;
                    $new_sheet_music_review->review = $i;
                    $this->log($new_sheet_music_review->save());
                } else {
                    $new_music__track_review = new MusicTrackReview();
                    $new_music__track_review->music_track = $i;
                    $new_music__track_review->review = $i;
                    $this->log($new_music__track_review->save());
                }
            }
        } else
            $this->stdout('Default reviews are created!', Console::FG_GREEN, Console::BOLD);
    }

    /**
     * Команда удаления всех отзывов.
     */
    public function actionRemove()
    {
        $model = new Review();
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