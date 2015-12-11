<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.ord/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Резюме</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/darkly/bootstrap.min.css" rel="stylesheet" integrity="sha256-IsefKVCcMUlgpXQgIMRsqbIqC6aP153JkybxTa7W7/8= sha512-mCNEsmR1i3vWAq8hnHfbCCpc6V5fP9t0N1fEZ1wgEPF/IKteFOYZ2uk7ApzMXkT71sDJ00f9+rVMyMyBFwsaQg==" crossorigin="anonymous">
    <link href="<?php echo base_url();?>/css/about.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"--></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    <script src="./js/scripts_v1.js"></script>
</head>
<body>
<div class="container-fluid header">
    <div class="row">
        <div class="menu col-sm-6 col-md-6 col-lg-6">
            <ul class="menu list-inline">
                <li style="margin-top: 3px"><a class ="btn btn-info" href="<?php echo base_url();?>">Main</a></li>
                <li><a class ="btn btn-info" id="active" href="<?php echo base_url();?>about?">About me</a></li>
                <!--<li><a class ="btn btn-default" href="indexshop.php?" style="color: black" title="About me">Shop</a></li>-->
                <li><a class ="btn btn-info" href="<?php echo base_url(); ?>config?">Config</a></li>
                <li><a class ="btn btn-info" href="<?php echo base_url();?>admin?">Admin</a></li>
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
                                <input id="sub1" style="margin-left:40px; margin-top: 20px" type="submit" name="logout" value="Выйти" onclick="return confirm1('sub1')" ;
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
<div class="container main">
    <div class="panel panel-primary"><!--"row content news" -->
        <div class="panel-heading"> <!--newsname col-xs-12 col-sm-12 col-md-12 col-lg-12 -->
            <h4 align="center">Резюме</h4>
        </div>
    <!--</div>-->
    <div class="panel-body"> <!-- "resume col-xs-6 col-sm-6 col-md-6 col-lg-6" -->
        <br>
        <table class="table table-bordered resume" align="center">
            <tr>
                <td>
                    <p style="margin: 2px">Mobile phone</p>
                </td>
                <td>
                    <p style="margin: 2px">063-754-96-56</p>
                </td>
                <td style="width: 50px; padding: 0px" rowspan="3">
                    <p style="margin: 0px"><img src="<?php echo base_url(); ?>/image/me.jpg.jpg" width="90" height="130" alt="картинка"></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="margin: 2px">Email</p>
                </td>
                <td>
                    <p style="margin: 2px">bogdan.dvinin@rambler.ru</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="margin: 2px">Date of Birth</p>
                </td>
                <td>
                    <p style="margin: 2px">29.05.1986 Zaporozhye</p>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <p style="text-indent: 20px"> Personal computer skills (Photoshop, HTML, PHP, MySQL, CSS,JavaScript, Jquery, JavaScript).</p>
                    <p style="text-indent: 20px"> Russian and Ukrainian native languages, English - Intermediate  level, active to deepen the conversational skills.Personal quality - punctuality, responsibility, creativity, communication, love work in a team and independently.</p>
                </td>
            </tr>
        </table>
        <br>
        <table class="table table-bordered resume" align="center">
            <tr>
                <td align="center"><b>Education</b></td>
            </tr>
            <tr>
                <td><p align="center" style="text-decoration: underline">2003 – 2009</p>
                    <p align="center">Institute of Economics and Information Technologies, Zaporozhye</p>
                    <p align="center">Specialty - Economics, Bachelor</p>
                </td>
            </tr>
            <tr>
                <td align="center"><b>Experience</b></td>
            </tr>
            <tr>
                <td><p align="center" style="text-decoration: underline" >02.2005 - 09.2006</p>
                    <p align="center">ЧП "Линник"</p>
                    <p align="center">Position: serviceman</p>
                    <p align="center">Main responsibilities:</p>
                    <p style="text-indent: 15px">- Work with the phone operating system</p>
                    <p style="text-indent: 15px">- Troubleshooting techniques and phones</p>
                </td>
            </tr>
            <tr>
                <td><p align="center" style="text-decoration: underline">02.2010 - 05.2012</p>
                    <p align="center">ЧП "БудСтрой"</p>
                    <p style="text-indent: 15px">- Consulting clients </p>
                    <p style="text-indent: 15px">- Implementation and control of construction works </p>
                    <p style="text-indent: 15px">- Attraction of new clients</p>
                </td>
            </tr>
            <tr>
                <td><p align="center" style="text-decoration: underline">08.2012 - 07.2015</p>
                    <p align="center">Hypermarket "Epicentr K" Kiev</p>
                    <p align="center">Position: The seller of building materials</p>
                    <p style="text-indent: 15px">- Client consulting</p>
                    <p style="text-indent: 15px">- Work in programme Potamus</p>
                    <p style="text-indent: 15px">(formation of payment documents)</p>
                    <p style="text-indent: 15px">- Sometimes work on the car loader</p>
                    <p style="text-indent: 15px">- Conducting an inventory</p>
                </td>
            </tr>
        </table>
        </div>
    </div>
</div>
<div class="container-fluid footer">
    <div class="row footer" style="position: absolute">
        <p>&copy; Богдан Двинин 2015 Inc.</p>
    </div>
</div>


</body>
</html>