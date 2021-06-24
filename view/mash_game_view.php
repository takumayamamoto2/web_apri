<!DOCTYPE html>
<html lang="ja">
    <head>
        <?php include VIEW_PATH . 'template/header.php'; ?>
        <link rel="stylesheet" href="<?php print STYLESHEET_PATH . 'calculator.css'; ?>"> 
        <title>連打ゲーム</title>
    </head>
    <body class="wid-body margin-center text-center">
        <!-- javascriptを読み込む -->
        <script src="<?php print JAVASCRIPT_PATH . 'js_mash.js';?>"></script>
        
        <!-- ナビゲーション -->
        <div id="explanation" class="text-big text-gray margin-top">10秒間連打しよう！</div>
        <!-- カウントするタグ -->
        <div id="count_msg" class="d-flex justify-content-center text-big margin-top text-bold"></div>
        <!-- ボタンのタグ -->
        <button id="button" type="button" class="btn btn-primary rounded-circle p-0 shadow margin-top-power text-big-power" style="width:18rem;height:18rem;" disabled>ボタン</button>
        <!-- 連打数をカウントする文字 -->
        <div id="mash_count" class="d-flex justify-content-center text-big margin-top-power text-bold"></div>

        <div id="" class="d-flex justify-content-center text-big margin-top-power text-bold">あなたの連打数は開発者級です！</div>

        <!-- ゲーム終了後のボタン -->
        <div id="count_msg" class="d-flex justify-content-around margin-top-power">
            <a href="mash_game.php"><button type="button" class="btn btn-danger text-bold">もう一回する</button></a>
            <a href="mash_regist.php"><button type="button" class="btn btn-success text-bold">結果をランキングに登録</button></a>
            <a href="mash_title.php"><button type="button" class="btn btn-secondary text-bold" onclick="return check('タイトル画面へ戻りますか？')">タイトルへ戻る</button></a>
        </div>

    </body>
</html>