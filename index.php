<?php
if (!session_id()) session_start();

require_once "./php/config.php";
require_once "./php/mysql.php";

require_once './php/mainseach.php';

require_once "frontpage.php";
?>