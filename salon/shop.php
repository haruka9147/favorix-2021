<?php
// 内部文字コードを設定
mb_internal_encoding("UTF-8");

// 正規表現の文字コードを設定
mb_regex_encoding("UTF-8");

require_once("../shop_config.inc");

$area_en = array(
  "hokkaido" => 1,
  "tohoku" => 2,
  "tokyo" => 11,
  "kanto" => 3,
  "chubu" => 4,
  "hokuriku" => 5,
  "kinki" => 6,
  "chugoku" => 7,
  "shikoku" => 8,
  "kyushu" => 9,
  "okinawa" => 10,
);

$brands = array(
  "ginza-blv",
  "blv",
  "stylelab",
  "styleview",
  "stylefine",
);


if(!isset($_GET["shop"]) && isset($area_en[$_GET["area"]])){
  $area_id = $area_en[$_GET["area"]];
  $template = "area";
}elseif(!isset($_GET["shop"]) && in_array($_GET["area"], $brands)){
  $template = "brand";
}elseif(isset($_GET["shop"]) && isset($area_en[$_GET["area"]])){
  $slugs = [];

  foreach($shop as $k => $v){
    if($v["shop_slug"] == $_GET["shop"]){
      $shop_id = $k;
      break;
    }
  }

  if(isset($shop_id) && $shop[$shop_id]["area_id"] == $area_en[$_GET["area"]]){
    $template = "shop";
  }else{
    $template = "404";
  }
}else{
  $template = "404";
}

include("./" . $template . ".inc");
?>