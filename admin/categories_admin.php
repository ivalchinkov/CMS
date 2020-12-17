<?php
include "includes/header_admin.php";
?>
    <div id = "wrapper">

    <!-- Navigation -->s
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
                    <div class = "col-xs-6">
                        <?php
                            inserting_categories();
                        ?>
                        <form action = "" method = "POST">
                            <div class = "form-group">
                                <label for = "cat-title"> Add category</label>
                                <input type = "text" class = "form-control" name = "cat_title">
                            </div>
                            <div class = "form-group">
                                <input class = "btn btn-primary" type = "submit" name = "submit" value = "Add category">
                            </div>
                        </form>
                        <?php //Update and include query
                            if(isset($_GET['edit'])){
                                $cat_id = $_GET['edit'];
                                include "includes/update_categories.php";
                            }
                        ?>
                    </div><!-- col-xs-6 -->
                    <div class = "col-xs-6">
                        <table class = "table table-bordered table-hover">
                            <thead>
                            `<tr>
                                <th>Id</th>
                                <th>Category title</th>
                            </tr>
                            </thead>
                            <tbody>
                           <?php //Find all categories query
                            find_all_categories();
                           //Delete query
                           delete_categories();
                            ?>
                            <tr>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div><!-- col-lg-12 -->
            </div> <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div> <!-- /#page-wrapper -->
<?php
include "includes/footer_admin.php"
?>