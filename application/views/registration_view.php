<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.ord/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Регистрация</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/darkly/bootstrap.min.css" rel="stylesheet" integrity="sha256-IsefKVCcMUlgpXQgIMRsqbIqC6aP153JkybxTa7W7/8= sha512-mCNEsmR1i3vWAq8hnHfbCCpc6V5fP9t0N1fEZ1wgEPF/IKteFOYZ2uk7ApzMXkT71sDJ00f9+rVMyMyBFwsaQg==" crossorigin="anonymous">
    <link href="http://localhost/bogdan/cilessons/css/registr.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"--></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    <script src="./js/scripts_v1.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="menu col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <a class ="btn btn-info" href="<?php echo base_url();?>" title="Main">Main</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="content col-xs-4 col-sm-4 col-md-4 col-lg-4">
           <form class="form-inline" method="post">
               <div class="form-group">
                    <h5>Login</h5>
                    <input style="background-color: khaki" type="text" name="name" required><?php echo  form_error('name'); ?>
                    <h5>Password</h5>
                    <input style="background-color: khaki" type="password" name="pass" required><?php echo form_error('pass'); ?>
                    <h5>rePassword</h5>
                    <input style="background-color: khaki" type="password" name="passr" required><?php echo  form_error('passr'); ?>
                    <h5>Email</h5>
                    <input style="background-color: khaki" type="email" name="email" required><?php echo  form_error('email'); ?>
                    <br><input class="btn btn-info btn-xs" style="margin-left: 18px; border-color: white;margin-top: 3px" type="submit" name="submit" value="Зарегистрироваться">
               </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="info col-xs-2 col-sm-2 col-md-2 col-lg-2">
            <?php
            if (isset($_SESSION['info'])){
                $info = $_SESSION['info'];
                unset ($_SESSION['info']);
            }
            if (isset($info)){?>
                <h4 style="color: orange"><?php echo $info; ?></h4>
            <?php }?>
        </div>
    </div>
</div>
<footer><p>&copy; Богдан Двинин 2015 Inc.</p></footer>
</body>
</html>