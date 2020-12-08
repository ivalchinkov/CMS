<?php
include "includes/header_admin.php";
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
                    <?php
                        if(isset($_GET['source'])){
                            $source = $_GET['source'];
                        }/*if source*/else{
                            $source = '';
                        }//else source
                    switch($source){
                        case 'add_user';
                            include "includes/add_user.php";
                            break;

                        case 'edit_user';
                            include "includes/edit_user.php";
                            break;

                        default:
                            include "includes/view_all_users.php";
                            break;
                    }//switch $source
                    ?>

                </div><!-- col-lg-12 -->
            </div> <!-- /.row -->
        </div><!-- /.container-fluid -->


    </div> <!-- /#page-wrapper -->

<?php
include "includes/footer_admin.php"
?>