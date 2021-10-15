<?php
function shoplist_sp($in_area = null,$in_pref = null,$in_shop = null,$form_url = null){
  global $shop;
  global $pref;
  global $area;
  global $pref_area;
  global $exclude_shop;

  if(!$form_url){
    $form_url = "https://www.webeauty.jp/reserve2/?";
  }else{
    if(strpos($form_url, "?") !== false){
      $form_url = $form_url . "&";
    }else{
      $form_url = $form_url . "?";
    }
  }

  $shops = array();
  $prefs = array();
  $areas = array();
  $shop_list = "";
  
  foreach($shop as $shop_key => $shop_value){
    $load_shop = false;

    if(isset($in_shop)){
      if(in_array($shop_key,$in_shop,true)){
        $load_shop = true;
      }
    }else{
      $load_shop = true;
    }

    if(isset($exclude_shop) && in_array($shop_key, $exclude_shop)){
      $load_shop = false;
    }

    if($load_shop){
      if(!isset($shops[$shop[$shop_key]["pref_id"]])){
        $shops[$shop[$shop_key]["pref_id"]] = null;
      }

      $shops[$shop[$shop_key]["pref_id"]] .= "          <li id=\"shop" . $shop_key . "\">\n";
      $shops[$shop[$shop_key]["pref_id"]] .= "            <h5>" . $shop[$shop_key]["brand_nm"] . " " . $shop[$shop_key]["shop_nm"] . "</h5>\n";
      $shops[$shop[$shop_key]["pref_id"]] .= "            <div>\n";
      $shops[$shop[$shop_key]["pref_id"]] .= "              <p class=\"address\">" . $pref[$shop[$shop_key]["pref_id"]] . $shop[$shop_key]["shop_address"] . " " . $shop[$shop_key]["shop_building"] . "</p>\n";
      $shops[$shop[$shop_key]["pref_id"]] .= "              <div class=\"flex shop_flex1\">\n";
      $shops[$shop[$shop_key]["pref_id"]] .= "                <div>\n";
      $shops[$shop[$shop_key]["pref_id"]] .= "                  <h6>定休日</h6>\n";
      $shops[$shop[$shop_key]["pref_id"]] .= "                  <p class=\"shop_teikyu\">" . $shop[$shop_key]["shop_teikyu"] . "</p>\n";
      $shops[$shop[$shop_key]["pref_id"]] .= "                </div>\n";
      $shops[$shop[$shop_key]["pref_id"]] .= "                <div>\n";
      $shops[$shop[$shop_key]["pref_id"]] .= "                  <h6>営業時間</h6>\n";
      $shops[$shop[$shop_key]["pref_id"]] .= "                  <p class=\"shop_eigyo\">" . $shop[$shop_key]["shop_eigyo"] . "</p>\n";
      $shops[$shop[$shop_key]["pref_id"]] .= "                </div>\n";
      $shops[$shop[$shop_key]["pref_id"]] .= "              </div>\n";
      $shops[$shop[$shop_key]["pref_id"]] .= "              <div class=\"flex shop_flex2\">\n";
      $shops[$shop[$shop_key]["pref_id"]] .= "                <div>\n";
      $shops[$shop[$shop_key]["pref_id"]] .= "                  <a href=\"" . $shop[$shop_key]["shop_map"] . "\" target=\"_blank\" linkid=\"" . $shop[$shop_key]["brand_nm"] . " " . $shop[$shop_key]["shop_nm"] . " 地図\"><img src=\"./images/map.png\">地図を見る</a>\n";
      $shops[$shop[$shop_key]["pref_id"]] .= "                </div>\n";

      if($shop[$shop_key]["shop_tel"]){
        $shops[$shop[$shop_key]["pref_id"]] .= "                <div>\n";
        $shops[$shop[$shop_key]["pref_id"]] .= "                  <a href=\"tel:" . $shop[$shop_key]["shop_tel"] . "\" class=\"call_shop\" name=\"" . $shop[$shop_key]["brand_nm"] . " " . $shop[$shop_key]["shop_nm"] . "\"><img src=\"./images/tel.png\">電話をかける</a>\n";
        $shops[$shop[$shop_key]["pref_id"]] .= "                </div>\n";
      }
      
      $shops[$shop[$shop_key]["pref_id"]] .= "                <div class=\"sp-display-none\">\n";
      $shops[$shop[$shop_key]["pref_id"]] .= "                  <a class=\"fmlink\" href=\"" . $form_url . "area=" . $shop[$shop_key]["area_id"] . "&amp;shop=" . $shop_key . "\" linkid=\"" . $shop[$shop_key]["brand_nm"] . " " . $shop[$shop_key]["shop_nm"] . " 予約\"><img src=\"./images/mail.png\">メールで予約</a>\n";
      $shops[$shop[$shop_key]["pref_id"]] .= "                </div>\n";
      $shops[$shop[$shop_key]["pref_id"]] .= "              </div>\n";
      $shops[$shop[$shop_key]["pref_id"]] .= "            </div>\n";
      $shops[$shop[$shop_key]["pref_id"]] .= "          </li>\n";
    }
  }

  foreach($shops as $shops_key => $shops_value){
    if(!empty($shops_value)){
      $load_pref = false;

      if(isset($in_pref)){
        if(in_array($shops_key,$in_pref,true)){
          $load_pref = true;
        }
      }else{
        $load_pref = true;
      }

      if($load_pref){
        if(!isset($prefs[$pref_area[$shops_key]])){
          $prefs[$pref_area[$shops_key]] = null;
        }

        $prefs[$pref_area[$shops_key]] .= "      <li id=\"pref" . $shops_key . "\"><h4>" . $pref[$shops_key] . "</h4>\n";
        $prefs[$pref_area[$shops_key]] .= "        <ul class=\"shop\">\n";
        $prefs[$pref_area[$shops_key]] .= $shops[$shops_key];
        $prefs[$pref_area[$shops_key]] .= "        </ul>\n";
        $prefs[$pref_area[$shops_key]] .= "      </li>\n";
      }
    }
  }

  foreach($prefs as $prefs_key => $prefs_value){
    if(!empty($prefs_value)){
      $load_area = false;

      if(isset($in_area)){
        if(in_array($prefs_key,$in_area,true)){
          $load_area = true;
        }
      }else{
        $load_area = true;
      }

      if($load_area){
        if(!isset($areas[$prefs_key])){
          $areas[$prefs_key] = null;
        }

        $areas[$prefs_key] .= "  <li class=\"area" . $prefs_key . "\"><h3>" . $area[$prefs_key] . "</h3>\n";
        $areas[$prefs_key] .= "    <ul class=\"pref\">\n";
        $areas[$prefs_key] .= $prefs[$prefs_key];
        $areas[$prefs_key] .= "    </ul>\n";
        $areas[$prefs_key] .= "  </li>\n";
      }
    }
  }

  foreach($areas as $areas_key => $areas_value){
    $shop_list .= $areas_value;
  }

  echo $shop_list;
}

