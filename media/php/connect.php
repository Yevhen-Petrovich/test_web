<?php
$connection = mysqli_connect('127.0.0.1', 'root', '', 'blog_bd');

if ($connection == false)
{
     echo "Ошибка";
     echo mysqli_connect_error();
     exit;
}

