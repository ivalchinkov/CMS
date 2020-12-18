<?php
    if(isset($_POST['create_post'])){
        $post_category_id = escape($_POST['post_category_id']);
        $post_title = escape($_POST['post_title']);
        $post_user = escape($_POST['post_user']);
        $post_date = escape(date('d.m.Y h:i:s'));

        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];

        $post_content = escape($_POST['post_content']);
        $post_tags = escape($_POST['post_tags']);
        $post_status = escape($_POST['post_status']);

        move_uploaded_file($post_image_temp, "../images/$post_image" );

        $query = "INSERT INTO posts(post_category_id, post_title, post_user, post_date, post_image, post_content, post_tags, post_status) ";
        //bottom line syntax .= concatenates with upper one
        $query .= "VALUES ({$post_category_id}, '{$post_title}', '{$post_user}', CURRENT_TIMESTAMP , '{$post_image}', '{$post_content}','{$post_tags}', '{$post_status}' )";

        $create_post_query = mysqli_query($conn_db_cms, $query);
        if(!$create_post_query){
            die("Query failed " . mysqli_error($conn_db_cms));
        }//!$create_post_query
        $the_post_id= mysqli_insert_id($conn_db_cms);
        echo "<p class = bg-success>Post created <a href = '../post.php?p_id={$the_post_id}'> View post</a> or <a href = 'posts.php'>Edit more posts</a></p>";
    }//if create post

?>
<form action = "" method = "post" enctype = "multipart/form-data">
    <div class = "form-group">
        <label for = "post_title">Post Title</label>
        <input type = "text" class = "form-control" name = "post_title">
    </div>

    <div class = "form-group">
        <label for = "users">Users</label>
        <!-- <input type = "text" class = "form-control" name = "post_status">-->
        <select name = "post_user" id = "">
            <?php
            $users_query = "SELECT * FROM users";
            $select_user = mysqli_query($conn_db_cms, $users_query);

            if(!$select_user){
                die("Query failed. " . mysqli_error($conn_db_cms));
            }//if !$select_users

            while($row = mysqli_fetch_assoc($select_user)){
                $user_id =  $row['user_id'];
                $username = $row['username'];
                echo "<option value = '{$username}'>{$username}</option>";
            }//while
            ?>
        </select>
    </div>

    <!--
   <div class = "form-group">
        <label for = "post_author">Post Author</label>
        <input type = "text" class = "form-control" name = "post_author">
    </div>
    -->
   <div class = "form-group">
        <label for = "post_category_id">Post Category</label>
       <!-- <input type = "text" class = "form-control" name = "post_status">-->
       <select name = "post_category_id" id = "">
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
        <select name = "post_status" id = "">
            <option value = "draft">Select Option</option>
            <option value = "published">Published</option>
            <option value = "draft">Draft</option>
        </select>
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

        <textarea class = "form-control" name = "post_content"  id = "editor" cols = "30" rows = "20"></textarea>

    </div>
    <div class = "form-group">
        <input type = "submit" class = "btn btn-primary" name = "create_post" value = "Publish post">
    </div>
</form>