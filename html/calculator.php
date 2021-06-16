<?php 

require_once '../conf/const.php';
require_once MODEL_PATH . 'function.php';

// 履歴表示の有無をクッキーから取得
$display_mode = get_cookie('display');

// 計算履歴の取得
$result_historys = get_cookie('calcu_formula');

// 計算結果の答えを取得
$result_data = get_cookie('calcu_result');

include_once VIEW_PATH . 'calculator_view.php';