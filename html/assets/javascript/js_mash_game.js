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
    // 終了後に表示するメッセージとボタンのid
    let rank_msg = document.getElementById('rank_msg');
    let retry_button = document.getElementById('retry_button');
    let regist_button = document.getElementById('regist_button');
    let title_button = document.getElementById('title_button');
    let ranking_count = document.getElementById('ranking_count');

    // 開始前のカウント
    if(start_count > 0){
        console.log(mash_class[20]);
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
        // HTMLの属性にonclick="mash_count()"を追加 ボタンをクリックできるようにする
        button.setAttribute('onclick','mash_count()');
        // HTMLの属性のdisabled(ボタンの無効)を消す ボタンの無効を解除
        button.removeAttribute('disabled');
        
        // 終了イベント
        if(game_count < 1){
            explanation.innerHTML = '終了です、お疲れさまでした！';
            msg_id.innerHTML = '';
            button.innerHTML = '終了！';
            // ループで10ずつ回し、記録がどの連想配列の値になるのかを取得する
            for(let number = 0; number < mash_class_max; number = number + 10 ){
                // スコアが数値以下だったら称号を決定
                if(ranking_count.value < number){
                    rank_msg.innerHTML = 'あなたの称号は<div class="text-red">「' + mash_class[number] + '」</div>です！';
                    // breakでループから脱出
                    break;
                    //continue; // 条件が当てはまったらwhileループから脱出
                } 
            }

            // ボタンをインラインモードで表示
            retry_button.style.display = 'inline';
            regist_button.style.display = 'inline';
            title_button.style.display = 'inline';
            // HTMLの属性のonclickを消す クリック出来なくする
            button.removeAttribute('onclick');
            // HTMLの属性にdisabled(ボタンの無効)を追加 ボタンをクリックできなくする
            button.setAttribute('disabled','');
            clearInterval(timer);
            return
        }
    }
}

// 連打数カウント
function mash_count(){
    let count = document.getElementById('mash_count');
    let ranking_count = document.getElementById('ranking_count');
    mash++;
    count.innerHTML = '連打数<div class="text-red">' + mash + '</div>回';
    // ランキング登録のためのカウント
    ranking_count.value = mash;
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