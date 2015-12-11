<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.ord/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Возврат пароля</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/darkly/bootstrap.min.css" rel="stylesheet" integrity="sha256-IsefKVCcMUlgpXQgIMRsqbIqC6aP153JkybxTa7W7/8= sha512-mCNEsmR1i3vWAq8hnHfbCCpc6V5fP9t0N1fEZ1wgEPF/IKteFOYZ2uk7ApzMXkT71sDJ00f9+rVMyMyBFwsaQg==" crossorigin="anonymous">
    <link href="<?php echo base_url(); ?>css/passback.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"--></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>/js/scripts_v1.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="menu col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <a style="margin-left: -10px" class ="btn btn-info" href="<?php echo base_url(); ?>" title="Main">Main</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row passendname">
        <div class="passendname col-xs-2 col-sm-2 col-md-2 col-lg-2">
            <div id="setid">
                <input class="btn btn-info name" style="margin-top: 3px" type="button" name="submit" value="забыли пароль?" onclick="hideShow('setid2')">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="passend col-xs-4 col-sm-4 col-md-4 col-lg-4"><!--passend col-xs-4 col-sm-4 col-md-4 col-lg-4 -->
            <div id="setid2">
                <Form method="post">
                    <table >
                        <tr>
                            <td><input style="border-radius: 5px;margin-top: 3px" type="email" name="email" placeholder="email" required><?php $_SESSION['form'] = form_error('email'); ?></td>
                        </tr>
                        <tr>
                            <td><input style="border-radius: 5px;margin-top: 3px" type="password" name="pass" placeholder="new pass" required><?php $_SESSION['form'] = form_error('pass'); ?></td>
                        </tr>
                        <tr>
                            <td><input style="border-radius: 5px; margin-top: 3px" type="password" name="pass1" placeholder="repeat pass" required><?php  $_SESSION['form'] = form_error('pass1'); ?></td>
                        </tr>
                        <tr>
                            <td><input class="btn btn-info btn-xs" style=" border-radius: 5px;border-color: white;margin-top: 3px" type="submit" name="submit" value="Отправить" onclick="return confirm1('but2')"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="info col-xs-2 col-sm-2 col-md-2 col-lg-2">
            <div id="info" style="color: orange;">
                <?php
                if (isset($_SESSION['info'])){ //выводим ошибки касательно смене пароль
                    $info = $_SESSION['info'];
                    unset ($_SESSION['info']);
                    echo '<h4>'.$info.'</h4>';
                }
                if (isset($_SESSION['form'])){
                    $info1 = $_SESSION['form'];
                    unset ($_SESSION['form']);
                    echo '<h4>'.$info1.'</h4>';
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
<footer><p>&copy; Богдан Двинин 2015 Inc.</p></footer>
</body>
</html>