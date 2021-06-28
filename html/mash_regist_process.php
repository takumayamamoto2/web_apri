<?php 

require_once '../conf/const.php';
require_once MODEL_PATH . 'function.php';
require_once MODEL_PATH . 'db.php';
require_once MODEL_PATH . 'mash.php';

// セッションを開始
session_start();

// データベースとの接続を確立
$db = getdb_connect();

// ランキングへ登録する名前を取得
$name = get_post('name');
// ランキングへ登録するカウントをセッションから取得
$mash = get_session('mash');


// 名前の前後の空白を除去
$name = str_space_delete($name);

// バリデーションする
if(validate_regist($name, $mash) !== false){
    // データベースに登録する
    add_ranking($db, $name, $mash);
    set_message('ランキングに登録しました！');
    // 登録完了したらセッションのスコアをリセット
    set_session('mash',NULL);
}

redirect_to(MASH_REGIST);