<?php
session_start();
include "db.php";
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_role = 'Admin';

    $username = mysqli_real_escape_string($conn_db_cms, $username);
    $password = mysqli_real_escape_string($conn_db_cms, $password);

    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_query = mysqli_query($conn_db_cms, $query);
    if (!$select_user_query) {
        die("Query failed " . mysqli_error($conn_db_cms));
    }//if not $select_user_query

    while ($row = mysqli_fetch_array($select_user_query)) {
        $db_id = $row['user_id'];
        $db_username = $row['username'];
        $db_user_password = $row['user_password'];
        $db_user_first_name = $row['user_first_name'];
        $db_user_last_name = $row['user_last_name'];
        $db_user_role = $row['user_role'];
        //$db_user_salt = $row['rand_salt'];
    }//while

   // $encrypted_password = crypt($password, $db_user_salt);

    if (password_verify($password,$db_user_password)) {
        $_SESSION['username'] = $db_username;
        $_SESSION['firstname'] = $db_user_first_name;
        $_SESSION['lastname'] = $db_user_last_name;
        $_SESSION['user_role'] = $db_user_role;
        header("Location: ../admin");
    }//if password_verify

    else {
       header("Location: ../index.php");
    }//else
} //isset Login