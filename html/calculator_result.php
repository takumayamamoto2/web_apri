<?php 

require_once '../conf/const.php';
require_once MODEL_PATH . 'function.php';

// セッション開始
session_start();

// 入力フォーム計算式をゲット
$calcu_data = get_post('calculation');

// 余分な空白を取り除く
$calcu_data = str_change($calcu_data);

//var_dump($calcu_data);
// もしも正規表現以外の計算式の値だったらホームに戻る
if(valid_formula($calcu_data) === false){
    set_error('無効な計算式です');
    redirect_to(HOME_URL);
}

// ゲットした計算式を計算して答えを取得
if(calculator($calcu_data) !== false){
    $result_data = calculator($calcu_data);
    // 税込みモードがオンだったら税込み計算を入れる
    $tax = get_cookie('tax');
    if($tax == TAX_STATUS['open']){
        $result_data = tax_add($result_data);
    }
} else {
    set_error('処理出来ない計算式です');
    redirect_to(HOME_URL);
}

// 取得した答えをcookieに保存
cookie_set('calcu_result', $result_data);

// クッキーの最後尾の配列キーを取得
$cookie_key = get_cookie_key('calcu_formula', -1);

// Cookieに保存する前に計算式を人が理解しやすい全角文字に戻す
$calcu_data = str_change_history($calcu_data);

// クッキーに計算式を保存
cookie_set_array('calcu_formula', $calcu_data, $cookie_key);


redirect_to(HOME_URL);