<?php
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