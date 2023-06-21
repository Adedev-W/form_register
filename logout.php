<?php
session_start();

// Menghapus semua data session
session_destroy();
header("Location: register.php");
exit();
?>