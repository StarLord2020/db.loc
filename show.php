<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 16.03.2020
 * Time: 12:27
 */

require_once('models/city.class.php');

$newsClass = new News();

$id = $_GET['id'];

$news = $newsClass->get_one(['id'=>$id]);

if(!$news){

    echo 'Такой записи не существует в базе данных'; die;

}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div><?=$news['name']?></div>
    <div><?=$news['content']?></div>
    <div><?=$news['status']?></div>
    <div><?=$news['category']?></div>
    <div><?=$news['author']?></div>
    <div><?=$news['publication_date']?></div>
</body>
</html>
