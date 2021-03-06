<?php include "includes/header.php" ?>
    <!-- Navigation -->
<?php include "includes/navigation.php" ?>
<?php include "includes/db.php" ?>
    <!-- Page Content -->
    <div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?php
            if (isset($_GET['p_id'])) {
                $the_post_id = $_GET['p_id'];

                $view_query = "UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id = $the_post_id ";
                $send_query = mysqli_query($conn_db_cms, $view_query);

                if(!$view_query){
                    die("Query failed. " . mysqli_error($conn_db_cms));
                }//if !$view_query
            $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
            $select_all_posts_query = mysqli_query($conn_db_cms, $query);
            while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                $post_title = $row['post_title'];
                $post_user = $row['post_user'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
                ?>
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_user; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>">
                <hr>
                <p><?php echo $post_content; ?></p>
                <hr>
                <?php
            }//end while
            }//if isset p_id
            else{
                header("Location: index.php");
            }//else
            ?>
            <!-- Blog Comments -->
            <?php
            if (isset($_POST['create_comment'])) {

                $the_post_id = $_GET['p_id'];

                $comment_author = $_POST['comment_author'];
                $comment_email = $_POST['comment_email'];
                $comment_content = $_POST['comment_content'];

                if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content)){

                $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";
                $query .= "VALUES ($the_post_id, '{$comment_author}', '{$comment_email}',  '{$comment_content}', 'disapproved', now())";
                $create_comment_query = mysqli_query($conn_db_cms, $query);
                if (!$create_comment_query) {
                    die("Query failed" . mysqli_error($conn_db_cms));
                }//if not query
              /*
                $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $the_post_id ";
                $update_comment_count = mysqli_query($conn_db_cms, $query);
              */
                }else{
                    echo "<script>alert ('Fields should not be empty')</script>";
                }//else
            }//if isset create comment
            ?>
            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form class="needs-validation" novalidate action="" method="POST" role="form">
                    <div class="form-group">
                        <label for="author">Author:</label>
                        <input type="text" class="form-control" name="comment_author" required>
                        <div class="invalid-feedback text-danger">
                            Please choose a username.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="comment_email" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="comment_content" rows="30" id = "editor"></textarea>
                    </div>
                    <button type="submit" name="create_comment" class="btn btn-primary">Create comment</button>
                </form>
            </div>
            <hr>
            <!-- Posted Comments -->
            <?php
            $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
            $query .= "AND comment_status = 'Approved' ";
            $query .= "ORDER BY comment_id DESC ";
            $select_comment_query = mysqli_query($conn_db_cms, $query);

            if (!$select_comment_query) {
                die("Query failed" . mysqli_error($conn_db_cms));
            }//if !$select_comment_query

            while ($row = mysqli_fetch_array($select_comment_query)) {
                $comment_date = $row['comment_date'];
                $comment_content = $row['comment_content'];
                $comment_author = $row['comment_author'];
                ?>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64">
                    </a>

                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>
            <?php }//while $row ?>
            <!-- Comment -->
        </div>
        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php" ?>
    </div>
    <!-- /.row -->
    <hr>
<?php include "includes/footer.php" ?>