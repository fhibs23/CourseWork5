<?php

/**
 * Class IndexController
 * Контроллер главной страницы
 */
class IndexController {
    public function actionIndex () {

        //Список категорий
        $categories = Category::getCategory();

        //Последние продукты
        $latestWorkers= Worker::getLatestWorkers();

        require_once(ROOT . '/views/index/index.php');

        return true;
    }
}
