<?php
session_start();
    error_reporting(-1);
    echo $_SESSION['name'];
    echo $_SESSION['type'];
    echo $_SESSION['comment'];
    unset $_SESSION['name'];
    unset $_SESSION['type'];
    unset $_SESSION['comment'];
    # Если кнопка нажата
    // if( isset( $_POST['addition'] ) )
    // {
        # Тут пишете код, который нужно выполнить.
        # эти переменные надо забить в базу
   //      echo 'Кнопка нажата!';
   //                if(isset($_POST['name']))
   //      {
   //          echo 'Вывод прошел!';
   //         $name=$_POST['name'];
   //         $type=$_POST['type'];
   //         $comment=$_POST['comment'];
   //         $owner=$_POST['owner'];
   //         $lat=$_POST['lat'];
   //         $lng=$_POST['lng'];
   //         $zoom=$_POST['zoom'];
   //         $account_state=$_POST['account_state'];
   //      echo $name;
   // }
// }
?>