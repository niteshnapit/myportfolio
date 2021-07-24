<?php include("admin/includes/dbh.php"); ?>
<!DOCTYPE html>
<html lang="en">

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

</head>

<body id="page-top">

    <?php include "nav.php"; ?>

    <?php

    $sqlGetFirstBlog = "SELECT * FROM blog_post INNER JOIN blog_category ON blog_post.n_category_id = blog_category.n_category_id WHERE n_home_page_placement = '1' AND f_post_status != '2' LIMIT 1";
    $queryGetFirstBlog = mysqli_query($conn, $sqlGetFirstBlog);

    if ($rowGetFirstBlog = mysqli_fetch_assoc($queryGetFirstBlog)) {
        $firstBlogCategory = $rowGetFirstBlog['v_category_title'];
        $firstBlogCategoryPath = $rowGetFirstBlog['v_category_path'];
        $firstBlogTitle = $rowGetFirstBlog['v_post_title'];
        $firstBlogPath = $rowGetFirstBlog['v_post_path'];
        $firstBlogSummary = $rowGetFirstBlog['v_post_summary'];
        $firstBlogMainImageUrl = $rowGetFirstBlog['v_main_image_url'];
    ?>

        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-wrap -m-4">
                    <div class="p-4 md:w-1/3">
                        <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                            <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="<?php echo $firstBlogMainImageUrl; ?>" width="720" height="400">
                            <div class="p-6">
                                <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1"><?php echo $firstBlogCategory; ?></h2>
                                <h1 class="title-font text-lg font-medium text-gray-900 mb-3"><?php echo $firstBlogTitle; ?></h1>
                                <p class="leading-relaxed mb-3"><?php echo $firstBlogSummary; ?></p>
                                <div class="flex items-center flex-wrap ">
                                <a class='text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0' href="single-blog.php?blog=<?php echo $firstBlogPath; ?>">Learn More
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
            }

            $sqlGetSecondBlog = "SELECT * FROM blog_post INNER JOIN blog_category ON blog_post.n_category_id = blog_category.n_category_id WHERE n_home_page_placement = '2' AND f_post_status != '2' LIMIT 1";
            $queryGetSecondBlog = mysqli_query($conn, $sqlGetSecondBlog);

            if ($rowGetSecondBlog = mysqli_fetch_assoc($queryGetSecondBlog)) {

                $secondBlogCategory = $rowGetSecondBlog['v_category_title'];
                $secondBlogCategoryPath = $rowGetSecondBlog['v_category_path'];
                $secondBlogTitle = $rowGetSecondBlog['v_post_title'];
                $secondBlogPath = $rowGetSecondBlog['v_post_path'];
                $secondBlogSummary = $rowGetSecondBlog['v_post_summary'];
                $secondBlogMainImageUrl = $rowGetSecondBlog['v_main_image_url'];

                ?>

                    <div class="p-4 md:w-1/3">
                        <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                            <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="<?php echo $secondBlogMainImageUrl; ?>" width="720" height="400">
                            <div class="p-6">
                                <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1"><?php echo $secondBlogCategory; ?></h2>
                                <h1 class="title-font text-lg font-medium text-gray-900 mb-3"><?php echo $secondBlogTitle; ?></h1>
                                <p class="leading-relaxed mb-3"><?php echo $secondBlogSummary; ?></p>
                                <div class="flex items-center flex-wrap">
                                <a class='text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0' href="single-blog.php?blog=<?php echo $secondBlogPath; ?>">Learn More
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }

            $sqlGetThirdBlog = "SELECT * FROM blog_post INNER JOIN blog_category ON blog_post.n_category_id = blog_category.n_category_id WHERE n_home_page_placement = '3' AND f_post_status != '2' LIMIT 1";
            $queryGetThirdBlog = mysqli_query($conn, $sqlGetThirdBlog);

            if ($rowGetThirdBlog = mysqli_fetch_assoc($queryGetThirdBlog)) {

                $thirdBlogCategory = $rowGetThirdBlog['v_category_title'];
                $thirdBlogCategoryPath = $rowGetThirdBlog['v_category_path'];
                $thirdBlogTitle = $rowGetThirdBlog['v_post_title'];
                $thirdBlogPath = $rowGetThirdBlog['v_post_path'];
                $thirdBlogSummary = $rowGetThirdBlog['v_post_summary'];
                $thirdBlogMainImageUrl = $rowGetThirdBlog['v_main_image_url'];

                ?>

                    <div class="p-4 md:w-1/3">
                        <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                            <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="<?php echo $thirdBlogMainImageUrl; ?>" width="720" height="400">
                            <div class="p-6">
                                <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1"><?php echo $thirdBlogCategory; ?></h2>
                                <h1 class="title-font text-lg font-medium text-gray-900 mb-3"><?php echo $thirdBlogTitle; ?></h1>
                                <p class="leading-relaxed mb-3"><?php echo $thirdBlogSummary ?></p>
                                <div class="flex items-center flex-wrap ">
                                <a class='text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0' href="single-blog.php?blog=<?php echo $thirdBlogPath; ?>">Learn More
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php
                $sqlGetAllBlogs = "SELECT * FROM blog_post WHERE f_post_status = '1' ORDER BY n_blog_post_id DESC";
                $queryGetAllBlogs = mysqli_query($conn, $sqlGetAllBlogs);

                while ($rowGetAllBlogs = mysqli_fetch_assoc($queryGetAllBlogs)) {

                    $blogTitle = $rowGetAllBlogs['v_post_title'];
                    $blogPath = $rowGetAllBlogs['v_post_path'];
                    $blogSummary = $rowGetAllBlogs['v_post_summary'];
                    $blogAltImageUrl = $rowGetAllBlogs['v_alt_image_url'];
                    // $blogCategory = $rowGetAllBlogs['v_category_path'];       

                ?>

                    <div class="p-4 md:w-1/3">
                        <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                            <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="<?php echo $blogAltImageUrl; ?>" width="720" height="400">
                            <div class="p-6">
                                <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1"></h2>
                                <h1 class="title-font text-lg font-medium text-gray-900 mb-3"><?php echo $blogTitle; ?></h1>
                                <p class="leading-relaxed mb-3"><?php echo $blogSummary; ?></p>
                                <div class="flex items-center flex-wrap">
                                <a class='text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0' href="single-blog.php?blog=<?php echo $blogPath; ?>">Learn More
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <!-- <script src="js/scripts.js"></script> -->
</body>

</html>