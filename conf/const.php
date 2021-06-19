<?php

define('VIEW_PATH', $_SERVER['DOCUMENT_ROOT'] . '/../view/');
define('MODEL_PATH', $_SERVER['DOCUMENT_ROOT'] . '/../model/');
define('STYLESHEET_PATH', '/assets/css/');

define('HOME_URL', '/calculator.php');

define('COOKIE_TIME', 3600 * 24 * 365);
define('TAX', 0.1);

define('FORMULA_REGEX', '/^[\-\+]?(\(?[\-\+]?([0-9]*)\.?([0-9]*)\)?[\-\+\*\/]?\)?\(?[\-\+]?([0-9]*))*$/'); // 正規表現

define('DISPLAY_STATUS', array(
    'close' => 0,
    'open' => 1,
));

define('TAX_STATUS', array(
    'close' => 0,
    'open' => 1,
));