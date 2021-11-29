
<section>
    <div class="container">
        <h2>Редактировать товар #<?php echo $workers['id']?></h2>
        <form action="#" method="post" id="add_form" enctype="multipart/form-data">

            <p>ФИО</p>
            <input required type="text" name="name" value="<?php echo $workers['name']?>">

            <p>Подразделение</p>
            <input required type="text" name="unit" value="<?php echo $workers['unit']?>">

            <p>Должность</p>
            <input required type="text" name="position" value="<?php echo $workers['position']?>">

            <p>Дата трудоустройство </p>
            <input required type="text" name="date_of_employment" value="<?php echo $workers['date_of_employment']?>">

            <p>Дата рождения</p>
            <textarea id="text" name="date_of_birth"><?php echo $workers['date_of_birth']?></textarea>

            <p>Зарплата</p>
            <textarea id="text" name="salary"><?php echo $workers['salary']?></textarea>

            <input type=submit name="submit" value="Сохранить" id="add_btn">
        </form>
    </div>
</section>
<div class="appendix"></div>
