<?php
if(isset($_GET['edit_user'])) {
  $the_user_id = $_GET['edit_user'];

    $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
$select_users_query = mysqli_query($conn_db_cms, $query);
while($row = mysqli_fetch_assoc($select_users_query)) {
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_first_name = $row['user_first_name'];
    $user_last_name = $row['user_last_name'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];
}//while $row
}//if isset edit_user

if(isset($_POST['edit_user'])) {
    $user_first_name = $_POST['user_first_name'];
    $user_last_name = $_POST['user_last_name'];
    $user_role = $_POST['user_role'];
    /*
            $post_image = $_FILES['image']['name'];
            $post_image_temp = $_FILES['image']['tmp_name'];
    */
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    /*

            move_uploaded_file($post_image_temp, "../images/$post_image" );
    */

$query = "SELECT rand_salt FROM users WHERE username ='{$username}'";
    $select_rand_salt_query = mysqli_query($conn_db_cms, $query);

    if(!$select_rand_salt_query){
        die("Query failed " . mysqli_error($conn_db_cms));
    }//if !$select_rand_salt_query

    $row = mysqli_fetch_array($select_rand_salt_query);
    $salt = $row['rand_salt'];

    $hashed_password = crypt($user_password, $salt);

    $query = "UPDATE users SET ";
    $query.= "user_first_name = '{$user_first_name}', ";
    $query.= "user_last_name = '{$user_last_name}', ";
    $query.= "user_role ='{$user_role}', ";
    $query.= "username = '{$username}', ";
    $query.= "user_email = '{$user_email}', ";
    $query.= "user_password = '{$hashed_password}' ";
    $query.= "WHERE user_id = {$the_user_id} ";

    $edit_user_query = mysqli_query($conn_db_cms, $query);
    if(!$edit_user_query){
        die ("Query failed" . mysqli_error($conn_db_cms));
    }//if !$edit_user_query


}//if create post
?>
<form action = "" method = "post" enctype = "multipart/form-data">
    <div class = "form-group">
        <label for = "post_title">First name</label>
        <input type = "text" value = "<?php echo $user_first_name?>" class = "form-control" name = "user_first_name">
    </div>
    <div class = "form-group">
        <label for = "post_category">Last name</label>
        <input type = "text" value = "<?php echo $user_last_name?>" class = "form-control" name = "user_last_name">
    </div>
    <select name = "user_role" id = "">
        <option value = "<?php echo $user_role;?>"><?php echo $user_role;?></option>

        <?php
        if($user_role == 'admin'){
       echo "<option value = 'subscriber'>subscriber</option>";
        }//if $user_role
        else{
           echo "<option value = 'admin'>admin</option>";
        }//else $user_role
        ?>



    </select>
    <!--<div class = "form-group">
        <label for = "post_image">Post Image</label>
        <input type = "file" name = "image">
    </div>-->
    <div class = "form-group">
        <label for = "post_tags">Username</label>
        <input type = "text" value = "<?php echo $username?>" class = "form-control" name = "username">
    </div>
    <div class = "form-group">
        <label for = "post_content">Email</label>
        <input type = "email" value = "<?php echo $user_email?>" class = "form-control" name = "user_email">
    </div>
    <div class = "form-group">
        <label for = "post_content">Password</label>
        <input type = "password" value = "<?php echo $user_password?>" class = "form-control" name = "user_password">
    </div>
    <div class = "form-group">
        <input type = "submit" class = "btn btn-primary" name = "edit_user" value = "Edit user">
    </div>
</form>