    <table class = "table table-bordered table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Username</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
    <tbody>
<?php
    global $conn_db_cms;
    $query = "SELECT * FROM users";

    $select_users = mysqli_query($conn_db_cms, $query);
    while($row = mysqli_fetch_assoc($select_users)){
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_first_name = $row['user_first_name'];
        $user_last_name = $row['user_last_name'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];


        echo "<tr>";
        echo "<td>$user_id</td>";
        echo "<td>$username</td>";
        echo "<td>$user_first_name</td>";
        echo "<td>$user_last_name</td>";
        echo "<td>$user_email</td>";
        echo "<td>$user_role</td>";


        /*$query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
        $select_post_id_query = mysqli_query($conn_db_cms, $query);

        while($row = mysqli_fetch_assoc($select_post_id_query)){
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $link = "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
            echo $link;
        }//while $select_post_id_query*/

        echo "<td><a href = 'users.php?change_to_admin={$user_id}'>Admin</a></td>";
        echo "<td><a href = 'users.php?change_to_sub={$user_id}'>Subscriber</a></td>";
        echo "<td><a href = 'users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
        echo "<td><a href = 'users.php?delete={$user_id}'>Delete</a></td>";
        echo "</tr>";

    }//end while loop
    ?>
    </tbody>
</table>
<?php
        if(isset($_GET['change_to_admin'])){
            $the_user_id = $_GET['change_to_admin'];
            $query = "UPDATE users SET user_role = 'Admin' WHERE user_id = $the_user_id ";
            $change_to_admin_query = mysqli_query($conn_db_cms, $query);
            header("Location: users.php");
        }//if isset change_to_admin

        if(isset($_GET['change_to_sub'])){
            $the_user_id = $_GET['change_to_sub'];
            $query = "UPDATE users SET user_role = 'Subscriber' WHERE user_id = $the_user_id ";
            $change_to_sub_query = mysqli_query($conn_db_cms, $query);
            header("Location: users.php");
        }//if isset disapprove

        //prevent a user to delete data if not an admin
    if(isset($_GET['delete'])){
       if(isset($_SESSION['user_role'])){
           if($_SESSION['user_role'] == 'Admin'){

                $the_user_id = mysqli_real_escape_string($conn_db_cms, $_GET['delete']);

                $the_user_id = $_GET['delete'];
                $query = "DELETE FROM users WHERE user_id = $the_user_id ";
                $delete_user_query = mysqli_query($conn_db_cms, $query);
                header("Location: users.php");
           }
        }//if isset user_role
    }//if isset delete
?>