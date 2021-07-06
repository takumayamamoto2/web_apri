<?php 

require_once '../conf/const.php';
require_once MODEL_PATH . 'function.php';

// セッションを開始
session_start();


/*-- 選択保持のための取得--*/
// Cookieから名前の文字数を取得
$first_name_count = get_cookie('first_name_count');
// Cookieから名字の文字数を取得
$last_name_count = get_cookie('last_name_count');
// Cookieから名字の位置を取得
$last_name_posi = get_cookie('last_name_posi');
// Cookieから文字種を取得
$name_type = get_cookie('name_type');
// Cookieからランダムで作った文字を取得
$r_str = get_cookie('random_str');


include_once VIEW_PATH . 'name_make_view.php';