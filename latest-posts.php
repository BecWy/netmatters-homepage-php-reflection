<?php
require_once('database.php');

$query = 'SELECT * FROM posts ORDER BY posted_date DESC LIMIT 3';

try {
$results = $db->query($query); 
$results->execute();
echo 'I have the data';
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

    <?php foreach($posts as $post) { ?>

        <div class="news news-1">
            <div class="tooltip">
                <a href="#"><h3><?php echo $post["category"] ?></h3></a>
                <div class="tooltip-text">
                    <p>View all: Web Design /<?php echo $post["category"]?></p>
                </div>
            </div>                     
            <a href="#">
                <div class="news-image-parent">
                    <div class="news-1-image-child news-image-child">
                    </div>
                </div>
            </a> <!-- larger screens - background image -->
            <a href="#">
                <img src="<?php echo $post["img_src"] ?>" alt="Ecommerce website advert">
            </a> <!-- small screens - inserted image -->
            <div class="news-text news-text-1">                
                <h3><a href="#"><?php echo substr($post["title"], 0, 44) . '...' ?></a></h3>
                <p><?php echo $post["post_content_snippet"] ?>...</p>
                <div class="button"><a href="#">Read More</a></div>
                <div class="posted-by">
                    <div class="thumbnail"><img src="./images/thumbnails/thumbnail-1.jpeg" alt="Photo of James Gulliver"></div>
                    <div class="posted-by-text">
                        <p><strong> Posted by James Gulliver</strong></p>
                        <p>26th October 2020</p>                                
                    </div>    
                </div>
            </div>    
        </div>     
    
    <?php  } ?>
        
    </div> <!--end news-container-->
</div> <!-- end latest -->



