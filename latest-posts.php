<?php
require_once('database.php');

$query = 'SELECT * FROM posts ORDER BY posted_date DESC LIMIT 3';

try {
$results = $db->query($query); 
$results->execute();
//echo 'I have the data';
} catch(Exception $e) {
    echo $e->getMessage();
    die();
}
$posts = $results->fetchAll(PDO::FETCH_ASSOC);
//echo $data;

//foreach($posts as $post) {
    //echo $post["title"];
    //echo "<img src=" . $post["img_src"] . ">";
  //}

?>



<div class="latest"> 
    <h2><span id="latest-title">Latest</span></h2>  
    <div class="news-container">

    <?php 
    $postNum = 1;
    foreach($posts as $post) { 
    ?>
        <div class="news <?php echo "news-" . $postNum . " " . $post["department"] . "-department-color" ?>"> <!-- creates the classes news-1 / news-2 / news-3 -->
            <div class="tooltip">
                <a href="#"><h3><?php echo $post["category"] ?></h3></a>
                <div class="tooltip-text">
                    <p>View all: 
                    <?php 
                    if($post["department"] === "Web") {
                        echo $post["department"] . ' Design/' . $post["category"];
                    } else {
                        echo $post["department"] . '/' . $post["category"];
                    }
                    ?>
                    </p>
                </div>
            </div>                     
            <a href="#">
                <div class="news-image-parent">
                    <div style="background-image: url('<?php echo $post["img_src"] ?>');" class="news-image-child">
                    </div>
                </div>
            </a> <!-- larger screens - background image -->
            <a href="#">
                <img src="<?php echo $post["img_src"] ?>" alt="<?php echo $post["title"] ?>">
            </a> <!-- small screens - inserted image -->
            <div class="news-text <?php echo "news-text-" . $postNum ?>">  <!-- creates the classes news-text-1 / news--ext-2 / news-text-3 -->              
                <h3><a href="#"><?php echo substr($post["title"], 0, 44) . '...' ?></a></h3>
                <p><?php echo $post["post_content_snippet"] ?>...</p>
                <div class="button"><a href="#">Read More</a></div>
                <div class="posted-by">
                    <div class="thumbnail"><img src="<?php echo $post["posted_by_img_src"] ?>" alt="Photo of <?php echo $post["posted_by"] ?>"></div>
                    <div class="posted-by-text">
                        <p><strong> Posted by <?php echo $post["posted_by"] ?></strong></p>
                        <p>
                        <?php 
                        $date=date_create($post["posted_date"]);
                        echo date_format($date,"jS F Y");
                        //echo $post["posted_date"] 
                        ?>
                        </p>                                
                    </div>    
                </div>
            </div>    
        </div>     
    
    <?php  
    $postNum++;
    } ?>
        
    </div> <!--end news-container-->
</div> <!-- end latest -->




