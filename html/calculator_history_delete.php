<?php 

require_once '../conf/const.php';
require_once MODEL_PATH . 'function.php';

// クッキーの計算式データを持ってくる
$calcu_result = get_cookie('calcu_formula');

// クッキーの計算式データを削除
cookie_delete($calcu_result);


redirect_to(HOME_URL);