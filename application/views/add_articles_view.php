<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.ord/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Главная</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <link href="http://demo/cilessons/css/articles.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"--></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    <script src="./js/scripts_v1.js"></script>
</head>
<body>

<form method="post" action="http://demo/cilessons/index.php/add_articles"> <!--абсалютный путь к контролеру куда отправляем данные из формы -->
 Название статьи:<br>  <input type="text" name="title" value="<?php echo set_value('title'); ?>" ><?php echo form_error('title'); ?><br> <!-- form_error('title'); выводим ошибки касательно проверок этого поля  -->
 Текст статьи:<br><textarea name="text" rows="10" cols="40" value="<?php echo set_value('text'); ?>" ></textarea><?php echo form_error('text'); ?></br> <!-- echo set_value('text') - при обнавлении страници позволяет сохранить надпись которая была до обновления -->
<!--ЧТо-бы добавить поле с датой мы его добавляем в нашем контролере ПХП фукцией -->
    <input type="submit" name="add" value="Добавить">
</form>
</body>
</html>