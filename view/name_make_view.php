<!DOCTYPE html>
<html lang="ja">
    <head>
        <?php include VIEW_PATH . 'template/header_name_make.php'; ?>
        <link rel="stylesheet" href="<?php print STYLESHEET_PATH . 'web_apri.css'; ?>"> 
        <title>キャラネームメーカー</title>
    </head>
    <body class="wid-body-name-make margin-center">
        <header class="margin-center text-center">
            <!-- javascriptを読み込む -->
            <script src="<?php print JAVASCRIPT_PATH . 'js_mash.js';?>"></script>
            <div class="text-big-power-few text-gray text-bold margin-top">キャラネームメーカー</div>
            <div class="text-gray margin-top text-normal">小説や漫画でキャラクターの名前が思い付かない…。</div>
            <div class="text-gray text-normal">そんなお悩みを瞬時に解決するページ――。</div>
        </header>
        <div class="wid-name-make margin-center margin-top border-main">
            <form id="name_save" method="post" action="name_make_save.php">
                <div class="margin-center text-center"><input class="text-normal-power wid-name-text-box margin-top text-center" type="text" name="name_save" value="<?php print $r_str; ?>" placeholder="ここに名前が生成されます"></div>
            </form>
            <div class="d-flex justify-content-around margin-top-power margin-bottom-power">
                <form method="post" action="name_make_process.php">
                    
                    <button type="submit" class="btn btn-danger text-big shadow" onclick="return check('名前を生成しますか？')">名前を生成する</button>
                    <h4 class="margin-top-power text-bold">【名前の文字数】</h4>
                    名前：
                    <select class="margin-right" name="first_name_count">
                        <?php $i=0; while($i < 10){ $i++; ?>
                            <option value="<?php print $i; ?>" <?php if($first_name_count == $i){ print "selected"; } ?>><?php print $i; ?></option>
                        <?php } ?>
                    </select>

                    名字：
                    <select name="last_name_count">
                        <?php $i=0; while($i < 10){ $i++; ?>
                            <option value="<?php print $i; ?>" <?php if($last_name_count == $i){ print "selected"; } ?>><?php print $i; ?></option>
                        <?php } ?>
                    </select>

                    <h4 class="text-bold margin-top">【名字】</h4>
                    <label class="margin-right"><input type="radio" name="last_name_posi" value="none" <?php if($last_name_posi === "none"){ print "checked";} else if($last_name_posi === ''){ print "checked";} ?>>無し</label>
                    <label class="margin-right"><input type="radio" name="last_name_posi" value="front" <?php if($last_name_posi === "front"){ print "checked";} ?>>前に含む</label>
                    <label><input type="radio" name="last_name_posi" value="back" <?php if($last_name_posi === "back"){ print "checked";} ?>>後ろに含む</label>

                    <h4 class="text-bold margin-top">【文字種】</h4>
                    <div class="border-line-bottom flex">
                        <div class="text-bold">名前：</div>
                        <label class="margin-right"><input type="radio" name="first_name_type" value="hiragana" <?php if($first_name_type === "hiragana"){ print "checked";} else if($first_name_type === ''){ print "checked";} ?>>ひらがな</label>
                        <label class="margin-right"><input type="radio" name="first_name_type" value="katakana" <?php if($first_name_type === "katakana"){ print "checked";} ?>>カタカナ</label>
                        <label><input type="radio" name="first_name_type" value="china_char" <?php if($first_name_type === "china_char"){ print "checked";} ?>>漢字</label>
                    </div>

                    <div class="margin-top flex">
                        <div class="text-bold">名字：</div>
                        <label class="margin-right"><input type="radio" name="last_name_type" value="hiragana" <?php if($last_name_type === "hiragana"){ print "checked";} else if($last_name_type === ''){ print "checked";} ?>>ひらがな</label>
                        <label class="margin-right"><input type="radio" name="last_name_type" value="katakana" <?php if($last_name_type === "katakana"){ print "checked";} ?>>カタカナ</label>
                        <label><input type="radio" name="last_name_type" value="china_char" <?php if($last_name_type === "china_char"){ print "checked";} ?>>漢字</label>
                    </div>
                </form>

                <diV>
                    <button form="name_save" type="submit" class="btn btn-primary text-big shadow" onclick="return check('名前を保存しますか？')">名前を保存する</button>

                    <table class="table margin-top-power">
                        <thead class="alert-primary">
                            <tr>
                                <th class="wid-200 text-center">名前</th>
                                <th class="text-center">削除</th>
                            </tr>
                        </thead>
                        <tbody>                
                        <?php if(is_array($name_save_data) === true){ ?>
                            <?php foreach($name_save_data as $key =>$value){ ?>
                            <tr>
                                <th class="text-center wid-200">
                                    <?php print $value; ?>
                                </th>
                                <th class="text-center">
                                <form action="name_make_delete.php" method="post">
                                    <button type="submit" class="btn btn-warning" onclick="return check('この名前を削除しますか？')">削除</button>
                                    <input type="hidden" name="name_key" value="<?php print $key; ?>">
                                </form>
                                </th>
                            </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <th class="text-red">
                                    <?php print '保存された名前はありません';?>
                                </th>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </diV>
            </div>
        </div>
    </body>
</html>