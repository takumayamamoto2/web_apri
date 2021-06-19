<?php 

require_once '../conf/const.php';
require_once MODEL_PATH . 'function.php';

// 履歴表示の有無を取得
$tax = get_post('tax');

// 表示か非表示どちらかのステータスを返す(その2つ以外の値が来たら非表示をセット)
$tax_status = tax_status($tax);

// クッキーに履歴表示の有無データを保存
cookie_set('tax', $tax_status);

redirect_to(HOME_URL);