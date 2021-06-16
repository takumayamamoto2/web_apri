<?php

// postデータのチェックと取得
function get_post($name){
    if(post_check() === true){
        if(isset($_POST[$name]) === true){
            return $_POST[$name];
        }
        return '';
        }
    return '';
}

// postデータのチェック
function post_check(){
    if($_SERVER['REQUEST_METHOD'] !== 'POST'){
        return false;
    }
    return true;
}

// 飛んできたデータを計算する
function calculator($calcu_data){
    if($calcu_data !== ''){
    return eval('return'.'$sum='.$calcu_data.';');
    }
    return '';
}

// クッキーを取得
function get_cookie($name){
    if(isset($_COOKIE[$name]) === true){
    return $_COOKIE[$name];
    }
    return '';
}

// 任意の位置のクッキー配列のキーを持ってくる
function get_cookie_key($name, $number){
    if(get_cookie($name) !== ''){
        $cookie = get_cookie($name);
        $cookie_array = array_slice($cookie, $number, 1, true);
        $cookie_key = key($cookie_array);
        return $cookie_key;
    }
    return false;
}

// クッキーに保存
function cookie_set($name, $data){
    if($name !== ''){
    setcookie($name ,$data, time() +3600);
    }
}

// クッキー配列に保存
function cookie_set_array($name, $data, $cookie_key){
    if($cookie_key !== false){
        $cookie_key++;
        setcookie($name."[". $cookie_key . "]", $data, time() + 3600);
    } else {
        setcookie($name."[". 0 . "]", $data, time() + 3600);
    }
}

// クッキーデータを削除
function cookie_delete($name){
    foreach($name as $key => $value){
    setcookie('calcu_formula'."[". $key . "]", '', time() - 3600);
    }
}

// 履歴表示のステータス
function display_status($display){
    if($display == DISPLAY_STATUS['open']){
        return DISPLAY_STATUS['open'];
    } else if($display == DISPLAY_STATUS['close']){
        return DISPLAY_STATUS['close'];
    }
    // 指定が無ければ非表示
    return DISPLAY_STATUS['close'];
}

// 指定のURLに飛ばす
function redirect_to($url){
    header('Location: '. $url);
    exit;
}