<?php
session_start();
session_destroy();
if($_SESSION['masuk']){
header("location:login.php");

}
else
{
    echo"error";
}
?>