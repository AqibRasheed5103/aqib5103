<?php

include_once('includes/config.php');
unset($_SESSION['user_id']);
header ('location:index.php');

?>