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
    return eval('return'.'$s='.$calcu_data.';');
    }
    return '';
}