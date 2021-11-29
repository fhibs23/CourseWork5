<?php

/**
 * Class IndexController
 * Контроллер главной страницы
 */
class IndexController {
    public function actionIndex () {


        require_once(ROOT . '/views/index/index.php');

        return true;
    }
}
