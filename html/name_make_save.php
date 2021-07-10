<?php 

require_once '../conf/const.php';
require_once MODEL_PATH . 'function.php';

// セッションを開始
session_start();

// フォームから保存する名前を受け取る
$name_save = get_post('name_save');
// クッキーの最後尾の配列キーを取得
$cookie_key = get_cookie_key('name_save', -1);
// クッキーに名前を保存
cookie_set_array('name_save', $name_save, $cookie_key);


redirect_to(NAME_MAKE_HOME_URL);