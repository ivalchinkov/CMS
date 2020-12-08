    <table class = "table table-bordered table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Comment</th>
                <th>Email</th>
                <th>Status</th>
                <th>In response to</th>
                <th>Date</th>
                <th>Approve</th>
                <th>Disapprove</th>
                <th>Delete</th>
            </tr>
        </thead>
    <tbody>
<?php
    global $conn_db_cms;
    $query = "SELECT * FROM comments";

    $select_comment = mysqli_query($conn_db_cms, $query);
    while($row = mysqli_fetch_assoc($select_comment)){
        $comment_id = $row['comment_id'];
        $comment_post_id = $row['comment_post_id'];
        $comment_author =  $row['comment_author'];
        $comment_content = $row['comment_content'];
        $comment_email =  $row['comment_email'];
        $comment_status =  $row['comment_status'];
        $comment_date = $row['comment_date'];
        echo "<tr>";
        echo "<td>$comment_id</td>";
        echo "<td>$comment_author</td>";
        echo "<td>$comment_content</td>";
        echo "<td>$comment_email</td>";
        echo "<td>$comment_status</td>";

        $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
        $select_post_id_query = mysqli_query($conn_db_cms, $query);

        while($row = mysqli_fetch_assoc($select_post_id_query)){
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $link = "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
            echo $link;
        }//while $select_post_id_query

        echo "<td>$comment_date</td>";
        echo "<td><a href = 'comments.php?approved=$comment_id'>Approve</a></td>";
        echo "<td><a href = 'comments.php?disapproved=$comment_id'>Disapprove</a></td>";
        echo "<td><a href = 'comments.php?delete=$comment_id'>Delete</a></td>";
        echo "</tr>";

    }//end while loop
    ?>
    </tbody>
</table>
<?php
        if(isset($_GET['approved'])){
            $the_comment_id = $_GET['approved'];
            $query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = $the_comment_id ";
            $approve_comment_query = mysqli_query($conn_db_cms, $query);
            header("Location: comments.php");
        }//if isset Approve


        if(isset($_GET['disapproved'])){
            $the_comment_id = $_GET['disapproved'];
            $query = "UPDATE comments SET comment_status = 'Disapproved' WHERE comment_id = $the_comment_id ";
            $disapprove_comment_query = mysqli_query($conn_db_cms, $query);
            header("Location: comments.php");
        }//if isset disapprove


    if(isset($_GET['delete'])){
        $the_comment_id = $_GET['delete'];
        $query = "DELETE FROM comments WHERE comment_id = $the_comment_id ";
        $delete_query = mysqli_query($conn_db_cms, $query);
        header("Location: comments.php");
    }//if isset delete
?>