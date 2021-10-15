<?php
error_reporting(0);
$page_nm = trim(wp_title('',false,''));
$page_param["ogtype"] = "website";
$page_param["ogimage"] = "https://www.ginza-blv.jp/img/ogimage.png";

if(!isset($page_param["title"])){
  if(is_front_page()){
    $page_param["title"] = get_bloginfo("name");
  }elseif(is_home()){
    $page_param["title"] = "コラム｜" . get_bloginfo("name");
  }elseif(is_category()){
    $page_param["title"] = $page_nm . "の記事一覧｜" . get_bloginfo("name");
  }elseif(is_archive()){
    $page_param["title"] = $page_nm . "の記事一覧｜" . get_bloginfo("name");
  }elseif(is_404()){
    $page_param["title"] = "ページが見つかりません｜" . get_bloginfo("name");
  }elseif(get_post_meta($post->ID, "cf_title", true)){
    $page_param["title"] = post_custom("cf_title");
  }else{
    $page_param["title"] = $page_nm . "｜" . get_bloginfo("name");
  }

  if(is_front_page()){
    $page_param["description"] = "FAVORIX GROUP(フェイバリックスグループ)はエステサロンGINZA BLV、GRAND BLV、STYLEFINEの運営を中心に美容機器・サプリメントの開発、美容商材の卸売などを手がける美容専門のグループ会社です。";
  }elseif(is_home()){
    $page_param["description"] = "このコラムでは、エステサロンGINZA BLV、GRAND BLV、STYLEFINEを運営するFAVORIX GROUP(フェイバリックスグループ)が痩せたい、細くなりたい女性の願いを叶えるための情報を発信しています。";
  }elseif(is_category()){
    $page_param["description"] = $page_nm . " / このコラムでは、エステサロンGINZA BLV、GRAND BLV、STYLEFINEを運営するFAVORIX GROUP(フェイバリックスグループ)が痩せたい、細くなりたい女性の願いを叶えるための情報を発信しています。";
  }elseif(is_archive()){
    $page_param["description"] = $page_nm . " / このコラムでは、エステサロンGINZA BLV、GRAND BLV、STYLEFINEを運営するFAVORIX GROUP(フェイバリックスグループ)が痩せたい、細くなりたい女性の願いを叶えるための情報を発信しています。";
  }elseif(is_404()){
    $page_param["description"] = "ページが見つかりません　404 not found";
  }elseif(get_post_meta($post->ID, "cf_description", true)){
    $page_param["description"] = post_custom('cf_description');
  }elseif(is_single()){
    $page_param["description"] = ltl_get_the_excerpt(120);
  }

/*  if(is_front_page()){
    $page_param["h1"] = "";
  }elseif(is_home()){
    $page_param["h1"] = "美容コラム";
  }elseif(is_category()){
    $page_param["h1"] = $page_nm . "の記事一覧【" . $cts_nm . "】";
  }elseif(is_post_type_archive("info")){
    $page_param["h1"] = $page_nm;
  }elseif(is_archive()){
    $page_param["h1"] = $page_nm . "の記事一覧【" . $cts_nm . "】";
  }elseif(is_404()){
    $page_param["h1"] = "404 not found";
  }elseif(get_post_meta($post->ID, "cf_h1", true)){
    $page_param["h1"] = post_custom("cf_h1");
  }*/

  if(is_single()){
    $page_param["canonical"] = get_permalink();
    $page_param["ogtype"] = "article";
    $src = get_image(get_imagefield("imagefield_column"));

    if($src){
      $page_param["ogimage"] = $src;
    }
  }elseif(is_front_page()){
    $page_param["canonical"] = get_bloginfo("url") . "/";
  }elseif(is_category()){
    $cat = get_the_category();
    $page_param["canonical"] = get_category_link($cat[0]->cat_ID);
    $page_param["ogtype"] = "article";
  }else{
    $recent_post = get_posts("numberposts=1&showposts=1");
    if(count($recent_post) > 0) {
      $recent_post_id = $recent_post[0]->ID;
      $page_param["canonical"] = get_permalink($recent_post_id);
    }
  } 
}

if(is_paged() || (!is_singular("column") && is_single())){
  $noindex = true;
}

if(is_single()){
  $single = true;
}
?><!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="format-detection" content="telephone=no,address=no,email=no">
<meta name="description" content="<?php echo $page_param["description"]; ?>">
<?php if(isset($noindex)): ?>
<meta name="robots" content="noindex,follow">
<?php else: ?>
<meta name="robots" content="index,follow">
<?php endif; ?>
<title><?php echo $page_param["title"] ?></title>

<meta property="og:title" content="<?php echo $page_param["title"]; ?>">
<meta property="og:type" content="<?php echo $page_param["ogtype"]; ?>">
<meta property="og:description" content="<?php echo $page_param["description"]; ?>">
<meta property="og:url" content="<?php echo $page_param["canonical"]; ?>">
<meta property="og:site_name" content="<?php echo get_bloginfo("name"); ?>">
<meta property="og:image" content="<?php echo $page_param["ogimage"]; ?>">

