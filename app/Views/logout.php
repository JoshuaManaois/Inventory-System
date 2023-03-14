<?php
session_start();

// destroy the current session
session_destroy();

// redirect to login page
header("Location: Login");
exit;

?>