<?php
include "includes/header.php";
include "includes/db.php";
// Navigation
include "includes/navigation.php";?>
    <!-- Page Content -->
    <div class = "container">
    <div class = "row">
        <!-- Blog Entries Column -->
        <div class = "col-md-8">
            <?php
            $per_page = 10;
            if(isset($_GET['page'])){

                $page = $_GET['page'];
            }//if isset page
            else{
                $page = 1;
            }//else

            if($page == 1){
                $page_1 = 0;
            }//if $page
            else{
                $page_1 = ($page * $per_page) - $per_page;
            }//else

            $post_query_count = "SELECT * FROM posts";
            $find_count = mysqli_query($conn_db_cms, $post_query_count);
            $count = mysqli_num_rows($find_count);
            $count = ceil($count / 10);

            $query = "SELECT * FROM posts LiMIT $page_1, $per_page";
            $select_all_posts_query = mysqli_query($conn_db_cms, $query);
            if (mysqli_num_rows($select_all_posts_query) == 0) {
                echo "No results found!";
            }/*if  $select_all_posts_query*/
            else {
                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_user = $row['post_user'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'], 0, 50) . '...';
                    $post_status = $row['post_status'];
                    //if($post_status == 'published'){
                    ?>

                    <!-- First Blog Post -->
                    <h2>
                        <a href = "post.php?p_id=<?php echo $post_id; ?>"> <?php echo $post_title; ?> </a>
                    </h2>
                    <p class = "lead">
                        by <a href = "author_posts.php?author=<?php echo $post_user ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_user; ?></a>
                    </p>
                    <p><span class = "glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                    <hr>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><img class = "img-responsive"
                                                                         src = "images/<?php echo $post_image; ?>"></a>
                    <hr>
                    <div id = "post_content"><?php echo $post_content; ?></div>
                    <a class = "btn btn-primary" href = "post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <hr>
                    <?php
                    // }//if $post_status
                }//while $row
            }//else
            ?>
        </div>
        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php" ?>
    </div>
    <!-- /.row -->
    <hr>
    <ul class = "pager">
      <?php
        for ($i = 1; $i <= $count; $i++){
            if($i == $page){
                echo "<li><a class = 'active_link' href = 'index.php?page={$i}'>{$i}</a></li>";
            }//if $i
            else{
                echo "<li><a href = 'index.php?page={$i}'>{$i}</a></li>";
            }//else
        }//for
      ?>
    </ul>
<?php include "includes/footer.php" ?>