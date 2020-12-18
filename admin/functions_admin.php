<?php

function escape($string){
    global $conn_db_cms;
   return mysqli_real_escape_string($conn_db_cms, trim($string));

}//function escape

function users_online(){
    if(isset($_GET['users_online'])){
    global $conn_db_cms;
        if(!$conn_db_cms){
            session_start();
            require "../includes/db.php";
            $session = session_id();
            $time = time();
            $timeout_in_seconds = 60;
            $timeout = $time - $timeout_in_seconds;
            $query = "SELECT * FROM users_online WHERE session = '$session'";
            $send_query = mysqli_query($conn_db_cms, $query);
            $count = mysqli_num_rows($send_query);
                if($count == NULL){
                    mysqli_query($conn_db_cms, "INSERT INTO users_online(session, time) VALUES('$session', '$time')");
                }//if $count
                else{
                    mysqli_query($conn_db_cms, "UPDATE users_online SET time = '$time' WHERE session = '$session'");
                }//else
                $users_online_query = mysqli_query($conn_db_cms, "SELECT * FROM users_online WHERE time > '$timeout'");
                echo $count_users = mysqli_num_rows($users_online_query);
            if($count_users == 1){
                return "<h5>$count_users User online</h5>";
            }//if $count_user == 1
            else{
                return "<h5>$count_users Users online</h5>";
            }//else
        }//if !$conn_db_cms
    }//if isset users_online
}//users_online
users_online();

function inserting_categories(){
    global $conn_db_cms;
if(isset($_POST['submit'])){
    $cat_title = $_POST['cat_title'];
    if($cat_title == "" || empty($cat_title)) {
        echo "<p class=\"alert alert-danger\" role=\"alert\">This field should not be empty</p>";
    } else{
        $query = "INSERT INTO categories (cat_title) VALUES ('{$cat_title}') ";
        $create_category_query = mysqli_query($conn_db_cms, $query);
        if(!$create_category_query){
            die("Search query failed " . mysqli_error($conn_db_cms));
        }//if query

    }//else
}//if
}//function insert_categories

function find_all_categories(){
    global $conn_db_cms;
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($conn_db_cms, $query);
    while($row = mysqli_fetch_array($select_categories )){
        $cat_title =  $row['cat_title'];
        $cat_id =  $row['cat_id'];
        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href = 'categories_admin.php?delete={$cat_id}'> Delete</a></td>";
        echo "<td><a href = 'categories_admin.php?edit={$cat_id}'>Update</a></td>";
        echo "</tr>";
    }//while
}// function find_all_categories

function delete_categories(){
    global $conn_db_cms;
    if(isset($_GET['delete'])){
        $get_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$get_cat_id} ";
        $delete_query =  mysqli_query($conn_db_cms, $query);
        header("Location: categories_admin.php");
    }//if
}//function delete_categories
?>