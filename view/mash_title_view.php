<!DOCTYPE html>
<html lang="ja">
    <head>
        <?php include VIEW_PATH . 'template/header_mash.php'; ?>
        <link rel="stylesheet" href="<?php print STYLESHEET_PATH . 'calculator.css'; ?>"> 
        <title>連打ゲームタイトル</title>
    </head>
    <body class="wid-body-mash margin-center text-center">
        <!-- javascriptを読み込む -->
        <script src="<?php print JAVASCRIPT_PATH . 'js_mash.js';?>"></script>
        <div class="text-big-power-few text-gray text-bold margin-top">10秒連打ゲーム</div>
        <div class="text-gray margin-top text-normal">――10秒間の連打数を測る。ただそれだけ。</div>
        <a href="mash_game.php">
            <button type="button" class="btn btn-primary text-big margin-top-power shadow" onclick="return check('ゲームを開始しますか？')">ゲームスタート</button>
        </a>
        <div class="margin-top-power text-normal text-bold"><a href="mash_ranking.php">ランキング</a></div>
    </body>
</html>