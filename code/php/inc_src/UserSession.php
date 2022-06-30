<?php 
include "../inc_src/DBCnt.php";
session_start();

if(isset($_SESSION['username'])) {
    $jb_login = TRUE;
}else{
    $jb_login = FALSE;
}

?>