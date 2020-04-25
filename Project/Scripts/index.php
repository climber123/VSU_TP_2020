<?php
    session_start();
    if (!isset($_SESSION['user_id']))
    {
        require_once('Authorization/my_login.php');
    }
    else
    {
        require_once('categories_page.php');
    }