<!DOCTYPE html>
<html lang="ja">
    <head>
        <?php include VIEW_PATH . 'template/header_mash.php'; ?>
        <meta name="viewport" content="width=700">
        <link rel="stylesheet" href="<?php print STYLESHEET_PATH . 'web_apri.css'; ?>"> 
        <title>連打ゲーム ランキング</title>
    </head>
    <body class="wid-body-ranking margin-center text-center">
        <!-- javascriptを読み込む -->
        <script src="<?php print JAVASCRIPT_PATH . 'javascript.js';?>"></script>
        <div class="text-big-power-few text-gray text-bold margin-top">10秒連打ゲーム</div>
        <div class="text-big text-gray text-bold">～ランキング～</div>
        <div class="margin-top text-normal text-bold"><a href="mash_title.php">タイトルに戻る</a></div>
        <div class="text-gray margin-top-power text-normal text-bold">100位まで表示されます！あなたの名前は載ってるかな？</div>

        <table class="table margin-top">
            <thead class="alert-primary">
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
                    <th><?php // 称号が限界以上の時は最大の称号固定表示
                        if($mash > MASH_CLASS_MAX){
                                print MASH_CLASS[MASH_CLASS_MAX]; ?>
                                <th><?php print $rank++ . '位'; ?></th>
                                <td><?php print $ranking['name']; ?></td>
                                <td><?php print $ranking['mash'] .'回'; ?></td>
                                <td><?php print $ranking['createdate']; ?></td>
                      <?php 
                            } ?>

                        <?php 
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