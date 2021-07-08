<?php 

require_once '../conf/const.php';
require_once MODEL_PATH . 'function.php';

// セッションを開始
session_start();

// フォームから保存する名前を受け取る
$name_key = get_post('name_key');
// クリックされたCookieのデータを消す
cookie_delete_one('name_save', $name_key);


redirect_to(NAME_MAKE_HOME_URL);