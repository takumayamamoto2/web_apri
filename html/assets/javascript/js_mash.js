let start_count = 4; // スタートカウント
let game_count = 11; // ゲームカウント
let mash = 0; // 連打数初期値


function count_msg(){
    // メッセージタグのid
    let msg_id = document.getElementById('count_msg');
    // ボタンタグのid
    let button = document.getElementById('button');
    // 説明タグのid
    let explanation = document.getElementById('explanation');

    // 開始前のカウント
    if(start_count > 0){
        start_count--;
        msg_id.innerHTML = '後<div class="text-red">' + start_count + '</div>秒で始まります';
        let count = document.getElementById('mash_count');
        count.innerHTML = '連打数<div class="text-red">' + mash + '</div>回';
    }

    // ゲーム中カウント
    if(start_count === 0){
        msg_id.innerHTML = '<div class="text-red">スタート！</div>';
        game_count--;
        button.innerHTML = '後' + game_count + '秒';
        // HTMLの属性にonclick="mash_count()"を追加
        button.setAttribute('onclick','mash_count()');
        // HTMLの属性にonclick="mash_count()"を追加
        button.removeAttribute('disabled');
        
        // 終了イベント
        if(game_count < 1){
            explanation.innerHTML = '終了です、お疲れさまでした！';
            msg_id.innerHTML = '';
            button.innerHTML = '終了！';
            button.removeAttribute('onclick');
            button.setAttribute('disabled','');
            clearInterval(timer);
            return
        }
    }
}

// 連打数カウント
function mash_count(){
    let count = document.getElementById('mash_count');
    mash++
    count.innerHTML = '連打数<div class="text-red">' + mash + '</div>回';
}

// はいかいいえのチェック
function check(message){
    let check = confirm(message);
    if(check == true){
        return true;
    } else {
        return false;
    }
}

// タイマー
$(function() {
    timer = setInterval('count_msg()', 1000);
});