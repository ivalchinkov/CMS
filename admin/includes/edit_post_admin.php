<?php
$query = "SELECT * FROM posts";
    if(isset($_GET['p_id'])){
        $the_post_id = $_GET['p_id'];
    }//if isset GET p_id
$select_posts_by_id = mysqli_query($conn_db_cms, $query);
while($row = mysqli_fetch_array($select_posts_by_id)) {
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];
}//end while
if(isset($_POST['update_post'])){
    $post_author = $_POST['post_author'];
    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    $post_content = $_POST['post_content'];
    $post_tags = $_POST['post_tags'];

    move_uploaded_file($post_image_temp, "../images/$post_image" );

        if(empty($post_image)){
            $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
            $select_image = mysqli_query($conn_db_cms, $query);

            while($row = mysqli_fetch_array($select_image)){
                $post_image = $row['post_image'];
            }//end while
        }//if empty $post_image

    $query = "UPDATE posts SET ";
    $query.= "post_title = '{$post_title}', ";
    $query.= "post_category_id = '{$post_category_id}', ";
    $query.= "post_date = now(), ";
    $query.= "post_author = '{$post_author}', ";
    $query.= "post_status = '{$post_status}', ";
    $query.= "post_tags = '{$post_tags}', ";
    $query.= "post_content = '{$post_content}', ";
    $query.= "post_image = '{$post_image}' ";
    $query.= "WHERE post_id = {$the_post_id} ";

    $update_post = mysqli_query($conn_db_cms, $query);
    if(!$update_post){
        die("Query failed. " . mysqli_error($conn_db_cms));
    }//if !$update post

}//if isset update post
?>
<form action = "" method = "post" enctype = "multipart/form-data">
    <div class = "form-group">
        <label for = "post_title">Post Title</label>
        <input value = "<?php echo $post_title;?>" type = "text" class = "form-control" name = "post_title">
    </div>
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
        <label for = "post_author">Post Author</label>
        <input value = "<?php echo $post_author;?>" type = "text" class = "form-control" name = "post_author">
    </div>
    <div class = "form-group">
        <label for = "post_status">Post Status</label>
       <select name = "post_status" id = "">
        <option value = "<?php echo $post_status; ?>"><?php echo $post_status; ?></option>
           <?php
            if($post_status == 'published'){
                echo "<option value = 'draft'>Draft</option>";
            }//if $post_status
           else{
               echo "<option value = 'published'>Publish</option>";
           }//else post status
           ?>
    </select>
    </div>
    <label for = "post_image">Post Image</label>
    <div class = "form-group">
       <img width = "100" src = "../images/<?php echo $post_image; ?>">
        <input type = "file" class = "form-group" name = "post_image">
    </div>

    <div class = "form-group">
        <label for = "post_tags">Post Tags</label>
        <input value = "<?php echo $post_tags;?>" type = "text" class = "form-control" name = "post_tags">
    </div>
    <div class = "form-group">
        <label for = "post_content">Post Content</label>
        <textarea class = "form-control" name = "post_content" id = "" cols = "30" rows = "10"><?php echo $post_content;?>
         </textarea>
    </div>
    <div class = "form-group">
        <input type = "submit" class = "btn btn-primary" name = "update_post" value = "Update post">
    </div>
</form>