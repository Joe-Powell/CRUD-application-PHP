<?php

$conn = mysqli_connect('localhost', 'root', '12345', 'phpnewblog');

if(mysqli_connect_errno()) {
echo 'Failer to connect to mySQL'. mysqli_connect_errno();

}
