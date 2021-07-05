<!DOCTYPE html>
<html lang="ja">
    <head>
        <?php include VIEW_PATH . 'template/header_name_make.php'; ?>
        <link rel="stylesheet" href="<?php print STYLESHEET_PATH . 'web_apri.css'; ?>"> 
        <title>キャラクター名生成機</title>
    </head>
    <body class="wid-body-name-make margin-center">
        <header class="margin-center text-center">
            <!-- javascriptを読み込む -->
            <script src="<?php print JAVASCRIPT_PATH . 'js_mash.js';?>"></script>
            <div class="text-big-power-few text-gray text-bold margin-top">キャラクター名生成機</div>
            <div class="text-gray margin-top text-normal">小説や漫画でキャラクターの名前が思い付かない…。</div>
            <div class="text-gray text-normal">そんなお悩みを瞬時に解決するページ――。</div>
        </header>
        <div class="wid-name-make margin-center margin-top border-main">
            <div class="margin-center text-center"><input class="text-big wid-name-text-box margin-top text-center" type="text" name="" value="" placeholder="ここに名前が生成されます"></div>
            <div class="d-flex justify-content-around margin-top-power margin-bottom-power">
                <form class="">
                    <div>
                        <a href=""><button type="button" class="btn btn-danger text-big shadow" onclick="return check('名前を生成しますか？')">名前を生成する</button></a>
                    </div>
                    <div class="margin-top-power text-bold">【名前の文字数】</div>
                    名前：
                    <select class="margin-right">
                        <?php $i=0; while($i < 10){ $i++; ?>
                            <option name="first_name_count" value="<?php print $i; ?>"><?php print $i; ?></option>
                        <?php } ?>
                    </select>

                    名字：
                    <select>
                        <?php $i=0; while($i < 10){ $i++; ?>
                            <option name="last_name_count" value="<?php print $i; ?>"><?php print $i; ?></option>
                        <?php } ?>
                    </select>

                    <div class="text-bold margin-top">【名字】</div>
                    <label class="margin-right"><input type="radio" name="last_name" value="">無し</label>
                    <label class="margin-right"><input type="radio" name="last_name" value="">前に含む</label>
                    <label><input type="radio" name="last_name" value="">後ろに含む</label>

                    <div class="text-bold margin-top">【文字種】</div>
                    <label class="margin-right"><input type="radio" name="name_type" value="">ひらがな</label>
                    <label class="margin-right"><input type="radio" name="name_type" value="">カタカナ</label>
                    <label><input type="radio" name="name_type" value="">漢字</label>
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