<?php include 'includes/header.php'; ?>
        <?php
                    
        $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 3";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            
        ?>
        <section class="section first-section">
            <div class="container-fluid">
                <div class="masonry-blog clearfix">  
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>              
                    <div class="left-side">
                        <div class="masonry-box post-media">
                             <img src="<?php if (file_exists("admin/uploads/" . $row['img'])) { echo "admin/uploads/" . $row['img']; } else { echo "admin/uploads/" . $row['old_img']; } ?>" alt="" class="img-fluid">
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-aqua"><a href="">
                                        <?php
                                        $sql1 = "SELECT cat_name FROM categories WHERE id='{$row["cat_id"]}'";
                                        $result1 = mysqli_query($conn, $sql1);
                                        if (mysqli_num_rows($result1) > 0) {
                                            $cat_data = mysqli_fetch_assoc($result1);
                                            echo $cat_data['cat_name'];
                                        }
                                        ?>
                                        </a></span>
                                        <h4><a href="single.php?id=<?php echo $row["id"]; ?>" title="<?php echo $row["title"]; ?>"><?php echo $row["title"]; ?></a></h4>
                                        <small><a href="#" title="<?php echo $row["date"]; ?>"><?php echo $row["date"]; ?></a></small>
                                        <small><a href="#" title="<?php echo $row["view"]; ?>"><?php echo $row["view"]; ?></a></small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                            </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    </div><!-- end left-side -->
                    <?php } ?>
                </div><!-- end masonry -->
            </div>
        </section>
        <?php
        }
        ?>

        <?php
                    
        $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 3";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            
        ?>
        <section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-list clearfix">

                                <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                                <div class="blog-box row">
                                    <div class="col-md-4">
                                        <div class="post-media">
                                            <a href="single.php?id=<?php echo $row["id"]; ?>" title="">
                                                <img src="<?php if (file_exists("admin/uploads/" . $row['img'])) { echo "admin/uploads/" . $row['img']; } else { echo "admin/uploads/" . $row['old_img']; } ?>" alt="" class="img-fluid">
                                                <div class="hovereffect"></div>
                                            </a>
                                        </div><!-- end media -->
                                    </div><!-- end col -->

                                    <div class="blog-meta big-meta col-md-8">
                                        <span class="bg-aqua"><a href="category.php" title="">
                                        <?php
                                        $sql1 = "SELECT cat_name FROM categories WHERE id='{$row["cat_id"]}'";
                                        $result1 = mysqli_query($conn, $sql1);
                                        if (mysqli_num_rows($result1) > 0) {
                                            $cat_data = mysqli_fetch_assoc($result1);
                                            echo $cat_data['cat_name'];
                                        }
                                        ?>
                                        </a></span>
                                        <h4><a href="single.php?id=<?php echo $row["id"]; ?>" title="<?php echo $row["title"]; ?>"><?php echo $row["title"]; ?></a></h4>
                                        <p>
                                        <?php
                                            if ($row["description"] > 200) {
                                                echo substr($row["description"], 0, 200) . "...";
                                            } else {
                                                echo $row["description"];
                                            }
                                        ?>
                                        </p>
                                        <small><a href="#" title=""><i class="fa fa-eye"></i> <?php echo $row["view"]; ?></a></small>
                                        <small><a href="#" title=""><?php echo $row["date"]; ?></a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->

                                <hr class="invis">

                                <?php } ?>

                            </div><!-- end blog-list -->
                        </div><!-- end page-wrapper -->

                        <hr class="invis">

                        <div class="row">
                            <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-start">
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                    <?php include 'includes/sidebar.php'; ?>
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <?php } ?>
<?php include 'includes/footer.php'; ?>