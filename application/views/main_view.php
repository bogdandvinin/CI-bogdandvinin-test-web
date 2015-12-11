<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Главная</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/darkly/bootstrap.min.css" rel="stylesheet" integrity="sha256-IsefKVCcMUlgpXQgIMRsqbIqC6aP153JkybxTa7W7/8= sha512-mCNEsmR1i3vWAq8hnHfbCCpc6V5fP9t0N1fEZ1wgEPF/IKteFOYZ2uk7ApzMXkT71sDJ00f9+rVMyMyBFwsaQg==" crossorigin="anonymous">
    <link href="<?php echo base_url();?>/css/index.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"--></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    <script src="<?php echo base_url();?>/js/scripts_v1.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="menu col-sm-6 col-md-6 col-lg-6">
            <ul class="menu list-inline">
                <li style="margin-top: 3px"><a class ="btn btn-info" id="active" href="<?php echo base_url();?>">Main</a></li>
                <li><a class ="btn btn-info" id="body-id" href="<?php echo base_url();?>about?">About me</a></li>
                <!--<li><a class ="btn btn-default" href="indexshop.php?" style="color: black" title="About me">Shop</a></li>-->
                <li><a class ="btn btn-info" id="body-id" href="<?php echo base_url(); ?>config?">Config</a></li>
                <li><a class ="btn btn-info" id="body-id" href="<?php echo base_url();?>admin?">Admin</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="reg col-sm-2 col-md-2 col-lg-2">
            <table>
                <form style="float: right" method="post">
                    <?php if (!isset($_SESSION['user'])){ ?>
                        <tr>
                            <td>
                                <input  style="border-radius: 5px; " type="text" name="name1" placeholder="Login" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input style="border-radius:5px; margin-top: 5px" type="password" name="pass1" placeholder="Password" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="btn btn-info btn-xs" style="margin-top: 5px;border-color: white" type="submit" name="login1" value="Войти">
                            </td>
                        </tr>
                    <?php }else {?>
                        <p1 style="margin-left: 10px; color: lawngreen; font-size:13px">вы авторезированы</p1>
                        <tr>
                            <td>
                                <input id="sub1" class="btn btn-info btn-xs" style="margin-left:40px; margin-top: 20px" type="submit" name="logout" value="Выйти" onclick="return confirm1('sub1')" ;
                            </td>
                        </tr>
                    <?php  } ?>
                </form>
                <?php if (!isset($_SESSION['user'])){ ?>
                <ul>
                    <tr>
                        <td>
                            <li><a id="a_reg" href="<?php echo base_url();?>registration?" title="Contact"><p>Регистрация</p></a></li>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php if (!isset($_SESSION['user'])){ ?>
                    <tr>
                        <td>
                             <li style="margin-top: -3px"><a id="a_reg" href="<?php echo base_url(); ?>passback?"><p>Забыли пароль?</p></a></li>
                        </td>
                    </tr>
                    <?php } ?>
                </ul>
            </table>
        </div>
        <div class="info col-md-1"> <!--выводим инфо о логине -->
            <?php
            if (isset($_SESSION['info'])){
                $info = $_SESSION['info'];
                unset ($_SESSION['info']);
            }
            if (isset($info)){?>
                <h5 align="right"><?php echo $info; ?></h5>
            <?php } ?>
            <?php if (isset($_SESSION['new'])){ //выводим инфо на непомню что нада посмотреть
                $newp = $_SESSION['new'];
                unset ($_SESSION['new']);
                echo '<p style="margin: 0px;font-size: 18px; color:white ">'.$newp.'</p>';
            } ?>
            <?php if (isset($_SESSION['new1'])){ //выводим инфо на непомню что нада посмотреть
                $newp1 = $_SESSION['new1'];
                unset ($_SESSION['new1']);
                echo '<p style="margin: 0px;font-size: 18px; color:white ">'.$newp1.'</p>';
            } ?>
        </div>

    </div>
</div>
<!--Modal window div .container main -->
<div class="modal fade" id="modal-comment">
    <div class="modal-dialog">
        <div class="modal-content">
            <div style="height: 50px" class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
            </div>
            <form class="form-horizontal" id="modal-comment-news" method="get">  <!--Форма модального окна -->
                <div class="modal-body">
                    <div class="form-group">
                        <input id="date_user" type="hidden" name="date" value="<?php echo $date =date("y.m.d");?>">
                        <label style="margin-left: -15px" for="textArea" class="col-lg-2 control-label">Коментировать</label>
                        <textarea id="comment_user" class="form-control" rows="3" name="comment_user"></textarea>
                    </div>
                </div>
                <div class="modal-footer" id="modal-comm-result">
                    <input id="modal-submit-button" type="button" name="submit_comment" value="Сохранить" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>   <!--End of DIV Modal -->
<div class="container main"> <!--Блок основного контента -->
    <div class="row content">
         <div style="padding: 0px" class="newscontent col-xs-12 col-sm-12 col-md-12 col-lg-12">
             <div class="panel panel-primary">
                 <div class="panel-heading">
                     <h3 align="center" class="panel-title" style="font-size: 20px">Новости</h3>
                 </div>
                 <?php //выводим новости на экран циклом Foreach
                    foreach ($comments_list as $row){   //$comments_list - переменная содержащяя запрос из БД которую мы передали из контролера First.php
                    //$comments несет в себе многомерный массив с запросо в comments - засовываем в Foreach что-бы получить данные в красивом виде
                    //$row->название поля таблици
                        ?>
                        <div class="panel-body"> <!--Start div panel-body -->
                        <pre style="padding: 0px;;margin:0px; background-color: gainsboro">
                            <div>
                                <h4 align="center" > <?php echo $row['date']; ?></h4>
                                <h4 align="center" > <?php  echo $row['name']; ?></h4>
                            </div>
                    <?php   if(!empty($row['imgpath'])){ ?>
                            <div style="width: 60%;margin-top: -90px; ">
                                <img id="news_img" style="float: left" height="auto" width="100%"  src=<?php echo base_url()."upload/".$row['imgpath']; ?>>
                            </div>
                    <?php } ?>
                            <div class="conttext">
                                <p style="margin-top: -95px; font-size: 18px"; > <?php echo $row['description']; ?></p>
                            </div>
                        </pre>
                            <button id="modal-button" onclick="addComment(<?php echo $row['id']; ?>)" class="btn btn-primary btn-lg btn-block">Коментировать новость</button>
                            <div class="panel panel-default"> <!--DIV new_comments -->
                                <div class="panel-body" style="max-height: 200px;overflow: scroll">
                                    <?php
                                    $user_comments = $this->comments_model->all_commentsusers($row['id']);//($user_comments from controller first.php) query for user_comments
                                    foreach($user_comments as $rows) {
                                        //print_r ($rows);
                                        ?>
                                        <div class="row" id="js_user_comm">
                                            <!--js user comments div -->
                                        </div>
                                        <div class="row">
                                            <!-- БЛОК ДЛЯ ВЫВЕДЕНИЯ НИКА КОМЕНТАТОРА -->
                                        </div>
                                        <div class="row">
                                           <?php echo $rows['date']; ?>
                                        </div>
                                        <div class="row user_comments" id="us_comm_comm">
                                            <?php echo "<p>".$rows['comment_user']."</p>"; ?>
                                        </div>
                                        <hr>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>                             <!--End of DIV new_comments -->
                        </div> <!--End of div panel-body -->
                    <?php
                    }
                    ?>
             </div> <!--End of panel panel div -->
             <ul class="pagination pagination-sm">
             <?php
             echo $this->pagination->create_links(); // выводим пагинацию ( в конце цикла размещена)
            ?>
             </ul>
         </div>
    </div>
</div>

</div>
</div>
<div class="container-fluid end">    <!--footer -->
    <div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12 footercontent">
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <table>
                    <tr>
                        <td><h4 style="color: white">О нас</h4></td>
                    </tr>
                    <tr>
                        <td><p style="color: white">Истории о том, как проводят свое свободное время люди с активной жизненной позицией.</p></td>
                    </tr>
                </table>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <table style="float: right">
                    <tr>
                        <td><h4 style="color: white">Контакты</h4></td>
                    </tr>
                    <tr>
                        <td><a style="color: white" href="http://vk.com/id85708880">Страница в VK</a></td>
                    </tr>
                    <tr>
                        <td><a style="color: white" href="">063-754-96-56</a></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <footer><p>&copy; Богдан Двинин 2015 Inc.</p></footer>
        </div>
    </div>
</div>
<!--<footer><p>&copy; Богдан Двинин 2015 Inc.</p></footer>-->
</body>
</html>
