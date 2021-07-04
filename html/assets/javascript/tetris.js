
// フィールドサイズ
const FIELD_COL = 10;
const FIELD_ROW = 20;


// 1ブロックサイズ
const BLOCK_SIZE = 30;

// キャンバスサイズ
// 1ブロックのサイズとフィールドの1マスをかけてフィールドサイズを作る
const SCREEN_W = BLOCK_SIZE * FIELD_COL;
const SCREEN_H = BLOCK_SIZE * FIELD_ROW;

// テトロミノのサイズ
const TETRO_SIZE = 4;

// キャンバスのid取得
let can = document.getElementById("can");
// モードの取得
let con = can.getContext("2d");

// widthやheightはキャンバスに予め備わっているもの
can.width = SCREEN_W;
can.height = SCREEN_H;
can.style.border = "4px solid #555";

// テトロミノの本体
let tetro = [
    [ 0, 0, 0, 0 ],
    [ 1, 1, 0, 0 ],
    [ 0, 1, 1, 0 ],
    [ 0, 0, 0, 0 ],
];
// テトロミノの座標
let tetro_x = 0;
let tetro_y = 0;

drawTetro();

// テトロミノを表示する
function drawTetro()
{   
    // 描画をリセットする
    con.clearRect(0,0,SCREEN_W,SCREEN_H);

    for(let y=0; y<TETRO_SIZE; y++)
    {
        for(let x=0; x<TETRO_SIZE; x++)
        {
            if( tetro[y][x] )
            {
                let px = (tetro_x + x) * BLOCK_SIZE;
                let py = (tetro_y + y) * BLOCK_SIZE;

                con.fillStyle="red";
                // ブロックの座標、幅、高さ
                con.fillRect(px,py,BLOCK_SIZE,BLOCK_SIZE);
                // ブロックの線
                con.strokeStyle="black";
                con.strokeRect(px, py, BLOCK_SIZE,BLOCK_SIZE);

            }
        }
    }
}

// キーが押された時のイベント情報を取得
document.onkeydown = function(e)
{
    // onkeydown keycode 検索 押されたボタンの番号を取得
    switch( e.keyCode )
    {
        case 37:// 左
            tetro_x--;
            break;
        case 38:// 上
            tetro_y--;
            break;
        case 39:// 右
            tetro_x++;
            break;
        case 40:// 下
            tetro_y++;
            break;
        case 32:// スペース
            break;
    }

    drawTetro();
}