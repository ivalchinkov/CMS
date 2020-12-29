<?php
include "includes/db.php";
include "includes/header.php";
include "includes/header.php";

if(isset($_POST['submit'])){
    $to = "i.valchinkov@abv.bg";
    $subject = wordwrap($_POST['subject'], 70);
    $body = $_POST['body'];
    $header = "From: " . $_POST['email'];

    // send email
    mail($to, $subject, $body, $header);
}//if isset submit
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
                <h1>Contact</h1>
                    <form role = "form" action = "" method = "post" id = "login_form" >
                         <div class = "form-group">
                            <label for = "email" class = "sr-only">Email</label>
                            <input type = "email" name = "email" id = "email" class = "form-control" placeholder = "Please enter an email">
                        </div>
                        <div class = "form-group">
                            <label for = "subject" class = "sr-only">Email</label>
                            <input type = "text" name = "subject" id = "subject" class = "form-control" placeholder = "Subject">
                        </div>
                         <div class = "form-group">
                             <textarea class = "form-control" name = "body" id = "body" cols = "50" rows = "10"></textarea>

                        </div>

                        <input type = "submit" name = "submit" id = "btn-login" class = "btn btn-custom btn-lg btn-block" value = "Contact us">
                    </form>
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
        <hr>
<?php include "includes/footer.php";?>