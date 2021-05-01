<?php
    session_unset($_SESSION['unique_id']);
    header('location:login.php');
?>