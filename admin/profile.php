<?php
    include "includes/header_admin.php";

    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        $select_user_profile_query = mysqli_query($conn_db_cms, $query);

        while($row = mysqli_fetch_array($select_user_profile_query)){
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_first_name = $row['user_first_name'];
            $user_last_name = $row['user_last_name'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
        }//while $row
    }//if isset $_SESSION username
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

    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    $query = "UPDATE users SET ";
    $query.= "user_first_name = '{$user_first_name}', ";
    $query.= "user_last_name = '{$user_last_name}', ";
    $query.= "username = '{$username}', ";
    $query.= "user_email = '{$user_email}', ";
    $query.= "user_password = '{$user_password}' ";
    $query.= "WHERE username = '{$username}' ";

    $edit_user_query = mysqli_query($conn_db_cms, $query);
    if(!$edit_user_query){
        die ("Query failed" . mysqli_error($conn_db_cms));
    }//if !$edit_user_query
}//if create post
?>
    <div id = "wrapper">
    <!-- Navigation -->
    <?php
    include "includes/navigation_admin.php";
    ?>
    <div id = "page-wrapper">
        <div class = "container-fluid">
            <!-- Page Heading -->
            <div class = "row">
                <div class = "col-lg-12">
                    <h3 class = "page-header">
                        Welcome to admin page!
                        <small>Author</small>
                    </h3>
                    <form action = "" method = "post" enctype = "multipart/form-data">
                        <div class = "form-group">
                            <label for = "post_title">First name</label>
                            <input type = "text" class = "form-control" name = "user_first_name">
                        </div>
                        <div class = "form-group">
                            <label for = "post_category">Last name</label>
                            <input type = "text"  class = "form-control" name = "user_last_name">
                        </div>
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
                            <input type = "password" class = "form-control" name = "user_password" autocomplete = "off">
                        </div>
                        <div class = "form-group">
                            <input type = "submit" class = "btn btn-primary" name = "edit_user" value = "Edit profile">
                        </div>
                    </form>
                </div><!-- col-lg-12 -->
            </div> <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div> <!-- /#page-wrapper -->
<?php
include "includes/footer_admin.php"
?>