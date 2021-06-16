<?php 

require_once '../conf/const.php';
require_once MODEL_PATH . 'function.php';

// 履歴表示の有無を取得
$display = get_post('display');

// 表示か非表示どちらかのステータスを返す(その2つ以外の値が来たら非表示をセット)
$display_status = display_status($display);

// クッキーに履歴表示の有無データを保存
cookie_set('display', $display_status);

redirect_to(HOME_URL);