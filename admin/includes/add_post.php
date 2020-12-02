<?php
    if(isset($_POST['create_post'])){
        $post_category_id = $_POST['post_category'];
        $post_title = $_POST['post_title'];
        $post_author = $_POST['post_author'];
        $post_date = date('d-M-Y h:i:sa');

        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];

        $post_content = $_POST['post_content'];
        $post_tags = $_POST['post_tags'];
        $post_comment_count = 4;
        $post_status = $_POST['post_status'];

        move_uploaded_file($post_image_temp, "../images/$post_image" );

        $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) ";
        //bottom line syntax .= concatenates with upper one
        $query .= "VALUES ({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}','{$post_tags}', '{$post_comment_count}','{$post_status}' )";

        $create_post_query = mysqli_query($conn_db_cms, $query);
        if(!$create_post_query){
            die("Query failed" . mysqli_error($conn_db_cms));
        }//!$create_post_query
    }//if create post
?>
<form action = "" method = "post" enctype = "multipart/form-data">
    <div class = "form-group">
        <label for = "post_title">Post Title</label>
        <input type = "text" class = "form-control" name = "post_title">
    </div>
    <div class = "form-group">
        <label for = "post_category">Post Category Id</label>
        <input type = "text" class = "form-control" name = "post_category_id">
    </div>
    <div class = "form-group">
        <label for = "post_author">Post Author</label>
        <input type = "text" class = "form-control" name = "post_author">
    </div>
   <!-- <div class = "form-group">
        <label for = "post_status">Post status</label>
        <input type = "text" class = "form-control" name = "post_status">
    </div>-->
    <div class = "form-group">
       <select name = "post_category" id = "">
            <?php
            $query = "SELECT * FROM categories";
            $select_categories = mysqli_query($conn_db_cms, $query);

            if(!$select_categories){
                die("Query failed. " . mysqli_error($conn_db_cms));
            }//if !$select_categories

            while($row = mysqli_fetch_assoc($select_categories)){
                $cat_title =  $row['cat_title'];
                $cat_id = $row['cat_id'];
                echo "<option value = '{$cat_id}'>{$cat_title}</option>";
            }//while
            ?>
        </select>
    </div>
    <div class = "form-group">
        <label for = "post_status">Post Status</label>
        <input type = "text" class = "form-control" name = "post_status">
    </div>
    <div class = "form-group">
        <label for = "post_image">Post Image</label>
        <input type = "file" name = "image">
    </div>
    <div class = "form-group">
        <label for = "post_tags">Post Tags</label>
        <input type = "text" class = "form-control" name = "post_tags">
    </div>
    <div class = "form-group">
        <label for = "post_content">Post Content</label>
        <textarea class = "form-control" name = "post_content" id = "" cols = "30" rows = "10"></textarea>
    </div>
    <div class = "form-group">
        <input type = "submit" class = "btn btn-primary" name = "create_post" value = "Publish post">
    </div>
</form>