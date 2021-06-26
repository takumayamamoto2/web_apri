<?php 

require_once '../conf/const.php';
require_once MODEL_PATH . 'function.php';
require_once MODEL_PATH . 'mash.php';


// データベースとの接続を確立
$db = getdb_connect();


// ランキング情報を取得
$rankings = get_ranking($db);

include_once VIEW_PATH . 'mash_ranking_view.php';