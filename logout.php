<?php
session_start();
session_unset();
session_destroy();
header("Location: /EMS/login.php");
exit;
