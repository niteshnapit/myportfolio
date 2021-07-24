<?php 

require "dbh.php";

// When button is pressed do this
if(isset($_POST['delete-blog-post-btn'])){
    $id = $_POST['blog-id'];

    $sqlDeleteBlogPost = "UPDATE blog_post SET f_post_status = '2' WHERE n_blog_post_id='$id' ";    

    if(mysqli_query($conn,$sqlDeleteBlogPost)){
        mysqli_close($conn);
        header("Location: ../blogs.php?deleteblogpost=success");
        exit();
    }
    else{
        mysqli_close($conn);
        header("Location: ../blogs.php?deletepost=error");
        exit();
    }



}

else{
    header("Location:../index.php");
    exit();
}