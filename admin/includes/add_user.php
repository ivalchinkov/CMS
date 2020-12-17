<?php
if (isset($_POST['create_user'])) {
    $user_first_name = $_POST['user_first_name'];
    $user_last_name = $_POST['user_last_name'];
    $user_role = $_POST['user_role'];

    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    $user_password = password_hash($user_password, PASSWORD_BCRYPT, ['cost' => 10]);

    $query = "INSERT INTO users(user_first_name, user_last_name, user_role, username, user_email, user_password) ";
    //bottom line syntax .= concatenates with upper one
    $query .= "VALUES ('{$user_first_name}', '{$user_last_name}', '{$user_role}', '{$username}','{$user_email}', '{$user_password}' )";

    $create_user_query = mysqli_query($conn_db_cms, $query);
    if (!$create_user_query) {
        die("Query failed" . mysqli_error($conn_db_cms));
    }//!$create_user_query
    echo "User created: " . " " . "<a href = 'users.php'>View users</a> ";

}//if create post
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">First name</label>
        <input type="text" class="form-control" name="user_first_name">
    </div>
    <div class="form-group">
        <label for="post_category">Last name</label>
        <input type="text" class="form-control" name="user_last_name">
    </div>
    <select name="user_role" id="">
        <option value="subscriber">Select options</option>
        <option value="admin">Admin</option>
        <option value="subscriber">Subscriber</option>
    </select>
    <!--<div class = "form-group">
        <label for = "post_image">Post Image</label>
        <input type = "file" name = "image">
    </div>-->
    <div class="form-group">
        <label for="post_tags">Username</label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label for="post_content">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>
    <div class="form-group">
        <label for="post_content">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_user" value="Add user">
    </div>
</form>