<?php
    $dir = $_GET["area"];
    include("../meta.php");
    $cssName = "area";
    $path = "/";
    include("../parts/header.php");

$brand = array_keys($brands, $_GET["area"])[0];

$brandText1 = array(
    "お客様のなりたいを叶えるのが<br>私達の使命です", //ginza-blv
    "美しく、かつ健康的なスタイルへ", //blv
    "キレイを楽しみながら結果にこだわります", //stylelab
    "お客様の理想を現実に", //styleview
    "お客様第一のオーダーメイドエステ", //stylefine
);

$brandText2 = array(
    "お客様にはそれぞれ、なりたい自分があります。全体的にサイズダウンしたい、脚を長く見せたい、お腹を割りたいなど。そんなお客様の“なりたい”に寄り添い、叶えていくのが私達です。熟練の痩身技術と最新の理論でお客様の願いを叶えるお手伝いを致します。", //ginza-blv
    "ただ体重を減らす、ただ細くするだけでは、本当の美しさは手に入らないと思っております。美しく、かつ健康的であることが女性が本来持つ魅力です。女性らしい美しいスタイルを目指します。", //blv
    "理想のスタイルへとカラダが変わっていけば、エステサロンが通うのがもっと楽しくなる。STYLE LABでは“結果”はもちろんですが、キレイになるのを楽しんでいただくための様々な工夫をしております。全てのお客様が笑顔で美しくなることを望んでおります。", //stylelab
    "私達は熟練の技術と最新の理論で全てのお客様の理想を現実に致します。そして、お客様が思い描いている理想のさらに上を実現できるように、努力しております。全てはお客様の理想を現実にするために。", //styleview
    "お客様一人ひとり、年齢、体型、どこに脂肪がついていて、どこにアプローチしたいか。全てが同じお悩みのお客様はいらっしゃいません。そして、お客様の目標を達成するにはそれぞれの施術が必要不可欠、私達は考えます。だから、オーダーメイドエステ。決してマニュアルではできない特別な時間をご提供致します。", //stylefine
);

function path_match($path, $value){
    if($_GET["area"] == $path){
        echo $value;
    }
}
?>

 <section>
    <div class="areaTop brandTop inner">
        <h2 class="commonTtl1">
            <img src="<?php echo $path; ?>img/top/salon-ttl.svg" alt="Salon information">
        </h2>

        <div class="brandLinks pcOnly">
            <h3>FAVORIX GROUP</h3>
            <ul class="footerBrand">
                <li><a href="../ginza-blv/"><img src="<?php echo $path; ?>img/common/brand1.png" srcset="<?php echo $path; ?>img/common/brand1.png 1x, <?php echo $path; ?>img/common/brand1@2x.png 2x" alt="GINZA BLV"></a></li>
                <li><a href="../blv/"><img src="<?php echo $path; ?>img/common/brand2.png" srcset="<?php echo $path; ?>img/common/brand2.png 1x, <?php echo $path; ?>img/common/brand2@2x.png 2x" alt="GRAND BLV"></a></li>
            </ul>
        </div>
    </div>
</section>
<section>
    <div class="areaContent brandContent">

        <h2 class="brandTtl"><img src="<?php echo $path; ?>img/common/brand<?php echo $brand + 1; ?>.png" srcset="<?php echo $path; ?>img/common/brand<?php echo $brand + 1; ?>.png 1x, <?php echo $path; ?>img/common/brand<?php echo $brand + 1; ?>@2x.png 2x" alt="GINZA BLV"></h2>

        <p class="brandText1"><?php echo $brandText1[$brand]; ?></p>
        <p class="brandText2"><?php echo $brandText2[$brand]; ?></p>

        <div class="areaSlider">
            <div id="areaSlide">
                <div><img src="./img/slider1@2x.jpg" alt="<?php echo $brandText1[$brand]; ?>"></div>
                <div><img src="./img/slider2@2x.jpg" alt="<?php echo $brandText1[$brand]; ?>"></div>
                <div><img src="./img/slider3@2x.jpg" alt="<?php echo $brandText1[$brand]; ?>"></div>
                <div><img src="./img/slider4@2x.jpg" alt="<?php echo $brandText1[$brand]; ?>"></div>
            </div>
        </div>

        <ul class="areaList kaku">
<?php foreach($shop as $k => $v) :
    if($v["brand_id"] == $brand) :
?>
            <li>
                <h3><?php echo $v["brand_nm"] . " " . $v["shop_nm"]; ?></h3>
                <div class="shopName">
                    <p class="shopAddress"><?php echo $pref[$v["pref_id"]] . $v["shop_address"] . "<br>" . $v["shop_building"]; ?></p>
                </div>
                <p class="shopLink"><a href="../<?php echo array_keys($area_en, $v["area_id"])[0] . "/" . $v["shop_slug"]; ?>/">詳細を見る</a></p>
            </li>
<?php
    endif;
endforeach;
?>
        </ul>
    </div>
</section>
<section>
    <div class="brandLinksSp spOnly">
        <h2>FAVORIX GROUP</h2>
        <ul class="kaku">
            <li><a href="../ginza-blv/"<?php path_match("ginza-blv", " class=\"active\""); ?>>GINZA-BLV</a></li>
            <li><a href="../blv/"<?php path_match("blv", " class=\"active\""); ?>>GRAND BLV</a></li>
        </ul>
    </div>
</section>
<?php include("../parts/footer.php"); ?>