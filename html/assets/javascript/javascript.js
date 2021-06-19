
// 文字の入力があったら文字をキャレットの位置に付け足す(指定が無ければ最後尾)
function add_string(string){
    var add_string  = document.getElementById(string).value;
    var textbox = document.getElementById('text_box');

    var boxstr = textbox.value;
    var len    = boxstr.length;
    // selectionStartでテキストボックスのカーソル位置を取得
    var pos    = textbox.selectionStart;

    // 0からカーソル位置までの文字列を取得
    var before = boxstr.substr(0, pos);
    // カーソル位置から総文字数分までを取得
    var after  = boxstr.substr(pos, len);

    boxstr = before + add_string + after;

    textbox.value = boxstr;
    
    // カーソル保持関数に引数を渡す
    carsor_keep(+1, pos, textbox);
}

// 文字を更新
    function update_string(string){
    document.getElementById('text_box').value = string;
}

// キャレットの位置を保持
function carsor_keep(number, pos, textbox){
    textbox.focus();
    pos = pos + number; // 一文字消したか増やした分ずれるので位置を+1か-1しておく
    textbox.setSelectionRange(pos,pos);
}

// キャレットの位置を最後尾に持ってくる
function carsor_last(){
    textbox = document.getElementById('text_box');
    textbox.focus();
}

// テキストボックスを更新
function history_string(string){
    var data = document.getElementById(string).value;
    document.getElementById('text_box').value = data;
    carsor_last();
}

// キャレットの指定位置の文字の左一文字カット
function string_slice(){
    var textbox = document.getElementById('text_box');

    var boxstr = textbox.value;
    var len    = boxstr.length;
    // selectionStartでテキストボックスのカーソル位置を取得
    var pos    = textbox.selectionStart;

    // 0からカーソル位置までの文字列を取得 一文字消すので-1しておく
    var before = boxstr.substr(0, pos-1);
    // カーソル位置から総文字数分までを取得
    var after  = boxstr.substr(pos, len);

    boxstr = before + after;

    textbox.value = boxstr;

    // カーソル保持関数に引数を渡す
    carsor_keep(-1, pos, textbox);
}

// 文字の最後尾を一文字カット
// function string_slice(){
//     var data = document.getElementById('text_box').value;
//     var slice_data = data.slice(0, -1);
//     document.getElementById('text_box').value = slice_data;
// }

// 「はい」かキャンセルのメッセージ
function check(message){
    var check = confirm(message);
    if(check == true) {
        return true;
    } else {
        return false;
    }
}
// 計算をする
// function calcu(){
// let r = document.getElementById('text_box').value
// let f = new Function('return ' + r)
// update_string(f().toString())

// }


$(function(){
//carsor_last()
});