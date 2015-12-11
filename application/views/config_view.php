<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.ord/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Настройки аккаунта</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/darkly/bootstrap.min.css" rel="stylesheet" integrity="sha256-IsefKVCcMUlgpXQgIMRsqbIqC6aP153JkybxTa7W7/8= sha512-mCNEsmR1i3vWAq8hnHfbCCpc6V5fP9t0N1fEZ1wgEPF/IKteFOYZ2uk7ApzMXkT71sDJ00f9+rVMyMyBFwsaQg==" crossorigin="anonymous">
    <link href="<?php echo base_url(); ?>/css/config.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"--></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>/js/scripts_v1.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="menu col-sm-6 col-md-6 col-lg-6">
            <ul class="menu list-inline">
                <li style="margin-top: 3px"><a class ="btn btn-info" href="<?php echo base_url(); ?>" title="Main">Main</a></li>
                <li><a class ="btn btn-info" href="<?php echo base_url();?>about?" title="About me">About me</a></li>
                <!--<li><a class ="btn btn-default" href="indexshop.php?" style="color: black" title="Shop">Shop</a></li>-->
                <li><a class ="btn btn-info" id="active" href="">Config</a></li>
                <li><a class ="btn btn-info" href="<?php echo base_url();?>admin?" title="Contact">Admin</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="reg col-sm-2 col-md-2 col-lg-2">
            <form style="float: right"method="post" >
                <table>
                    <?php if (!isset($_SESSION['user'])){ ?>
                        <tr>
                            <td>
                                <input style="background-color: khaki;border-radius: 5px" type="text" name="name1" placeholder="Login" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input style="background-color: khaki;border-radius: 5px" type="password" name="pass1" placeholder="password" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input style="margin-left: 40px" type="submit" name="login1" value="Войти";
                            </td>
                        </tr>
                    <?php }else {?>
                        <p1 style="margin-left: 10px; color: lawngreen; font-size:13px">вы авторезированы</p1>
                        <tr>
                            <td>
                                <input id="sub1" class="btn btn-info btn-xs" style="margin-left:40px; margin-top: 20px; border-color: white" type="submit" name="logout" value="Выйти" onclick="return confirm1('sub1')" ;
                            </td>
                        </tr>
                    <?php  } ?>
                </table>
            </form>
            <?php if (!isset($_SESSION['user'])){ ?>
            <div class="reglist">
                <ul class="list-unstyled">
                    <li><a href="<?php echo base_url(); ?>Registr.php?" title="Contact">Регистрация</a></li>
                    <?php } ?>
                    <?php if (!isset($_SESSION['user'])){ ?>
                        <li><a href="<?php echo base_url(); ?>passback.php">Забыли пароль?</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="info col-md-1"> <!--выводим инфо о логине -->

        </div>

    </div>
</div>
<div class="container">
    <div class="panel panel-primary"> <!-- div change pass -->
        <div class="panel-heading">
            <h3 align="center" class="panel-title">Account Setting</h3>
        </div>
        <div class="panel-body">
            <table style="margin: 0 auto">
                <tr>
                    <td>
                        <div id="setid">
                            <input class="btn btn-info name" style="border-color: white; margin: 11px;margin-bottom: 0px" type="submit" name="submit" value="Изменить пароль" onclick="hideShow('setid2')">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="setid2"">
                            <form method="post">
                                <table>
                                    <tr>
                                        <td><input style="border-radius: 5px;margin-top: 3px" type="email" name="email" placeholder="email" required><?php $_SESSION['form'] = form_error('email'); ?></td>
                                    </tr>
                                    <tr>
                                        <td><input style="border-radius: 5px;margin-top: 3px" type="password" name="pass" placeholder="new pass" required><?php $_SESSION['form'] = form_error('pass'); ?></td>
                                    </tr>
                                    <tr>
                                        <td><input style="border-radius: 5px;margin-top: 3px" type="password" name="pass1" placeholder="repeat pass" required><?php $_SESSION['form'] = form_error('pass1'); ?></td>
                                    </tr>
                                    <tr>
                                        <td><input class="btn btn-info btn-xs" id="but2" style="margin-top: 3px;border-color: white;margin-left: 45px" type="submit" name="submit" value="Отправить" onclick="return confirm1('but2')"></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </td>
                </tr>
            </table>
        <div class="row"> <!-- info change pass -->
            <div class="info col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <div id="info" style="color: orange;">
                    <?php
                    if (isset($_SESSION['info'])){ //выводим ошибки касательно смене пароль
                        $info = $_SESSION['info'];
                        unset ($_SESSION['info']);
                        echo '<h4>'.$info.'</h4>';
                    }
                    if (isset($_SESSION['form'])){ //выводим ошибки касательно смене пароль
                        $form = $_SESSION['form'];
                        unset ($_SESSION['form']);
                        echo '<h4>'.$form.'</h4>';
                    }
                    if(isset($_SESSION['email'])){
                        $info2 = $_SESSION['email'];
                        unset ($_SESSION['email']);
                        echo '<h4>'.$info2.'</h4>';
                    }
                    ?>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<footer><p>&copy; Богдан Двинин 2015 Inc.</p></footer>
</body>
</html>