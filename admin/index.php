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
                          Welcome to
                            <small><?php echo $_SESSION['username'];?></small>
                        </h3>
                    </div>
                </div>
                <!-- /.row -->
                <!-- /.row -->
                <div class = "row">
                    <div class = "col-lg-3 col-md-6">
                        <div class = "panel panel-primary">
                            <div class = "panel-heading">
                                <div class = "row">
                                    <div class = "col-xs-3">
                                        <i class = "fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class = "col-xs-9 text-right">
                                        <?php
                                            $query = "SELECT * FROM posts";
                                            $select_all_post = mysqli_query($conn_db_cms, $query);
                                            $post_count = mysqli_num_rows($select_all_post);
                                            echo "<div class = 'huge'>{$post_count}</div>";
                                        ?>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href = "posts.php">
                                <div class = "panel-footer">
                                    <span class = "pull-left">View posts</span>
                                    <span class = "pull-right"><i class = "fa fa-arrow-circle-right"></i></span>
                                    <div class = "clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class = "col-lg-3 col-md-6">
                        <div class = "panel panel-green">
                            <div class = "panel-heading">
                                <div class = "row">
                                    <div class = "col-xs-3">
                                        <i class = "fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class = "col-xs-9 text-right">
                                        <?php
                                            $query = "SELECT * FROM comments";
                                            $select_all_comments = mysqli_query($conn_db_cms, $query);
                                            $comments_count = mysqli_num_rows($select_all_comments);
                                            echo "<div class = 'huge'>{$comments_count}</div>";
                                        ?>
                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href = "comments.php">
                                <div class = "panel-footer">
                                    <span class = "pull-left">View comments</span>
                                    <span class = "pull-right"><i class = "fa fa-arrow-circle-right"></i></span>
                                    <div class = "clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class = "col-lg-3 col-md-6">
                        <div class = "panel panel-yellow">
                            <div class = "panel-heading">
                                <div class = "row">
                                    <div class = "col-xs-3">
                                        <i class = "fa fa-user fa-5x"></i>
                                    </div>
                                    <div class = "col-xs-9 text-right">
                                         <?php
                                            $query = "SELECT * FROM users";
                                            $select_all_users = mysqli_query($conn_db_cms, $query);
                                            $user_count = mysqli_num_rows($select_all_users);
                                            echo "<div class = 'huge'>{$user_count}</div>";
                                        ?>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href = "users.php">
                                <div class = "panel-footer">
                                    <span class = "pull-left">View users</span>
                                    <span class = "pull-right"><i class = "fa fa-arrow-circle-right"></i></span><!--fa - means font awesome -->
                                    <div class = "clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class = "col-lg-3 col-md-6">
                        <div class = "panel panel-red">
                            <div class = "panel-heading">
                                <div class = "row">
                                    <div class = "col-xs-3">
                                        <i class = "fa fa-list fa-5x"></i>
                                    </div>
                                    <div class = "col-xs-9 text-right">
                                        <?php
                                            $query = "SELECT * FROM categories";
                                            $select_all_categories = mysqli_query($conn_db_cms, $query);
                                            $categories_count = mysqli_num_rows($select_all_categories);
                                            echo "<div class = 'huge'>{$categories_count}</div>";
                                        ?>
                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href = "categories_admin.php">
                                <div class = "panel-footer">
                                    <span class = "pull-left">View categories</span>
                                    <span class = "pull-right"><i class = "fa fa-arrow-circle-right"></i></span>
                                    <div class = "clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <?php
                $query = "SELECT * FROM posts WHERE post_status = 'Draft'";
                $select_all_draft_posts = mysqli_query($conn_db_cms, $query);
                $post_draft_count = mysqli_num_rows($select_all_draft_posts);

                $query = "SELECT * FROM comments WHERE comment_status = 'Disapproved'";
                $disapproved_comments = mysqli_query($conn_db_cms, $query);
                $disapproved_comment_count = mysqli_num_rows($disapproved_comments);

                $query = "SELECT * FROM users WHERE user_role = 'subscriber'";
                $select_all_subscribers = mysqli_query($conn_db_cms, $query);
                $subscriber_count = mysqli_num_rows($select_all_subscribers);
                ?>
                    <div class = "row">
                        <script type = "text/javascript">
                            google.charts.load('current', {'packages':['bar']});
                            google.charts.setOnLoadCallback(drawChart);
                            function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                    ['Data', 'Count'],

                                    <?php
                                        $element_text = ['Active Posts', 'Draft posts', 'Comments', 'Pending comments','Users', 'Subscriber count', 'Categories'];
                                        $element_count = [$post_count, $post_draft_count, $comments_count, $disapproved_comment_count, $user_count, $subscriber_count, $categories_count];
                                        for($i = 0; $i < 7; $i++){
                                            echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                                        }//for loop
                                    ?>

                                  //  ['Posts', 1000],

                                ]);
                                var options = {
                                    chart: {
                                        title: '',
                                        subtitle: '',
                                    }
                                };
                                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
                                chart.draw(data, google.charts.Bar.convertOptions(options));
                            }
                        </script>
                        <div id="columnchart_material" style="width: auto; height: 500px;"></div>
                    </div><!-- class row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php
    include "includes/footer_admin.php"
?>