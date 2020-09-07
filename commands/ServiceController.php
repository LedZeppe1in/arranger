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
            $first_service->price = 10000;
            $first_service->description = 'Предоставляется на индивидуальных условиях от 10 т.р.';
            $this->log($first_service->save());
            // Добавление новой услуги
            $second_service = new Service();
            $second_service->name = 'Написание партитур и создание партий';
            $second_service->price = 5000;
            $second_service->description = 'Мы можем создать партии из Вашей партитуры или собрать все партии в партитуру в нужном для Вас формате. Оплата зависит от объёма работы.';
            $this->log($second_service->save());
            // Добавление новой услуги
            $third_service = new Service();
            $third_service->name = 'Транскрипция музыки и адаптация для различных составов инструментов';
            $third_service->price = 10000;
            $third_service->description = 'Мы можем создавать профессионально оформленные и отлично звучащие партитуры с аудиозаписей и видеоматериалов. Стоимость зависит от продолжительности произведения, начиная от 10 т.р.';
            $this->log($third_service->save());
            // Добавление новой услуги
            $fourth_service = new Service();
            $fourth_service->name = 'Создание минусовок, а так же полного музыкального сопровождения, для различных целей';
            $fourth_service->price = 10000;
            $fourth_service->description = 'Если Вам необходимо музыкальное сопровождение, но по техническим или иным причинам Вы не сможете выступить с живыми музыкантами. Выход есть-запись минусовки на профессиональном оборудовании. Стоимость зависит от состава инструментов и других пожеланий заказчика.';
            $this->log($fourth_service->save());
            // Добавление новой услуги
            $fifth_service = new Service();
            $fifth_service->name = 'Работа со всеми видами музыкального производства (создание музыки, запись, сведение, мастеринг)';
            $fifth_service->price = 50000;
            $fifth_service->description = 'Продюсирование музыкального материала, подбор стилистики и аранжировка. Запись и полное продюсирование Вашей музыки. Работа производится на качественном музыкальном оборудование. Студийное время оплачивается по тарифу 2 т.р. в час.';
            $this->log($fifth_service->save());
            // Добавление новой услуги
            $sixth_service = new Service();
            $sixth_service->name = 'Уроки по созданию музыки и аранжировок';
            $sixth_service->price = 2000;
            $sixth_service->description = 'Занятия могут проходить в онлайн и оффлайн. Занятия по созданию музыки подразумевают элементарную подготовку в музыкознании.';
            $this->log($sixth_service->save());
            // Добавление новой услуги
            $seventh_service = new Service();
            $seventh_service->name = 'Уроки по джазовой гармонии';
            $seventh_service->price = 2000;
            $seventh_service->description = 'Особенности гармонического языка джаза, различные принципы построения аккордовых схем и голосоведения аккордов. Занятия онлайн и оффлайн с проверкой домашнего задания.';
            $this->log($seventh_service->save());
            // Добавление новой услуги
            $eighth_service = new Service();
            $eighth_service->name = 'Основы игры на гитаре и бас-гитаре';
            $eighth_service->price = 2000;
            $eighth_service->description = 'Основы игры на гитаре и бас-гитаре. Расположение нот на грифе, принципы звукоизвлечения, чтение буквенно-цифровых обозначений нот, создание простых аранжировок и транскрипций песен и мелодий. Занятий онлайн и оффлайн, с проверкой домашнего задания.';
            $this->log($eighth_service->save());
        } else
            $this->stdout('Service information already exists!', Console::FG_GREEN, Console::BOLD);
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