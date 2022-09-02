<?php
session_start();
session_destroy();
echo 'Thanks for voting';
header("location: HomePage.html");


?>