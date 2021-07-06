<?php 

require_once '../conf/const.php';
require_once MODEL_PATH . 'function.php';

session_start();

// 生成する名前の文字数を取得
$first_name_count = get_post('first_name_count');
// 生成する名前の文字数をCookieに保存する
cookie_set('first_name_count',$first_name_count);

// 生成する名字の文字数を取得
$last_name_count = get_post('last_name_count');
// 生成する名字の文字数をCookieに保存する
cookie_set('last_name_count',$last_name_count);

// 生成する名字の位置の取得
$last_name_posi = get_post('last_name_posi');
// 名字の位置情報をCookieに保存する
cookie_set('last_name_posi',$last_name_posi);

// 生成する名前がひらがなかカタカナか漢字かの取得
$name_type = get_post('name_type');
// 文字種をCookieに保存する
cookie_set('name_type',$name_type);

// どの文字種かを判断
switch($name_type){
    case 'hiragana':
        $str = HIRAGANA;
        break;
    case 'katakana':
        $str = KATAKANA;
        break;
    case 'china_char':
        $str = CHINA_CHAR;
        // 漢字は定義している文字が配列ではないので配列に変換
        $str = str_change_array($str, $length = 1);
        break;
    default:
        $str = HIRAGANA;
        break;
}

// ランダムで文字列を取得する
$r_str = get_random_str($str,$first_name_count);
// 取得した結果をCookieに保存する
cookie_set('random_str',$r_str);


redirect_to(NAME_MAKE_HOME_URL);