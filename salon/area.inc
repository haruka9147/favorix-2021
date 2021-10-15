<!Doctype html>
<?php 
    $dir = $_GET["area"];
    include("../meta.php");
    $cssName = "area";
    $path = "/";
    include("../parts/header.php");

$area_en = $_GET["area"];
//if($area_en == "kanto") $area_en = "KantoKoshinetsu";
?>
<section>
    <div class="areaContent">
        <h2><?php echo $area[$area_id]; ?><span><?php echo $area_en; ?> area</span></h2>

        <div class="areaSlider">
            <div id="areaSlide">
                <div><img src="../../img/area/salon-img7.jpg" alt="<?php echo $area[$area_id]; ?>"></div>
                <div><img src="../../img/area/salon-img6.jpg" alt="<?php echo $area[$area_id]; ?>"></div>
                <div><img src="../../img/area/salon-img1.jpg" alt="<?php echo $area[$area_id]; ?>"></div>
                <div><img src="../../img/area/salon-img2.jpg" alt="<?php echo $area[$area_id]; ?>"></div>
                <div><img src="../../img/area/salon-img5.jpg" alt="<?php echo $area[$area_id]; ?>"></div>
                <div><img src="../../img/area/salon-img3.jpg" alt="<?php echo $area[$area_id]; ?>"></div>
                <div><img src="../../img/area/salon-img4.jpg" alt="<?php echo $area[$area_id]; ?>"></div>
                <div><img src="../../img/area/salon-img8.jpg" alt="<?php echo $area[$area_id]; ?>"></div>
            </div>
        </div>

        <ul class="areaList kaku">
        <?php
        foreach($shop as $k => $v) :
          if($v["area_id"] == $area_id) :
        ?>
            <li>
                <h3><?php echo $v["brand_nm"] . " " . $v["shop_nm"]; ?></h3>
                <div class="shopName">
                    <p class="shopAddress"><?php echo $pref[$v["pref_id"]] . $v["shop_address"] . "<br>" . $v["shop_building"]; ?></p>
                </div>
                <p class="shopLink"><a href="./<?php echo $v["shop_slug"]; ?>/">詳細を見る</a></p>
            </li>
            <?php
              endif;
            endforeach;
            ?>
        </ul>
    </div>
</section>
<?php include("../parts/footer.php"); ?>