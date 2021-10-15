<?php 
    $dir = $v["shop_en"];
    include("../meta.php");
    $cssName = "salon";
    $path = "/";
    include("../parts/header.php");
 ?>
<section>
    <div class="salonDetail">
        <div class="salonDetailInner">
            <h2>
                <span class="brandName"><?php echo $v["brand_nm"] . " " . $v["shop_en"]; ?></span>
                <span class="salonName"><?php echo $v["brand_nm"] . " " . $v["shop_nm"]; ?></span>
            </h2>

            <table>
                <tbody>
                    <tr>
                        <th>住所</th>
                        <td><?php echo $pref[$v["pref_id"]] . $v["shop_address"] . $v["shop_building"]; ?></td>
                    </tr>
                    <tr>
                        <th>電話</th>
                        <td>
                            <span class="mincho pcOnly"><?php echo $v["shop_tel"]; ?></span>
                            <span class="mincho spOnly"><a href="tel:<?php echo $v["shop_tel"]; ?>"><?php echo $v["shop_tel"]; ?></a></span>
                        </td>
                    </tr>
                    <tr>
                        <th>営業時間<br>定休日</th>
                        <td><?php echo $v["shop_eigyo"]; ?><br>
                            <?php echo $v["shop_teikyu"]; ?></td>
                    </tr>
                    <tr>
                        <th>最寄り駅</th>
                        <td><?php echo $v["shop_access"]; ?></td>
                    </tr>
                </tbody>
            </table>


            <?php if(!empty($v["shop_ifrm"])) { ?>
                <div class="salonDetailMap">
                    <div class="gMap">
                        <iframe src="<?php echo $v["shop_ifrm"]; ?>" width="500" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>

                    <?php if(!empty($v["shop_intro"])) { ?>
                    <div class="salonRoute kaku">
                        <p><?php echo $v["shop_intro"]; ?></p>
                    </div>
                    <?php } ?>
                </div>
            <?php } ?>

        </div>
    </div>
</section>
<?php include("../parts/footer.php"); ?>
