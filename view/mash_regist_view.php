<!DOCTYPE html>
<html lang="ja">
    <head>
        <?php include VIEW_PATH . 'template/header.php'; ?>
        <link rel="stylesheet" href="<?php print STYLESHEET_PATH . 'calculator.css'; ?>"> 
        <title>連打ゲーム ランキング登録</title>
    </head>
    <body class="wid-body margin-center text-center">
        <!-- javascriptを読み込む -->
        <script src="<?php print JAVASCRIPT_PATH . 'js_mash.js';?>"></script>
        
        <!-- ナビゲーション -->
        <div id="" class="text-big margin-top text-bold">連打数をランキング登録！</div>
        
        <form action="" method="post">
        <div class="mb-3 margin-top">
            <div id="explanation" class="text-normal text-gray">名前を入力してください</div>
            <input type="text" class="form-control margin-top" maxlength="20" placeholder="20文字以内であれば入力可能です">
        </div>
        <button type="submit" class="btn btn-primary text-bold text-normal" onclick="return check('この名前で登録してよろしいですか？')">この名前で登録</button>
        </form>

        <!-- ゲーム終了後のボタン -->
        <div id="" class="d-flex justify-content-around margin-top-power">
            <a href="mash_game.php"><button type="button" class="btn btn-danger text-bold">もう一回する</button></a>
            <a href="mash_title.php"><button type="button" class="btn btn-secondary text-bold" onclick="return check('タイトル画面へ戻りますか？')">タイトルへ戻る</button></a>
        </div>

    </body>
</html>