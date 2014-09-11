<?php
session_start();
if(isset($_SESSION['conti'])&&isset($_SESSION['college_name'])){
unset($_SESSION['conti']);
unset($_SESSION['college_name']);
header('Location:../index.php');
}


?> 