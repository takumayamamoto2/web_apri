<?php 

require_once '../conf/const.php';
require_once MODEL_PATH . 'function.php';

session_start();

// 生成する名前の文字数を取得
$first_name_count = get_post('first_name_count');
// 正しい文字数かどうかを検証する
if(is_vaild_name_count($first_name_count) === true){
    // 生成する名前の文字数をCookieに保存する
    cookie_set('first_name_count',$first_name_count);
} else {
    redirect_to(NAME_MAKE_HOME_URL);
}

// 生成する名字の文字数を取得
$last_name_count = get_post('last_name_count');
// 正しい文字数かどうかを検証する
if(is_vaild_name_count($last_name_count) === true){
    // 生成する名字の文字数をCookieに保存する
    cookie_set('last_name_count',$last_name_count);
} else {
    redirect_to(NAME_MAKE_HOME_URL);
}


// 生成する名字の位置の取得
$last_name_posi = get_post('last_name_posi');
// 名字の位置情報をCookieに保存する
cookie_set('last_name_posi',$last_name_posi);

// 生成する名前がひらがなかカタカナか漢字かの取得
$first_name_type = get_post('first_name_type');
// 文字種をCookieに保存する
cookie_set('first_name_type',$first_name_type);

// 生成する名字がひらがなかカタカナか漢字かの取得
$last_name_type = get_post('last_name_type');
// 文字種をCookieに保存する
cookie_set('last_name_type',$last_name_type);


// 名前がどの文字種かを判断して文字が格納されたデータを返す…漢字は配列に変換して返す
$first_name_type_array = judgment_name_type($first_name_type);

// 名字がどの文字種かを判断して文字が格納されたデータを返す…漢字は配列に変換して返す
$last_name_type_array = judgment_name_type($last_name_type);

// 名字を先に入れるか、後に入れるか無しかの判断して文字列を生成する
$r_str = first_or_last_name($first_name_type_array, $last_name_type_array, $last_name_posi, $first_name_count, $last_name_count);

// 取得した結果をCookieに保存する
cookie_set('random_str',$r_str);

redirect_to(NAME_MAKE_HOME_URL);