<?php

/**
 *Контроллер для просмотра и управления списком всех работников, имеющихся в базе
 */
class UserWorkerController  {

    /**
     * Просмотр всех работников
     *
     * @return bool
     */
    public function actionIndex () {


        //выводим список всех товаров
        $workers = Worker::getWorkersList();

        require_once(ROOT . '/views/user_worker/index.php');

        return true;
    }

    /**
     * Удаление конкретного работника
     *
     * @param $id работника
     * @return bool
     */
    public function actionDelete ($id) {


        //Проверяем форму
        if (isset($_POST['submit'])) {
            //Если отправлена, то удаляем нужного работника
            Worker::deleteWorkerById($id);
            //и перенаправляем на страницу работника
            header('Location: /user/worker');
        }

        require_once(ROOT . '/views/user_worker/delete.php');

        return true;
    }

    /**
     * Добавление работника
     *
     * @return bool
     */
    public function actionAdd () {



        //Принимаем данные из формы
        if (isset($_POST) and !empty($_POST)) {
            $options['name'] = trim(strip_tags($_POST['name']));
            $options['unit'] = trim(strip_tags($_POST['unit']));
            $options['position'] = trim(strip_tags($_POST['position']));
            $options['date_of_employment'] = trim(strip_tags($_POST['date_of_employment']));
            $options['date_of_birth'] = trim(strip_tags($_POST['date_of_birth']));
            $options['salary'] = trim(strip_tags($_POST['salary']));


            //Если все ок, записываем нового работника
            $id = Worker::addWorker($options);



            header('Location: /user/worker');
        }


        require_once(ROOT . '/views/user_worker/add.php');

        return true;
    }

    /**
     * Редактирование работника
     *
     * @param $id
     * @return bool
     */
    public function actionEdit ($id) {



        //Получаем информацию о выбранном работнике
        $worker = Worker::getWorkerById($id);

        //Принимаем данные из формы
        if (isset($_POST) and !empty($_POST)) {
            $options['name'] = trim(strip_tags($_POST['name']));
            $options['unit'] = trim(strip_tags($_POST['unit']));
            $options['position'] = trim(strip_tags($_POST['position']));
            $options['date_of_employment'] = trim(strip_tags($_POST['date_of_employment']));
            $options['date_of_birth'] = trim(strip_tags($_POST['date_of_birth']));
            $options['salary'] = trim(strip_tags($_POST['salary']));

            Worker::editWorker($id, $options);



            header('Location: /user/worker');
        }

        require_once(ROOT . '/views/user_worker/edit.php');

        return true;
    }
}