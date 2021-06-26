<!DOCTYPE html>
<html lang="ja">
    <head>
        <?php include VIEW_PATH . 'template/header.php'; ?>
        <link rel="stylesheet" href="<?php print STYLESHEET_PATH . 'calculator.css'; ?>"> 
        <title>連打ゲーム ランキング</title>
    </head>
    <body class="wid-body-ranking margin-center text-center">
        <!-- javascriptを読み込む -->
        <script src="<?php print JAVASCRIPT_PATH . 'javascript.js';?>"></script>
        <div class="text-big-power-few text-gray text-bold margin-top">10秒連打ゲーム</div>
        <div class="text-big text-gray text-bold">～ランキング～</div>
        <div class="margin-top text-normal text-bold"><a href="mash_title.php">タイトルに戻る</a></div>
        <div class="text-gray margin-top-power text-normal text-bold">ランキング！あなたの名前は載ってるかな？</div>

        <table class="table margin-top">
            <thead>
                <tr>
                <th>称号</th>
                <th>順位</th>
                <th class="wid-200">名前</th>
                <th>連打数</th>
                <th>登録日時</th>
                </tr>
            </thead>
            <tbody>
            <?php  
                $rank = 1;
                foreach($rankings as $ranking){ 
                    $number = 0;
                    $mash = $ranking['mash'];?>
                <tr>
                    <th><?php 
                        while($number < MASH_CLASS_MAX){
                                $number = $number + 10;
                            if($mash < $number){
                                print MASH_CLASS[$number]; ?>
                                <th><?php print $rank++ . '位'; ?></th>
                                <td><?php print $ranking['name']; ?></td>
                                <td><?php print $ranking['mash'] .'回'; ?></td>
                                <td><?php print $ranking['createdate']; ?></td>
                      <?php     continue 2; // 条件が当てはまったらwhileループから脱出
                            } 
                        } ?>
                    </th>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </body>
</html>