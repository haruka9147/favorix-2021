<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="format-detection" content="telephone=no,address=no,email=no">
<meta name="description" content="<?php echo $description; ?>">
<meta name="robots" content="index,follow">
<title><?php echo $title; ?></title>

<meta property="og:title" content="<?php echo $title; ?>">
<meta property="og:type" content="website">
<meta property="og:description" content="<?php echo $description; ?>">
<meta property="og:url" content="<?php echo $url; ?>">
<meta property="og:site_name" content="エステサロン FAVORIX GROUP">
<meta property="og:image" content="https://www.ginza-blv.jp/img/ogimage.png">

<link rel="canonical" href="<?php echo $url; ?>">

<link rel="stylesheet" href="<?php echo $path; ?>css/reset.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>slick/slick-theme.css"/>
<link rel="stylesheet" href="<?php echo $path; ?>css/common.css" />
<link rel="stylesheet" href="<?php echo $path; ?>css/<?php echo $cssName; ?>.css" />

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-41295468-5"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-41295468-5');
</script>

</head>
<body>

    <div class="container">
        <div class="nav spOnly">
            <nav>
                <ul class="parentNav">
                    <li>
                        <a href="/about/">初めての方へ</a>
                    </li>
                    <li>
                        <a href="/menu/">メニュー</a>
                    </li>
                    <li class="acBtn">
                        <a href="/salon/">サロン検索</a>
                        <ul class="childNav">
                            <li><a href="/salon/">サロン検索TOP</a></li>
                            <li class="ac">
                                <a href="/salon/tohoku/">東北エリア</a>
                            </li>
                            <li class="ac">
                                <a href="/salon/kanto/">関東エリア</a>
                            </li>
                            <li class="ac">
                                <a href="/salon/tokyo/">東京エリア</a>
                            </li>
                            <li class="ac">
                                <a href="/salon/chubu/">中部エリア</a>
                            </li>
                            <li class="ac">
                                <a href="/salon/kinki/">近畿エリア</a>
                            </li>
                            <li class="ac">
                                <a href="/salon/shikoku/">四国エリア</a>
                            </li>
                            <li class="ac">
                                <a href="/salon/kyushu/">九州エリア</a>
                            </li>
                            <li class="ac">
                                <a href="/salon/okinawa/">沖縄エリア</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="/qa/">Q&A</a></li>
                    <li><a href="/report/">体験レポート</a></li>
                    <li><a href="/column/">コラム</a></li>
                    <li><a href="/reserve/">ご予約</a></li>
                    <li><a href="/news/">お知らせ</a></li>
                    <li><a href="/sitemap/">サイトマップ</a></li>
                </ul>
            </nav>
        </div>
        <header>
            <h1 class="logo"><a href="/"><img src="<?php echo $path; ?>img/common/logo.svg" alt="FAVORIX GROUP ESTHETHIC&PRODUCTS"></a></h1>
            <p class="navReserveBtn pcOnly"><a href="/reserve/"><img src="<?php echo $path; ?>img/common/reserveBtn.png" srcset="<?php echo $path; ?>img/common/reserveBtn.png 1x, <?php echo $path; ?>img/common/reserveBtn@2x.png 2x" alt="ご予約はこちら"></a></p>
            <nav class="headerNav spOnly">
                <?php if($cssName == 'menu' || $cssName == 'salon' ) { ?>
                    <ul class="spMenu col4">
                        <li><a href="/about/">初めての方</a></li>
                        <li><a href="/menu/body/">ボディ</a></li>
                        <li><a href="/menu/facial/">フェイシャル</a></li>
                        <li><a href="/menu/bridal/">ブライダル</a></li>
                    </ul>
                <?php } else { ?>
                <ul class="spMenu">
                    <li><a href="/about/">初めての方</a></li>
                    <li><a href="/menu/">メニュー</a></li>
                    <li><a href="/salon/">サロン検索</a></li>
                </ul>
                <?php }  ?>
            </nav>
            <div class="navBtn spOnly">
                <i class="bar bar1"></i>
                <i class="bar bar2"></i>
                <i class="bar bar3"></i>
            </div>
        </header>
        <nav class="pcNav pcOnly">
            <ul class="pcMenu">
                <li><a href="/about/">はじめての方</a></li>
                <li><a href="/menu/">メニュー</a>
                    <ul class="middleMenu">
                        <li><a href="/menu/body/">ボディ</a></li>
                        <li><a href="/menu/facial/">フェイシャル</a></li>
                        <li><a href="/menu/bridal/">ブライダル</a></li>
                    </ul>
                </li>
                <li><a href="/salon/">サロン検索</a>
                    <ul class="middleMenu">
                        <li><a href="/salon/">サロン検索TOP</a></li>
                        <li><a href="/salon/">エリア別サロン</a>
                            <ul class="subMenu">
                                <li>
                                    <h3>エリア</h3>
                                    <div class="menuSalonLists">
                                        <p class="menuSalonList"><a href="/salon/tohoku/">東北エリア</a></p>
                                        <p class="menuSalonList"><a href="/salon/kinki/">近畿エリア</a></p>
                                        <p class="menuSalonList"><a href="/salon/kanto/">関東エリア</a></p>
                                        <p class="menuSalonList"><a href="/salon/shikoku/">四国エリア</a></p>
                                        <p class="menuSalonList"><a href="/salon/tokyo/">東京エリア</a></p>
                                        <p class="menuSalonList"><a href="/salon/kyushu/">九州エリア</a></p>
                                        <p class="menuSalonList"><a href="/salon/chubu/">中部エリア</a></p>
                                        <p class="menuSalonList"><a href="/salon/okinawa/">沖縄エリア</a></p>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#">ブランド別サロン</a>
                            <ul class="subMenu">
                                <li>
                                    <h3>ブランド</h3>
                                    <div class="menuSalonLists">
                                        <p class="menuSalonList"><a href="/salon/ginza-blv/">GINZA BLV</a></p>
                                        <!-- <p class="menuSalonList"><a href="/salon/stylelab/">STYLE LAB</a></p> -->
                                        <p class="menuSalonList"><a href="/salon/blv/">GRAND BLV</a></p>
                                        <!-- <p class="menuSalonList"><a href="/salon/stylefine/">STYLE FINE</a></p> -->
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="/qa/">Q&A</a></li>
                <li><a href="/report/">体験レポート</a></li>
                <li><a href="/column/">コラム</a></li>
            </ul>
        </nav>