function formselect_area($in_area = null,$in_pref = null,$in_shop = null){
  global $shop;
  global $pref;
  global $area;
  global $pref_area;

  $shops = array();
  $prefs = array();
  $areas = array();
  $shop_list = "";
  
  foreach($shop as $shop_key => $shop_value){
    $load_shop = false;

    if(isset($in_shop)){
      if(in_array($shop_key,$in_shop,true)){
        $load_shop = true;
      }
    }else{
      $load_shop = true;
    }

    if($load_shop){
      if(!isset($shops[$shop[$shop_key]["pref_id"]])){
        $shops[$shop[$shop_key]["pref_id"]] = null;
      }

      $shops[$shop[$shop_key]["pref_id"]] .= "          <option value=\"" . $shop_value["webeauty_shop_id"] . "\">" . $shop_value["brand_nm"] . $shop_value["shop_nm"] . "(" . $shop_value["shop_address"] . " " . $shop_value["shop_building"] . ")</option>\n";
    }
  }

  foreach($shops as $shops_key => $shops_value){
    if(!empty($shops_value)){
      $load_pref = false;

      if(isset($in_pref)){
        if(in_array($shops_key,$in_pref,true)){
          $load_pref = true;
        }
      }else{
        $load_pref = true;
      }

      if($load_pref){
        if(!isset($prefs[$pref_area[$shops_key]])){
          $prefs[$pref_area[$shops_key]] = null;
        }

        $prefs[$pref_area[$shops_key]] .= "       <optgroup label=\"" . $pref[$shops_key] . "\">\n";
        $prefs[$pref_area[$shops_key]] .= $shops[$shops_key];
        $prefs[$pref_area[$shops_key]] .= "       </optgroup>\n";
      }
    }
  }

  foreach($prefs as $prefs_key => $prefs_value){
    if(!empty($prefs_value)){
      $load_area = false;

      if(isset($in_area)){
        if(in_array($prefs_key,$in_area,true)){
          $load_area = true;
        }
      }else{
        $load_area = true;
      }

      if($load_area){
        if(!isset($areas[$prefs_key])){
          $areas[$prefs_key] = null;
        }

        $areas[$prefs_key] .= $prefs[$prefs_key];
      }
    }
  }

  foreach($areas as $areas_key => $areas_value){
    $shop_list .= $areas_value;
  }

  echo $shop_list;
}

