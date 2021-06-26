<!DOCTYPE html>
<html lang="ja">
    <head>
        <?php include VIEW_PATH . 'template/header.php'; ?>
        <link rel="stylesheet" href="<?php print STYLESHEET_PATH . 'calculator.css'; ?>"> 
        <title>連打ゲーム</title>
    </head>
    <body class="wid-body margin-center text-center">
        <!-- javascriptを読み込む -->
        <script type="text/javascript" src="<?php print JAVASCRIPT_PATH . 'js_mash_game.js';?>"></script>
        
        <!-- ナビゲーション -->
        <div id="explanation" class="text-big text-gray margin-top">10秒間連打しよう！</div>
        <!-- カウントするタグ -->
        <div id="count_msg" class="d-flex justify-content-center text-big margin-top text-bold"></div>
        <!-- ボタンのタグ -->
        <button id="button" type="button" class="btn btn-primary rounded-circle p-0 shadow margin-top-power text-big-power" style="width:18rem;height:18rem;" disabled>ボタン</button>
        <!-- 連打数をカウントする文字 -->
        <form action="mash_regist.php" id="regist" method="post">
            <div id="mash_count" class="d-flex justify-content-center text-big margin-top-power text-bold"></div>
            <input id="ranking_count" type="hidden" name="mash" value="0">
        </form>

        <div id="" class="d-flex justify-content-center text-big margin-top-power text-bold">あなたの連打数は開発者級です！</div>

        <!-- ゲーム終了後のボタン -->
        <div id="count_msg" class="d-flex justify-content-around margin-top-power">
            <a href="mash_game.php"><button type="button" class="btn btn-danger text-bold">もう一回する</button></a>
            <button type="submit" form="regist" class="btn btn-success text-bold">結果をランキングに登録</button>
            <a href="mash_title.php"><button type="button" class="btn btn-secondary text-bold" onclick="return check('タイトル画面へ戻りますか？')">タイトルへ戻る</button></a>
        </div>

    </body>
</html>