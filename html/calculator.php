<?php 

require_once '../conf/const.php';
require_once MODEL_PATH . 'function.php';


$calcu_data = get_post('calculation');

var_dump($calcu_data);

$result_data = calculator($calcu_data);
var_dump($result_data);

include_once VIEW_PATH . 'calculator_view.php';