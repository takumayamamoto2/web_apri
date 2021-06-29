<!DOCTYPE html>
<html lang="ja">
    <head>
        <?php include VIEW_PATH . 'template/header_mash.php'; ?>
        <!-- viewportでスマホ、タブレット向けの設定 -->
        <meta name="viewport" content="width=550 user-scalable=no">
        <link rel="stylesheet" href="<?php print STYLESHEET_PATH . 'web_apri.css'; ?>"> 
        <title>連打ゲーム</title>
    </head>
    <body class="wid-body-mash margin-center text-center">
        <script>
            let mash_class_max=<?php print MASH_CLASS_MAX; ?>;
            var mash_class=<?php print json_encode(MASH_CLASS); ?>;
        </script>
        <!-- javascriptを読み込む -->
        <script type="text/javascript" src="<?php print JAVASCRIPT_PATH . 'js_mash_game.js';?>"></script>
        
        <!-- ナビゲーション -->
        <div id="explanation" class="text-big text-gray margin-top">10秒間連打しよう！</div>
        <!-- カウントするタグ -->
        <div id="count_msg" class="d-flex justify-content-center text-big-power-few margin-top text-bold"></div>
        <!-- ボタンのタグ -->
        <button id="button" type="button" class="btn btn-primary rounded-circle p-0 shadow margin-top-power text-big-power" style="width:18rem;height:18rem;" disabled>ボタン</button>
        <!-- 連打数をカウントする文字 -->
        <form action="mash_regist.php" id="regist" method="post">
            <div id="mash_count" class="d-flex justify-content-center text-big-power-few margin-top-power text-bold"></div>
            <input id="ranking_count" type="hidden" name="mash" value="0">
        </form>

        <!-- 称号のメッセージ -->
        <div id="rank_msg" class="d-flex justify-content-center text-normal-power margin-top-power text-bold"></div>
        
        <!-- ゲーム終了後のボタン(style="display: none;"で最初は非表示設定) -->
        <div id="" class="d-flex justify-content-around margin-top-power">
            <a id="retry_button" style="display: none;" href="mash_game.php"><button type="button" class="btn btn-danger text-bold">もう一回する</button></a>
            <button id="regist_button" style="display: none;" type="submit" form="regist" class="btn btn-success text-bold">結果をランキングに登録</button>
            <a id="title_button" style="display: none;" href="mash_title.php"><button type="button" class="btn btn-secondary text-bold" onclick="return check('タイトル画面へ戻りますか？')">タイトルへ戻る</button></a>
        </div>

    </body>
</html>