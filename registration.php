<?php
include "includes/db.php";
include "includes/header.php";
include "includes/header.php";

if(isset($_POST ['submit'])){
  $username = $_POST ['username'];
  $email = $_POST ['email'];
  $password = $_POST ['password'];
  $confirm_password = $_POST ['confirm_password'];

    $username = mysqli_real_escape_string($conn_db_cms, $username);
    $email = mysqli_real_escape_string($conn_db_cms, $email);
    $password =  mysqli_real_escape_string($conn_db_cms, $password);

    if(empty(!$username) && empty(!$email) && empty(!$password) ){
    $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);


    $query = "INSERT INTO users (username, user_email, user_password, user_role)";
    $query .= "VALUES ('{$username}', '{$email}', '{$password}', 'subscriber' )";
    $register_user_query = mysqli_query($conn_db_cms, $query);

        if(!$register_user_query){
            die("Query failed " . mysqli_error($conn_db_cms) . ' ' . mysqli_errno($conn_db_cms));
        }//if !$register_user_query
        $message = "Registered successfully ";
    }//if empty
        else{
            $message = "Fields should not be empty";
        }//else
}//if isset $_POST submit
else{
    $message = "";
}//else
 ?>
    <!-- Navigation -->
    <?php  include "includes/navigation.php"; ?>
    <!-- Page Content -->
    <div class = "container">
<section id = "login">
    <div class = "container">
        <div class = "row">
            <div class = "col-xs-6 col-xs-offset-3">
                <div class = "form-wrap">
                <h1>Register</h1>
                    <form role = "form" action = "registration.php" method = "post" id = "login_form" >
                        <h5 class = "text-center"><?php echo $message; ?></h5>
                        <div class = "form-group">
                            <label for = "username" class = "sr-only">username</label>
                            <input type = "text" name = "username" id = "username" class = "form-control" placeholder = "Enter Desired Username">
                        </div>
                         <div class = "form-group">
                            <label for = "email" class = "sr-only">Email</label>
                            <input type = "email" name = "email" id = "email" class = "form-control" placeholder="somebody@example.com">
                        </div>
                         <div class = "form-group">
                            <label for = "password" class = "sr-only">Password</label>
                            <input type = "password" name = "password" id = "password" class = "form-control" placeholder = "Password">
                        </div>
                        <div class = "form-group">
                            <label for = "confirm_password" class = "sr-only"> Confirm Password</label>
                            <input type = "password" name = "confirm_password" id = "confirm_password" class = "form-control" placeholder = "Confirm Password">
                        </div>
                        <input type = "submit" name = "submit" id = "btn-login" class = "btn btn-custom btn-lg btn-block" value = "Register">
                    </form>
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
        <hr>
<?php include "includes/footer.php";?>