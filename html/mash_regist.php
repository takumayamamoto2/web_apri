<?php 

require_once '../conf/const.php';
require_once MODEL_PATH . 'function.php';

// セッションを開始
session_start();

// postに入っていればランキングへ登録するカウントを取得 セッションに保存
if(get_post('mash') !== ''){
    $mash = get_post('mash');
    set_session('mash',$mash);
}

$mash = get_session('mash');

include_once VIEW_PATH . 'mash_regist_view.php';