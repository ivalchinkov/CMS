<?php
    session_start();
    ob_start();
    include "../includes/db.php";
    include "functions_admin.php";


    if(!isset($_SESSION['user_role'])){

            header("Location: ../index.php");
    }//if $user_role
?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "utf-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1">
      <title>Admin section</title>
    <!-- Bootstrap Core CSS -->
    <link href = "css/bootstrap.min.css" rel = "stylesheet">

    <!-- Custom CSS -->
    <link href = "css/sb-admin.css" rel = "stylesheet">

    <!-- Custom Fonts -->
    <link href = "font-awesome/css/font-awesome.min.css" rel = "stylesheet" type = "text/css">

    <script type = "text/javascript" src = "https://www.google.com/jsapi"></script>
    <script src = "https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src = "https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
</head>
<body>