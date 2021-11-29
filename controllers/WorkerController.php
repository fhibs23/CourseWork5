<?php

/**
 * Class WorkerController
 * Контроллер для отображения единичного работника
 */
class WorkerController {

    public static function actionView ($workerId) {

//
        $worker = Worker::getWorkerById($workerId);

        require_once(ROOT . '/views/single_worker/single_worker.php');
        return true;
    }
}