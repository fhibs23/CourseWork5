<?php

/**
 * Модель для работы с работниками
 */
class Worker {

    //Количество отображаемых работников по умолчанию
    const SHOW_BY_DEFAULT = 15;


    /**
     * Получаем последних работников
     *
     * @param int $page
     * @return array
     */
    public static function getLatestWorkers ($page = 1) {

        $limit = self::SHOW_BY_DEFAULT;

        //Задаем смещение
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $db = DB::getConnection();

        $sql = "
                SELECT id, name, unit, position, date_of_employment
                  FROM workers
                      ORDER BY id DESC
                        LIMIT :limit OFFSET :offset
                ";

        //Подготавливаем данные
        $res = $db->prepare($sql);
        $res->bindParam(':limit', $limit, PDO::PARAM_INT);
        $res->bindParam(':offset', $offset, PDO::PARAM_INT);

        //Выполняем запрос
        $res->execute();

        //Получаем и возвращаем результат
        $workersList = $res->fetchAll(PDO::FETCH_ASSOC);

        return $workersList;
    }

    /**
     * Выводим товары по выбранной категории
     *
     * @param $catId id категории
     * @param $page  - текущая страница
     * @return array
     */
//    public static function getWorkerListByCatId ($catId, $page = 1) {
//
//        $limit = self::SHOW_BY_DEFAULT;
//
//        //Задаем смещение
//        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
//
//        $db = DB::getConnection();
//
//        $sql = "
//                SELECT id, name,unit,position,date_of_employment FROM workers
//                  WHERE status = 1 AND category_id = :category_id
//                    ORDER BY id DESC LIMIT :limit OFFSET :offset
//                ";
//
//        $res = $db->prepare($sql);
//        $res->bindParam(':category_id', $catId, PDO::PARAM_INT);
//        $res->bindParam(':limit', $limit, PDO::PARAM_INT);
//        $res->bindParam(':offset', $offset, PDO::PARAM_INT);
//
//        $res->execute();
//
//        //Получение и возврат результатов
//
//        $products = $res->fetchAll(PDO::FETCH_ASSOC);
//
//        return $products;
//    }

    /**
     * Выбираем товар по идентификатору
     *
     * @param $productId
     * @return mixed
     */
    public static function getWorkerById ($workerId) {

        $db = Db::getConnection();

        $sql = "
               SELECT id, name,unit, position, date_of_employment FROM workers
                    WHERE id = :id
               ";

        $res = $db->prepare($sql);
        $res->bindParam(':id', $workerId, PDO::PARAM_INT);
        $res->execute();

        $workers = $res->fetch(PDO::FETCH_ASSOC);

        return $workers;
    }

//    /**
//     * Выборка товаров по массиву id
//     *
//     * @param $arrayIds
//     * @return array
//     */
//    public static function getProductsByIds ($arrayIds) {
//
//        $db = Db::getConnection();
//
//        //Разбиваем пришедший массив в строку
//        $stringIds = implode(',', $arrayIds);
//
//        $sql = "
//                SELECT id, name, code, price FROM product
//                WHERE status = 1 AND id IN ($stringIds)
//                ";
//
//        $res = $db->query($sql);
//
//        $products = $res->fetchAll(PDO::FETCH_ASSOC);
//
//        return $products;
//    }

    /**
     * Выводит списко всех товраов
     *
     * @return array
     */
    public static function getWorkersList () {

        $db = Db::getConnection();

        $sql = "
                SELECT id, name, unit, position, date_of_employment FROM workers
                ORDER BY id ASC
                ";

        $res = $db->query($sql);

        $workers = $res->fetchAll(PDO::FETCH_ASSOC);
        return $workers;

    }

    /**
     * Удаление товара(админка)
     *
     * @param $id
     * @return bool
     */
    public static function deleteWorkerById ($id) {
        $db = Db::getConnection();

        $sql = "
                DELETE FROM workers WHERE id = :id
                ";

        $res = $db->prepare($sql);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        return $res->execute();
    }

    /**
     * Добавление продукта
     *
     * @param $options - характеристики товара
     * @return int|string
     */
    public static function addWorker ($options) {

        $db = Db::getConnection();

        $sql = "
                INSERT INTO workers(name, unit,position,date_of_employment,date_of_birth,salary)
                VALUES (:name, :unit, :position, :date_of_employment,:date_of_birth,:salary)
                ";

        $res = $db->prepare($sql);

        $res->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $res->bindParam(':unit', $options['unit'], PDO::PARAM_STR);
        $res->bindParam(':position', $options['position'], PDO::PARAM_STR);
        $res->bindParam(':date_of_employment', $options['date_of_employment'], PDO::PARAM_STR);
        $res->bindParam(':date_of_birth', $options['date_of_birth'], PDO::PARAM_STR);
        $res->bindParam(':salary', $options['date_of_salary'], PDO::PARAM_INT);

        //Если запрос выполнен успешно
        if ($res->execute()) {
            //Возвращаем id последней записи, позже, в контроллере переходим на страницу этого товара, если все успешно
            return $db->lastInsertId();
        } else {
            return 0;
        }
    }

    /**
     * Изменение товара
     *
     * @param $id
     * @param $options
     * @return bool
     */
    public static function editWorker ($id, $options) {

        $db = Db::getConnection();

        $sql = "
                UPDATE workers
                SET
                    name = :name,
                    unit= :unit,
                    position = :position,
                    date_of_employment =:date_of_employment,
                    date_of_birth=:date_of_birth,
                    salary=:salary
                WHERE id = :id
                ";

        $res = $db->prepare($sql);

        $res->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $res->bindParam(':unit', $options['unit'], PDO::PARAM_INT);
        $res->bindParam(':position', $options['position'], PDO::PARAM_INT);
        $res->bindParam(':date_of_employment', $options['date_of_employment '], PDO::PARAM_INT);
        $res->bindParam(':date_of_birth', $options['date_of_birth'], PDO::PARAM_STR);
        $res->bindParam(':salary', $options['date_of_salary'], PDO::PARAM_INT);

        return $res->execute();
    }

//    /**
//     * Возвращает путь к изображению
//     * @param integer $id
//     * @return string <p>Путь к изображению</p>
//     */
//    public static function getImage ($id) {
//
//        // Название изображения-пустышки
//        $noImage = 'no-image.jpg';
//
//        // Путь к папке с товарами
//        $path = '/upload/images/products/';
//
//        // Путь к изображению товара
//        $pathToProductImage = $path . $id . '.jpg';
//
//        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToProductImage)) {
//            // Если изображение для товара существует
//            // Возвращаем путь изображения товара
//            return $pathToProductImage;
//        }
//
//        // Возвращаем путь изображения-пустышки
//        return $path . $noImage;
//    }



    /**
     * Общее кол-во товаров в магазине
     *
     * @return mixed
     */
    public static function getTotalWorkers () {

        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "SELECT count(id) AS count FROM workers ";

        // Выполнение коменды
        $res = $db->query($sql);

        // Возвращаем значение count - количество
        $row = $res->fetch();
        return $row['count'];
    }
}