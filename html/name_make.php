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
// Cookieから名前の文字種を取得
$first_name_type = get_cookie('first_name_type');
// Cookieから名字の文字種を取得
$last_name_type = get_cookie('last_name_type');
// 名前の保存情報を取得
$name_save_data = get_cookie('name_save');

// 保存された名前があった場合に処理する
if(is_array($name_data_type) === true){
// 特殊文字をHTMLエンティティに変換
$name_save_data = entity_str_array($name_save_data);
// 新しい名前が上に来るように配列を逆順にする
$name_save_data = array_reverse($name_save_data);
}

// Cookieからランダムで作った文字を取得
$r_str = get_cookie('random_str');
// 特殊文字をHTMLエンティティに変換
$r_str = entity_str($r_str);


include_once VIEW_PATH . 'name_make_view.php';