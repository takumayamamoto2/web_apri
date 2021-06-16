<?php 

require_once '../conf/const.php';
require_once MODEL_PATH . 'function.php';

// 入力フォーム計算式をゲット
$calcu_data = get_post('calculation');

// ゲットした計算式を計算して答えを取得
$result_data = calculator($calcu_data);

// 取得した答えをcookieに保存
setcookie('calcu_result',$result_data,time() +3600);

// クッキーの最後尾の配列キーを取得
$cookie_key = get_cookie_key('calcu_formula', -1);

// クッキーに計算式を保存
cookie_set_array('calcu_formula', $calcu_data, $cookie_key);

redirect_to(HOME_URL);