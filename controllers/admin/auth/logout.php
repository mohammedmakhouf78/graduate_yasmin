<?php
include __DIR__ . "/../../../functions/functions.php";
session_start();

session_destroy();

redirect(getPageAdmin("auth/login.php"));