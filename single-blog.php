<?php
require "admin/includes/dbh.php";
if(isset($_REQUEST['blog'])){
    $blogPath = $_REQUEST['blog'];
    $sqlGetBlog = "SELECT * FROM blog_post WHERE v_post_path = '$blogPath' AND f_post_status='1'";
    $queryGetBlog = mysqli_query($conn,$sqlGetBlog);

    if($rowGetBlog = mysqli_fetch_assoc($queryGetBlog)){
        $blogPostId = $rowGetBlog['n_blog_post_id'];
        $blogCategoryId = $rowGetBlog['n_category_id'];
        $blogTitle = $rowGetBlog['v_post_title'];
        $blogMetaTitle = $rowGetBlog['v_post_meta_title'];
        $blogContent = $rowGetBlog['v_post_content'];
        $blogMainImgUrl = $rowGetBlog['v_main_image_url'];
        $blogCreationDate = $rowGetBlog['d_date_created'];
    }
    else{
        header("Location: index.php");
        exit();
    }

    $sqlGetCategory = "SELECT * FROM blog_category WHERE n_category_id='$blogCategoryId'";
    $queryGetCategory = mysqli_query($conn,$sqlGetCategory);

    if($rowGetCategory = mysqli_fetch_assoc($queryGetCategory)){
        $categoryTitle = $rowGetCategory['v_category_title'];
        $blogCategoryPath = $rowGetCategory['v_category_path'];
    }

    $sqlGetTags = "SELECT * FROM blog_tags WHERE n_blog_post_id='$blogPostId'";
    $queryGetTags = mysqli_query($conn,$sqlGetTags);

    if($rowGetTags = mysqli_fetch_assoc($queryGetTags)){
        $blogTags = $rowGetTags['v_tag'];
        $blogTagsArr = explode(",", $blogTags);
    }

}

?>


<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>NKN</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <!-- tailwind css -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        /* Add a gray background color with some padding */
        body {
            font-family: Arial;
            padding: 20px;
            background: #f1f1f1;
        }

        /* Create two unequal columns that floats next to each other */
        /* Left column */
        .leftcolumn {
            float: left;
            width: 20%;
        }

        /* Right column */
        .rightcolumn {
            float: right;
            width: 80%;
            padding-left: 20px;
        }

        /* Fake image */
        .fakeimg {
            background-color: #aaa;
            width: 100%;
            padding: 20px;
        }

        /* Add a card effect for articles */
        .card {
            background-color: white;
            padding: 20px;
            margin-top: 20px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 800px) {

            .leftcolumn,
            .rightcolumn {
                width: 100%;
                padding: 0;
            }
        }
    </style>
</head>

<body>

    <div class="row">
        <div class="leftcolumn">
            <?php include "nav.php"; ?>
        </div>


        <div class="rightcolumn">
            <div class="card">
                <h2 style="text-align: center;"><?php echo $blogTitle; ?></h2>
                <h5><?php echo date("M j,Y",strtotime($blogCreationDate)); ?></h5>
                <div style="text-align: center;">
                <img src="<?php echo $blogMainImgUrl; ?>" srcset="<?php echo $blogMainImgUrl; ?> 2100w, 
                                         <?php echo $blogMainImgUrl; ?> 1050w, 
                                         <?php echo $blogMainImgUrl; ?> 525w" sizes="(max-width: 2100px) 100vw, 2100px"
                                alt="">
                </div>
                <div class="content">
                <?php echo $blogContent; ?>
                </div>
                <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
            </div>
        </div>
    </div>

</body>

</html>