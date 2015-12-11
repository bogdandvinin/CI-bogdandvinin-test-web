<?php
$this->load->model('comments_model'); //загружаем можель с запросом в БД с таблицей comments
//Пагинация и вывод новостей через модель comments_model и метод all_comments
$config['base_url'] = 'admin_user'; //путь к функции (например)или файлу где хотим сделать пагинацию класс first функция articles
$config['total_rows'] = $this->db->count_all('comments'); // число записей в таблице
$config['per_page'] = '2'; // сколько записей показывать на каждой странице
$config['full_tag_open'] = '<p style="color:black; font-size: 17px" >'; //добавление стилей к пагинации например начало
$config['full_tag_close'] = '</p>'; // конец
$this->pagination->initialize($config); // инициализируем класс Пагинации что-бы все работало
$comments = $this->comments_model->all_comments($config['per_page'],$this->uri->segment(3)); //вызываем функцию которая отображает все из таблици comments сортируя записи в обратном порядке
date_default_timezone_set('America/New_York'); 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.ord/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Админ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <link href="<?php echo base_url();?>/css/admin.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"--></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    <script src="./js/scripts_v1.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="menu col-sm-6 col-md-6 col-lg-6">
            <ul style="margin: 1px" class="menu list-inline">
                <li><a class ="btn btn-default" href="<?php echo base_url();?>" style="color: black" title="Main">Main</a></li>
                <li><a class ="btn btn-default" href="<?php echo base_url();?>about?" style="color: black" title="About me">About me</a></li>
                <!--<li><a class ="btn btn-default" href="indexshop.php?" style="color: black" title="About me">Shop</a></li>-->
                <li><a class ="btn btn-default" href="<?php echo base_url();?>config?" style="color: black">Config</a></li>
                <li><a class ="btn btn-default" id="active" href="<?php echo base_url();?>admin?" style="color: black" title="Contact">Admin</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="newsname col-sm-6 col-md-6 col-lg-6">
            <h4>Добавить новость на стену</h4>
        </div>
    </div>
    <div class="row">
        <div class="newsinfo col-sm-6 col-md-6 col-lg-6">
            <form style="margin-left: 15px" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><input type="hidden" name="date" value="<?php echo $date =date("y.m.d");?>"></td>
                    </tr>
                    <tr>
                        <td><input type="file" name="uf"></td>
                    </tr>
                    <tr>
                        <td><p>Название</p></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="name" size="33" maxlength="30" placeholder="Введите название" required></td>
                    </tr>
                    <tr>
                        <td><p>Описание</p></td>
                    </tr>
                    <tr>
                        <td><textarea type="text" name="desc" cols="30" rows="6" placeholder="Введите текст" required></textarea></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="add" value="Добавить запись"></td>
                    </tr>
                </table>
            </form>
            <?php if (isset($_SESSION['info'])){
                $info = $_SESSION['info'];
                echo $info;
                unset($_SESSION['info']);
            } ?>
        </div>
    </div>
    <div class="row">
        <div class="editname col-sm-6 col-md-6 col-lg-6">
            <h4>Редактировать контент</h4>
        </div>

    </div>
    <div class="row">
        <div class="editcontent col-sm-6 col-md-6 col-lg-6">
            <form  method="post">   <!--Форма удаления контента -->
                <?php
                    foreach ($comments->result() as $row){
                        //$comments несет в себе многомерный массив с запросо в comments - засовываем в Foreach что-бы получить данные в красивом виде
                        //$row->название поля таблици
                        echo '<pre style="padding:0px">';
                        ?>
                        <div class="contheader">
                            <h3 align="center" style=" margin-top: -30px"> <?php echo $row->date; ?></h3>
                            <h4 align="center" style="margin-top: -30px"> <?php  echo $row->name; ?> </h4>
                        </div>
                        <div class="imgcontent">
                            <?php  if(!empty($row->imgpath)){ ?>
                                <img style="float: left" height="auto" width="100%"  src="<?php echo base_url()."upload/".$row->imgpath; ?>">
                            <?php } ?>
                        </div>
                        <div class="conttext1">
                            <p> <?php echo $row->description; ?></p>
                        </div>
                        <input style="margin-left: 0px" type="checkbox" name="check" value="<?php echo $row->id; ?>"
                        <?php   echo '</pre>'; ?>
                        <input type="submit" name="delete" value="Удалить отмеченную статью">
                    <?php
                     }
                     echo $this->pagination->create_links(); //делаем пагинацию
                    ?>
            </form>
        </div>
    </div>
</div>
<footer><p>&copy; Богдан Двинин 2015 Inc.</p></footer>
</body>
</html>