<?php

session_start();
session_unset(); // limpando
session_destroy(); // destruindo

header("location: index.php");
exit;