function shoplist_datumou($in_area = null,$in_pref = null,$in_shop = null){
  global $shop;
  global $pref;
  global $area;
  global $pref_area;

  $shops = array();
  $prefs = array();
  $areas = array();
  $shop_list = "";
  
  foreach($shop as $shop_key => $shop_value){
    $load_shop = false;

    if(isset($in_shop)){
      if(in_array($shop_key,$in_shop,true)){
        $load_shop = true;
      }
    }else{
      $load_shop = true;
    }

    if($load_shop){
      if(!isset($shops[$shop[$shop_key]["pref_id"]])){
        $shops[$shop[$shop_key]["pref_id"]] = null;
      }

      $shops[$shop[$shop_key]["pref_id"]] .= "  <div id=\"" . $shop_key . "\">";
      $shops[$shop[$shop_key]["pref_id"]] .= "    <h2>" . $shop_value["brand_nm"] . " " . $shop_value["shop_nm"] . "</h2>";
      $shops[$shop[$shop_key]["pref_id"]] .= "    <p class=\"tel\">" . $shop_value["shop_tel"] . "</p>";
      $shops[$shop[$shop_key]["pref_id"]] .= "    <p class=\"address\">" . $pref[$shop_value["pref_id"]] . $shop_value["shop_address"] . "<br>" . $shop_value["shop_building"] . "</p>";
      $shops[$shop[$shop_key]["pref_id"]] .= "    <a href=\"" . $shop_value["shop_map"] . "\" class=\"map\" target=\"_blank\">map</a>";
      $shops[$shop[$shop_key]["pref_id"]] .= "  </div>";
    }
  }

  foreach($shops as $shops_key => $shops_value){
    if(!empty($shops_value)){
      $load_pref = false;

      if(isset($in_pref)){
        if(in_array($shops_key,$in_pref,true)){
          $load_pref = true;
        }
      }else{
        $load_pref = true;
      }

      if($load_pref){
        if(!isset($prefs[$pref_area[$shops_key]])){
          $prefs[$pref_area[$shops_key]] = null;
        }

        $prefs[$pref_area[$shops_key]] .= $shops[$shops_key];
      }
    }
  }

  foreach($prefs as $prefs_key => $prefs_value){
    if(!empty($prefs_value)){
      $load_area = false;

      if(isset($in_area)){
        if(in_array($prefs_key,$in_area,true)){
          $load_area = true;
        }
      }else{
        $load_area = true;
      }

      if($load_area){
        if(!isset($areas[$prefs_key])){
          $areas[$prefs_key] = null;
        }

        $areas[$prefs_key] .= $prefs[$prefs_key];
      }
    }
  }

  foreach($areas as $areas_key => $areas_value){
    $shop_list .= $areas_value;
  }

  echo $shop_list;
}

?>