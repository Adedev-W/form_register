<?php
session_start();
session_unset();
$_SESSION['form_status'] = $next;
header("Location: ../s_register.php");
exit();
?>
