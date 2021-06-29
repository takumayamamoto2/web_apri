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

define('MASH_CLASS', array(
    10 => 'のっそり',
    20 => 'ゆっくり',
    30 => 'まったり',
    40 => '初心者',
    50 => 'まあまあ',
    60 => '頑張った！',
    70 => '中級者',
    80 => '強者',
    90 => '実力者',
    100 => '熟練者',
    110 => '開発者級',
    120 => '手が痛い',
    130 => '上級者',
    140 => 'プロ級',
    150 => '連打マシン',
    160 => '負けなし',
    170 => '高橋名人',
    180 => '高橋名人本気',
    190 => '超人',
    200 => '超超人',
    210 => '完璧超人',
    220 => '救世主',
    230 => '勇者',
    240 => '人類超え',
    250 => '超能力者',
    260 => '特殊能力者',
    270 => '異界の人',
    280 => '天界人',
    290 => '現人神',
    300 => '神',
));

define('MASH_CLASS_MAX', 300);