<link rel="canonical" href="<?php echo $page_param["canonical"]; ?>">

<?php wp_head(); ?>

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
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>about/">初めての方へ</a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>menu/">メニュー</a>
                    </li>
                    <li class="acBtn">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>salon/">サロン検索</a>
                        <ul class="childNav">
                            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>salon/">サロン検索TOP</a></li>
                            <li class="ac">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>salon/tohoku/">東北エリア</a>
                            </li>
                            <li class="ac">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>salon/kanto/">関東エリア</a>
                            </li>
                            <li class="ac">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>salon/tokyo/">東京エリア</a>
                            </li>
                            <li class="ac">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>salon/chubu/">中部エリア</a>
                            </li>
                            <li class="ac">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>salon/kinki/">近畿エリア</a>
                            </li>
                            <li class="ac">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>salon/shikoku/">四国エリア</a>
                            </li>
                            <li class="ac">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>salon/kyushu/">九州エリア</a>
                            </li>
                            <li class="ac">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>salon/okinawa/">沖縄エリア</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>qa/">Q&A</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>report/">体験レポート</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>column/">コラム</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>reserve/">ご予約</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>news/">お知らせ</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>sitemap/">サイトマップ</a></li>
                </ul>
            </nav>
        </div>
        <header>
            <h1 class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( home_url( '/' ) ); ?>img/common/logo.svg" alt="FAVORIX GROUP ESTHETHIC&PRODUCTS"></a></h1>
            <p class="navReserveBtn pcOnly"><a href="<?php echo esc_url( home_url( '/' ) ); ?>reserve/"><img src="<?php echo esc_url( home_url( '/' ) ); ?>img/common/reserveBtn.png" srcset="<?php echo esc_url( home_url( '/' ) ); ?>img/common/reserveBtn.png 1x, <?php echo esc_url( home_url( '/' ) ); ?>img/common/reserveBtn@2x.png 2x" alt="ご予約はこちら"></a></p>
            <nav class="headerNav spOnly">
                <?php if($dir == 'tokyo' || $cssName == 'salon') { ?>
                    <ul class="spMenu col4">
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>about/">初めての方</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>menu/body/">ボディ</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>menu/facial/">フェイシャル</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>menu/bridal/">ブライダル</a></li>
                    </ul>
                <?php } else { ?>
                <ul class="spMenu">
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>about/">初めての方</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>menu/">メニュー</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>salon/">サロン検索</a></li>
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
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>about/">はじめての方</a></li>
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>menu/">メニュー</a>
                    <ul class="middleMenu">
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>menu/body/">ボディ</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>menu/facial/">フェイシャル</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>menu/bridal/">ブライダル</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>salon/">サロン検索</a>
                    <ul class="middleMenu">
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>salon/">サロン検索TOP</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>salon/">エリア別サロン</a>
                            <ul class="subMenu">
                                <li>
                                    <h3>エリア</h3>
                                    <div class="menuSalonLists">
                                        <p class="menuSalonList"><a href="<?php echo esc_url( home_url( '/' ) ); ?>salon/tohoku/">東北エリア</a></p>
                                        <p class="menuSalonList"><a href="<?php echo esc_url( home_url( '/' ) ); ?>salon/kinki/">近畿エリア</a></p>
                                        <p class="menuSalonList"><a href="<?php echo esc_url( home_url( '/' ) ); ?>salon/kanto/">関東エリア</a></p>
                                        <p class="menuSalonList"><a href="<?php echo esc_url( home_url( '/' ) ); ?>salon/shikoku/">四国エリア</a></p>
                                        <p class="menuSalonList"><a href="<?php echo esc_url( home_url( '/' ) ); ?>salon/tokyo/">東京エリア</a></p>
                                        <p class="menuSalonList"><a href="<?php echo esc_url( home_url( '/' ) ); ?>salon/kyushu/">九州エリア</a></p>
                                        <p class="menuSalonList"><a href="<?php echo esc_url( home_url( '/' ) ); ?>salon/chubu/">中部エリア</a></p>
                                        <p class="menuSalonList"><a href="<?php echo esc_url( home_url( '/' ) ); ?>salon/okinawa/">沖縄エリア</a></p>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#">ブランド別サロン</a>
                            <ul class="subMenu">
                                <li>
                                    <h3>ブランド</h3>
                                    <div class="menuSalonLists">
                                        <p class="menuSalonList"><a href="<?php echo esc_url( home_url( '/' ) ); ?>salon/ginza-blv/">GINZA BLV</a></p>
                                        <!-- <p class="menuSalonList"><a href="<?php echo esc_url( home_url( '/' ) ); ?>salon/stylelab/">STYLE LAB</a></p> -->
                                        <p class="menuSalonList"><a href="<?php echo esc_url( home_url( '/' ) ); ?>salon/blv/">GRAND BLV</a></p>
                                        <!-- <p class="menuSalonList"><a href="<?php echo esc_url( home_url( '/' ) ); ?>salon/stylefine/">STYLE FINE</a></p> -->
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>qa/">Q&A</a></li>
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>report/">体験レポート</a></li>
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>column">コラム</a></li>
            </ul>
        </nav>