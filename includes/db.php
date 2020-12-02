<?php
$conn_db_cms= mysqli_connect('localhost', 'ivalchinkov', '88Ddb1d5', 'cms');
if(!$conn_db_cms){
    die("Database connection failed" . mysqli_error($conn_db_cms));
}
?>