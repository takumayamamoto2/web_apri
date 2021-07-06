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
            <div class="margin-center text-center"><input class="text-big wid-name-text-box margin-top text-center" type="text" name="name_make" value="<?php print $r_str; ?>" placeholder="ここに名前が生成されます"></div>
            <div class="d-flex justify-content-around margin-top-power margin-bottom-power">
                <form method="post" action="name_make_process.php">
                    
                    <button type="submit" class="btn btn-danger text-big shadow" onclick="return check('名前を生成しますか？')">名前を生成する</button>
                    <div class="margin-top-power text-bold">【名前の文字数】</div>
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

                    <div class="text-bold margin-top">【名字】</div>
                    <label class="margin-right"><input type="radio" name="last_name_posi" value="none" <?php if($last_name_posi === "none"){ print "checked";} ?>>無し</label>
                    <label class="margin-right"><input type="radio" name="last_name_posi" value="front" <?php if($last_name_posi === "front"){ print "checked";} ?>>前に含む</label>
                    <label><input type="radio" name="last_name_posi" value="back" <?php if($last_name_posi === "back"){ print "checked";} ?>>後ろに含む</label>

                    <div class="text-bold margin-top">【文字種】</div>
                    <label class="margin-right"><input type="radio" name="name_type" value="hiragana" <?php if($name_type === "hiragana"){ print "checked";} ?>>ひらがな</label>
                    <label class="margin-right"><input type="radio" name="name_type" value="katakana" <?php if($name_type === "katakana"){ print "checked";} ?>>カタカナ</label>
                    <label><input type="radio" name="name_type" value="china_char" <?php if($name_type === "china_char"){ print "checked";} ?>>漢字</label>
                </form>

                <diV>
                    <div>
                        <a href=""><button type="button" class="btn btn-primary text-big shadow" onclick="return check('名前を保存しますか？')">名前を保存する</button></a>
                    </div>

                    <table class="table margin-top-power">
                        <thead class="alert-primary">
                            <tr>
                                <th class="wid-200 text-center">名前</th>
                                <th class="text-center">削除</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">アマテラス</td>
                                <td class="text-center"><a href=""><button type="button" class="btn btn-warning" onclick="return check('この名前を削除しますか？')">削除</button></a></td>
                            </tr>
                        </tbody>
                    </table>
                </diV>
            </div>
        </div>
    </body>
</html>