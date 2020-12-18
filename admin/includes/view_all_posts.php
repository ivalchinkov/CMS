<?php
    if(isset($_POST['check_box_array'])){
        foreach($_POST['check_box_array'] as $post_value_id){
           $bulk_options = $_POST['bulk_options'];

           switch($bulk_options){
            case 'published':
                $query = escape("UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$post_value_id} ");
                $update_to_published_status = mysqli_query($conn_db_cms, $query);
                if(!$update_to_published_status){
                 die("Query failed " . mysqli_error($conn_db_cms));
                }//if
            break;

                case 'draft':
                $query = escape("UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$post_value_id} ");
                $update_to_draft_status = mysqli_query($conn_db_cms, $query);
                if(!$update_to_draft_status){
                 die("Query failed " . mysqli_error($conn_db_cms));
                }//if
            break;

                case 'delete':
                $query = "DELETE FROM posts WHERE post_id = {$post_value_id} ";
                $update_to_delete_status = mysqli_query($conn_db_cms, $query);
                if(!$update_to_delete_status){
                 die("Query failed " . mysqli_error($conn_db_cms));
                }//if
            break;

            case 'clone':
             $query = "SELECT * FROM posts WHERE post_id = '{$post_value_id}' ";
             $select_post_query = mysqli_query($conn_db_cms, $query);

             while($row = mysqli_fetch_array($select_post_query)){
                $post_title = escape($row['post_title']);
                $post_category_id = escape($row['post_category_id']);
                $post_date = escape($row['post_date']);
                $post_author = escape($row['post_author']);
                $post_status = escape($row['post_status']);
                $post_image = escape($row['post_image']);
                $post_tags = escape($row['post_tags']);
                $post_content = escape($row['post_content']);
             }//while
             $query = escape("INSERT INTO posts (post_category_id, post_title, post_author, post_date, post_status, post_image, post_tags, post_content)");
             $query .= "VALUES ({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_status}', '{$post_image}', '{$post_tags}', '{$post_content}' )";
             $copy_query = mysqli_query($conn_db_cms, $query);
             if(!$copy_query){
             die("Query failed. " . mysqli_error($conn_db_cms));
             }//if !$copy_query
             break;
           }//switch
        }//foreach
    }//if isset check_box_array
?>
<form action = "" method = "POST" >
<table class = "table table-bordered table-hover">
    <div id = "bulk_option_container" class = "col-xs-4">
        <select class = "form-control" name = "bulk_options" id = "">
            <option value = "">Select Option</option>
            <option value = "published">Publish</option>
            <option value = "draft">Draft</option>
            <option value = "delete">Delete</option>
            <option value = "clone">Clone</option>
        </select>
    </div>
        <div class = "col-xs-4">
            <input type = "submit" name = "submit" class = "btn btn-success" value = "Apply">
            <a class = "btn btn-primary" href = "posts.php?source=add_post">Add new </a>
        </div>
    <thead>
    <tr>
        <th><input id = "select_all_boxes" type = "checkbox"> </th>
        <th>Post Id</th>
        <th>User</th>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
        <th>Image</th>
        <th>Tags</th>
        <th>Comments</th>
        <th>Date</th>
        <th>Edit</th>
        <th>Delete</th>
        <th>Post views count</th>
    </tr>
    </thead>
    <tbody>
</form>
    <?php
    global $conn_db_cms;
    $query = "SELECT * FROM posts ORDER  BY post_id DESC";

    $select_posts = mysqli_query($conn_db_cms, $query);
    while ($row = mysqli_fetch_assoc($select_posts)) {
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_user = $row['post_user'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];
        $post_views_count = $row['post_views_count'];
        echo "<tr>";
        ?>
        <td><input class = 'check_boxes' type = 'checkbox' name = 'check_box_array[]' value = '<?php echo $post_id;?>'></td>
        <?php
        echo "<td>$post_id</td>";

        if(!empty($post_author)){
            echo "<td>$post_author</td>";
        }//if isset $post_author
        elseif(!empty($post_user)){
            echo "<td>$post_user</td>";
        }//else
        echo "<td>$post_title</td>";

        $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
        $select_categories_id = mysqli_query($conn_db_cms, $query);

        while ($row = mysqli_fetch_assoc($select_categories_id)) {
            $cat_title = $row['cat_title'];
            $cat_id = $row['cat_id'];
            echo "<td>{$cat_title}</td>";
        }//end while

        echo "<td>$post_status</td>";
        echo "<td><img class='img-rounded img-responsive' src = '../images/$post_image'  width = '300' ></td>";
        echo "<td>$post_tags</td>";

          $query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
          $send_comment_query = mysqli_query($conn_db_cms, $query);
          $count_comments = mysqli_num_rows($send_comment_query);

            $row = mysqli_fetch_array($send_comment_query);
           $comment_id =  $row = ['comment_id'];
        echo "<td><a href = 'post_comments.php?id=$post_id'>$count_comments</a></td>";

        echo "<td>$post_date</td>";
        echo "<td><a href = 'posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
        echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?');\" href = 'posts.php?delete={$post_id}'>Delete</a></td>";
        echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to reset counter?');\"href = 'posts.php?reset={$post_id}'>{$post_views_count}</a></td>";
        echo "</tr>";
    }//end while loop
    ?>
    </tbody>
</table>
<?php
if (isset($_GET['delete'])) {
    $the_post_id = escape($_GET['delete']);
    $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";
    $delete_query = mysqli_query($conn_db_cms, $query);
    header("Location: posts.php");
}//if isset delete

if (isset($_GET['reset'])) {
    $the_post_id = escape($_GET['reset']);
    $query = "UPDATE posts SET post_views_count = 0 WHERE  post_id =" . mysqli_real_escape_string($conn_db_cms, $_GET['reset']) . " ";
    $reset_query = mysqli_query($conn_db_cms, $query);
    header("Location: posts.php");
}//if isset reset

?>