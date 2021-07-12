<?php 

require_once '../conf/const.php';
require_once MODEL_PATH . 'function.php';

// セッション開始
session_start();

// 履歴表示の有無をクッキーから取得
$display_mode = get_cookie('display');

// 税込み表示の有無をクッキーから取得
$tax_mode = get_cookie('tax');

// 計算履歴の取得
$result_historys = get_cookie('calcu_formula');
// 配列の中身があるかどうかチェック
if(is_array($result_historys) !== false){
// 計算履歴をHTMLエンティティにして取得
$result_historys = entity_str_array($result_historys);
// 計算履歴を新しいものが上に来るように逆順にする
$result_historys = array_reverse($result_historys,true);
}

// 計算結果の答えを取得
$result_data = get_cookie('calcu_result');
// 計算結果をHTMLエンティティにして取得
$result_data = entity_str($result_data);


include_once VIEW_PATH . 'calculator_view.php';