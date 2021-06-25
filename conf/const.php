<?php

// 連打ゲームに必要なデータベースの初期設定
define('DB_HOST', 'mysql');
define('DB_NAME', 'web_apri');
define('DB_USER', 'metallic');
define('DB_PASS', 'perfectcell2');
define('DB_CHARSET', 'utf8');

define('VIEW_PATH', $_SERVER['DOCUMENT_ROOT'] . '/../view/');
define('MODEL_PATH', $_SERVER['DOCUMENT_ROOT'] . '/../model/');
define('STYLESHEET_PATH', './assets/css/');
define('JAVASCRIPT_PATH', './assets/javascript/');

define('HOME_URL', '/calculator.php');

define('MASH_REGIST', '/mash_regist.php');

define('COOKIE_TIME', 3600 * 24 * 365);
define('TAX', 0.1);

define('FORMULA_REGEX', '/^[\-\+]?(\(?[\-\+]?([0-9]*)\.?([0-9]*)\)?[\-\+\*\/]?\)?\(?[\-\+]?([0-9]*))*$/'); // 正規表現
define('MASH_REGEX', '/^[0-9]+$/');

define('DISPLAY_STATUS', array(
    'close' => 0,
    'open' => 1,
));

define('TAX_STATUS', array(
    'close' => 0,
    'open' => 1,
));