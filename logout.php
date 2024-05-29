<?php

session_start();
session_unset();
session_destroy();
header("Location: /bags_store/index.php");  
?>