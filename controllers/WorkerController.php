<?php

/**
 * Class WorkerController
 * Контроллер для отображения единичного товара
 */
class WorkerController {

    public static function actionView ($workerId) {

//        //Список категорий
//        $categories = Category::getCategory();

        //Товар
        $worker = Worker::getWorkerById($workerId);

        require_once(ROOT . '/views/single_worker/single_worker.php');
        return true;
    }
}