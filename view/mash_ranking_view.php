<!DOCTYPE html>
<html lang="ja">
    <head>
        <?php include VIEW_PATH . 'template/header.php'; ?>
        <link rel="stylesheet" href="<?php print STYLESHEET_PATH . 'calculator.css'; ?>"> 
        <title>連打ゲーム ランキング</title>
    </head>
    <body class="wid-body margin-center text-center">
        <!-- javascriptを読み込む -->
        <script src="<?php print JAVASCRIPT_PATH . 'javascript.js';?>"></script>
        <div class="text-big-power-few text-gray text-bold margin-top">10秒連打ゲーム</div>
        <div class="text-big text-gray text-bold">～ランキング～</div>
        <div class="margin-top text-normal text-bold"><a href="mash_title.php">タイトルに戻る</a></div>
        <div class="text-gray margin-top-power text-normal text-bold">ランキング！あなたの名前は載ってるかな？</div>

        <table class="table margin-top">
            <thead>
                <tr>
                <th scope="col">順位</th>
                <th scope="col">名前</th>
                <th scope="col">連打数</th>
                <th scope="col">日付</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1位</th>
                    <td>てすと</td>
                    <td>20回</td>
                    <td>2021/6/20</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>あああああああああああ</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </body>
</html>