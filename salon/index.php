<?php 
    $dir = "area";
    include("../meta.php");
    $cssName = "area";
    $path = "../";
    include("../parts/header.php");
 ?>

<section>
    <div class="areaTop inner">
        <h2 class="commonTtl1">
            <img src="../img/top/salon-ttl.svg" alt="Salon information">
        </h2>
        <div class="salonFlex">
            <div class="topSalon">
                <ul>
                    <li>
                        <a href="/salon/tohoku/"><img src="../img/top/salon2.jpg" srcset="../img/top/salon2.jpg 1x, ../img/top/salon2@2x.jpg 2x" alt="東北エリア"><span>東北エリア</span></a>
                    </li>
                    <li>
                        <a href="/salon/kanto/"><img src="../img/top/salon3.jpg" srcset="../img/top/salon3.jpg 1x, ../img/top/salon3@2x.jpg 2x" alt="関東エリア"><span>関東エリア</span></a>
                    </li>
                    <li>
                        <a href="/salon/tokyo/"><img src="../img/top/salon4.jpg" srcset="../img/top/salon4.jpg 1x, ../img/top/salon4@2x.jpg 2x" alt="東京エリア"><span>東京エリア</span></a>
                    </li>
                    <li>
                        <a href="/salon/chubu/"><img src="../img/top/salon5.jpg" srcset="../img/top/salon5.jpg 1x, ../img/top/salon5@2x.jpg 2x" alt="中部エリア"><span>中部エリア</span></a>
                    </li>
                    <li>
                        <a href="/salon/kinki/"><img src="../img/top/salon6.jpg" srcset="../img/top/salon6.jpg 1x, ../img/top/salon6@2x.jpg 2x" alt="近畿エリア"><span>近畿エリア</span></a>
                    </li>
                    <li>
                        <a href="/salon/shikoku/"><img src="../img/top/salon1.jpg" srcset="../img/top/salon1.jpg 1x, ../img/top/salon1@2x.jpg 2x" alt="四国エリア"><span>四国エリア</span></a>
                    </li>
                    <li>
                        <a href="/salon/kyushu/"><img src="../img/top/salon7.jpg" srcset="../img/top/salon7.jpg 1x, ../img/top/salon7@2x.jpg 2x" alt="九州エリア"><span>九州エリア</span></a>
                    </li>
                    <li>
                        <a href="/salon/okinawa/"><img src="../img/top/salon8.jpg" srcset="../img/top/salon8.jpg 1x, ../img/top/salon8@2x.jpg 2x" alt="沖縄エリア"><span>沖縄エリア</span></a>
                    </li>
                </ul>
            </div>
            <div class="topSalonMap">
                <h2 class="salonTtl">全国60店舗で展開中</h2>

                <div class="salonMap">
                    <img src="../img/top/map.png" srcset="../img/top/map.png 1x, ../img/top/map@2x.png 2x" alt="全国60店舗で展開中">
                    <ul class="kaku">
                        <li><a href="/salon/tohoku/">東北エリア</a></li>
                        <li><a href="/salon/kanto/">関東エリア</a></li>
                        <li><a href="/salon/tokyo/">東京エリア</a></li>
                        <li><a href="/salon/chubu/">中部エリア</a></li>
                        <li><a href="/salon/kinki/">近畿エリア</a></li>
                        <li><a href="/salon/shikoku/">四国エリア</a></li>
                        <li><a href="/salon/kyushu/">九州エリア</a></li>
                        <li><a href="/salon/okinawa/">沖縄エリア</a></li>
                    </ul>
                </div>
                <p class="salonClick">お住まいの地域をタップ</p>
            </div>
        </div>
    </div>
</section>

<?php include("../parts/footer.php"); ?>