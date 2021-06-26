<?php

/* 電卓と連打ゲーム共用 */

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
        // eval関数で受け取った値の構文ミスがあると例外エラーで処理が止まってしまうのでキャッチする
        try{
            $data = eval('return'.'$sum='.$calcu_data.';');
            return $data;
        } catch(Throwable $e){
            return false;
        }
    }
    return false;
}

// セッションを取得
function get_session($name){
    if(isset($_SESSION[$name]) === true){
        return $_SESSION[$name];
    }
    return '';
}

// セッションをセット
function set_session($name, $data){
    $_SESSION[$name] = $data;
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
    setcookie($name ,$data, time() + COOKIE_TIME);
    }
}

// クッキー配列に保存
function cookie_set_array($name, $data, $cookie_key){
    if($cookie_key !== false){
        $cookie_key++;
        setcookie($name."[". $cookie_key . "]", $data, time() + COOKIE_TIME);
    } else {
        setcookie($name."[". 0 . "]", $data, time() + COOKIE_TIME);
    }
}

// クッキーデータを削除
function cookie_delete($name){
    foreach($name as $key => $value){
    setcookie('calcu_formula'."[". $key . "]", '', time() - COOKIE_TIME);
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

// 税込み表示のステータス
function tax_status($tax){
    if($tax == TAX_STATUS['open']){
        return TAX_STATUS['open'];
    } else if($tax == TAX_STATUS['close']){
        return TAX_STATUS['close'];
    }
    // 指定が無ければ非表示
    return TAX_STATUS['close'];
}

// 指定のURLに飛ばす
function redirect_to($url){
    header('Location: '. $url);
    exit;
}

// 特殊文字をHTMLエンティティに変換
function entity_str($str){
    return htmlspecialchars($str,ENT_QUOTES,'UTF-8');
}

// 特殊文字をHTMLエンティティに変換(配列)
function entity_str_array($str){
    foreach($str as $key => $value){
        $str[$key] = entity_str($value);
    }
    return $str;
}

// 正規表現で判定を行う
function valid_formula($str){
    if(preg_match(FORMULA_REGEX, $str) === 1 && $str !== ''){ 
        return true;
    }
    return false;
}

// 税込み計算をする
function tax_add($result){
    $tax = $result * TAX;
    $result_tax = $result + $tax;
    return $result_tax;
}

// 引数にエラーメッセージを入れるとセッションにメッセージを保存できる
function set_error($err_msg){
    $_SESSION['errors'][] = $err_msg;
}
  
// セッションに保存されているエラーメッセージの取得
function get_errors(){
    // セッションに保存されているエラーメッセージを取得
    $err_msg = get_session('errors');
    // エラーメッセージが無かったら空の配列を返す
    if($err_msg === ''){
        return array();
    }
    // エラーメッセージを返す
    return $err_msg;
}

// エラーメッセージ消去
function delete_errors(){
    // セッションに空の配列を保存（次回以降のエラーメッセージの初期化）
    set_session('errors',  array());
}

// 引数にエラーメッセージを入れるとセッションにメッセージを保存できる
function set_message($suc_msg){
    $_SESSION['success'][] = $suc_msg;
  }
  
  // セッションに保存されているエラーメッセージの取得
  function get_messages(){
    // セッションに保存されているエラーメッセージを取得
    $suc_msg = get_session('success');
    // エラーメッセージが無かったら空の配列を返す
    if($suc_msg === ''){
      return array();
    }
    // エラーメッセージを返す
    return $suc_msg;
  }
  
  // エラーメッセージ消去
  function delete_messages(){
      // セッションに空の配列を保存（次回以降のエラーメッセージの初期化）
    set_session('success',  array());
  }

// 余分な文字を削除と変換
function str_change($str) {
    // str_replace(変換前,変換後,配列名)で文字を置換する(全角空白を半角空白に置き換え)
    $str = str_replace(' ', '', $str);
    // 二文字連続で演算子が入った場合は一つにする
    $str = preg_replace('/(\++)/', '+', $str);
    $str = preg_replace('/(\-+)/', '-', $str);
    $str = preg_replace('/(×)+/', '×', $str);
    $str = preg_replace('/(÷)+/', '÷', $str);
    $str = preg_replace('/(\(+)/', '(', $str);
    $str = preg_replace('/(\)+)/', ')', $str);
    $str = preg_replace('/(\.+)/', '.', $str);

    // 数字を割る0することは出来ないのでエラーに置換して文字列でエラーを出す
    // ÷0のみを指定してエラー文字に置き換える
    $str = preg_replace('/^.+?÷0+$/', 'error', $str);
    // エラーが出る文字をエラーに置き換え
    $str = preg_replace('/(÷×)/', 'error', $str);
    
    // 全角文字をプログラムで読める半角演算子に置換する
    $str = preg_replace('/(÷)/', '/', $str);
    $str = preg_replace('/(×)/', '*', $str);

    return $str;
}

// プログラムで読める半角演算子を全角文字に置換する(計算履歴表示用)
function str_change_history($str){

    $str = preg_replace('/(\/)/', '÷', $str);
    $str = preg_replace('/(\*)/', '×', $str);

    return $str;
} 

/*  連打ゲーム専用  */

// バリデーションがtrueかfalseかの結果を得る
function validate_regist($name, $mash){
    $valid_name = is_valid_ranking_name($name);
    $valid_mash = is_valid_ranking_mash($mash);

    return $valid_name && $valid_mash;
}

// 名前のバリデーション
function is_valid_ranking_name($name){
    $check = true;
    if($name === ''){
        set_error('名前を入力してください');
        $check = false;
    } else if(mb_strlen($name) > 15){
        set_error('名前は15文字以内で入力してください');
        $check = false;
    }
    return $check;
}

// 連打数のバリデーション
function is_valid_ranking_mash($mash){
    $check = true;
    if($mash === ''){
        set_error('登録するスコアがありません');
        $check = false;
    } else if(preg_match(MASH_REGEX, $mash) === 0){
        set_error('不正な値です');
        $check = false;
    }
    return $check;
}