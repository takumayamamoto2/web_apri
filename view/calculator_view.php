<!DOCTYPE html>
<html lang="ja">
    <head>
        <?php include VIEW_PATH . 'template/header.php'; ?>
        <link rel="stylesheet" href="<?php print STYLESHEET_PATH . 'calculator.css'; ?>"> 
        <title>電卓</title>

    </head>
    <body class="wid-body margin-center">
        <!-- javascriptを読み込む -->
        <script src="<?php print JAVASCRIPT_PATH . 'javascript.js';?>"></script>
        <div class="wid-master margin-center">
            <div class="border-main margin-top padding">
            <h1 class="text-center">WEB電卓</h1>
                <!-- 税込みボタンのメッセージ -->
                <?php if($tax_mode == TAX_STATUS['open']){ ?>
                    <div class="alert alert-info margin-top" role="alert">
                    税込みで計算中です。答えを税込みで出します。<br>※2021年6月現在の10%
                    </div>
                <?php } else {}?>

                <?php if(is_array(get_errors()) === true){ ?>
                    <?php foreach(get_errors() as $message){ ?>
                        <div class="alert alert-danger margin-top" role="alert">
                        <?php print $message; ?>
                        </div>
                    <?php } delete_errors();?>
                <?php } else {}?>

                <form id="result" method="post" action="calculator_result.php">
                    <!-- テキストボックス -->
                    <input inputmode="none" class="text-big margin wid-textbox" type="text" id="text_box" name="calculation" value="<?php if(isset($result_data)){ print $result_data; } ?>" placeholder="計算式を入力してください">
                </form>

                <div class="flex">

                    <div class="flex flex-reverse wid-200 text-center">
                        <!-- 数字0 -->
                        <button onclick="add_string('zero')" id="zero" type="button" class="btn btn-light text-big margin wid-50" value="0">0</button>
                        
                        <!-- ドット -->
                        <button onclick="add_string('dot')"  id="dot" type="button" class="btn btn-light text-big margin wid-50" value=".">.</button>

                        <!-- 送信ボタン(=) -->
                        <button onclick="calcu()" form="result" type="submit" class="btn btn-primary text-big margin wid-50">=</button>
                
                        <!-- 数字ボタン -->
                        <?php for($i = 1; $i < 10; $i++){ ?>
                        <button onclick="add_string('<?php print $i; ?>')" id="<?php print $i; ?>" 
                        type="button" class="btn btn-light text-big margin wid-50" value="<?php print $i ?>"><?php print $i ?></button>
                        <?php } ?>
                    </div>
                        
                        <!-- 税込みボタンのフォーム -->
                        <form id="tax" action="calculator_tax.php" method="post"></form>
                    
                    <div>
                        <!-- 演算子 その他 -->
                        <button onclick="add_string('addition')"       id="addition"       type="button" class="btn btn-secondary text-big wid-50 margin" value="+">+</button>
                        <button onclick="add_string('subtraction')"    id="subtraction"    type="button" class="btn btn-secondary text-big wid-50 margin" value="-">-</button>
                        <button onclick="add_string('multiplication')" id="multiplication" type="button" class="btn btn-secondary text-big wid-50 margin" value="×">×</button>
                        <button onclick="add_string('division')"       id="division"       type="button" class="btn btn-secondary text-big wid-50 margin" value="÷">÷</button>
                        <button onclick="add_string('brackets_start')" id="brackets_start" type="button" class="btn btn-secondary text-big wid-50 margin" value="(">(</button>
                        <button onclick="add_string('brackets_end')"   id="brackets_end"   type="button" class="btn btn-secondary text-big wid-50 margin" value=")">)</button>
                        
                        <!-- 税込みボタン -->
                        <?php if($tax_mode == TAX_STATUS['close']){ ?>
                        <button form="tax" type="submit" class="btn btn-info text-big margin" name="tax" value="<?php print TAX_STATUS['open']; ?>">税込み</button>
                        <?php } else if($tax_mode == TAX_STATUS['open']){ ?>
                        <button form="tax" type="submit" class="btn btn-secondary text-big margin" name="tax" value="<?php print TAX_STATUS['close']; ?>">税無し</button>
                        <?php } ?>
                        
                        <!-- 全消去ボタン -->
                        <button onclick="update_string('')" id="delete" type="button" class="btn btn-danger text-big margin">全消去</button>
                        
                        <!-- 一文字消去ボタン -->
                        <button onclick="string_slice()" type="button" class="btn btn-dark text-big margin">◀</button>

                        <!-- 計算履歴ボタン -->
                        <form action="calculator_history.php" method="post">
                            <?php if($display_mode == DISPLAY_STATUS['close']){ ?>
                            <button type="submit" class="btn btn-success text-big margin" name="display" value="<?php print DISPLAY_STATUS['open']; ?>">履歴を表示</button>
                            <?php } else if($display_mode == DISPLAY_STATUS['open']){ ?>
                            <button type="submit" class="btn btn-secondary text-big margin" name="display" value="<?php print DISPLAY_STATUS['close']; ?>">履歴を非表示</button>
                            <?php } ?>
                        </form>

                        <!-- 計算履歴削除ボタン -->
                <?php   if(is_array($result_historys) === true){ ?> 
                            <form action="calculator_history_delete.php" method="post">
                                <button type="submit" class="btn btn-warning text-big margin" onclick="return check('本当に計算履歴を削除しますか？')">履歴削除</button>
                            </form>
                <?php   } else { ?>
                            <button type="button" class="btn btn-warning text-big margin">履歴削除</button>
                <?php   } ?>
                    </div>
                </div>
            </div>
            
            <?php if($display_mode == DISPLAY_STATUS['open']){ ?>
                <div class="alert alert-success margin-top" role="alert">
                計算履歴を表示中です。計算式を押すと式が反映されます。
                </div>
                <div class="list-group text-big">
                <?php   if(is_array($result_historys) === true){ ?>
                    <?php $id=100; // 数字ボタンのidと被るので100からスタート
                            foreach($result_historys as $result_history){ ?>
                                <?php $id++; ?>
                                <button onclick="history_string(<?php print $id; ?>)" id="<?php print $id; ?>" value="<?php print $result_history;?>" type="button" class="list-group-item list-group-item-action"><?php print $result_history;?></button>
                <?php       }
                        } else { ?>
                            <option>計算履歴はありません</option>
                <?php   } ?>
                </div>
            <?php } else if($display_mode == DISPLAY_STATUS['close']){ ?>
                <div class="alert alert-secondary margin-top" role="alert">
                計算履歴は表示していません。
                </div>
            <?php } ?>    
        </div>
 
        <!--
        <button id="button100" type="button" class="btn btn-primary">ボタン</button>
        <button id="zero"  type="button" class="btn btn-light" value="0">0</button>
        <button id="two"   type="button" class="btn btn-light" value="2">2</button>
        <button id="three" type="button" class="btn btn-light" value="3">3</button>
        <button id="four"  type="button" class="btn btn-light" value="4">4</button>
        <button id="five"  type="button" class="btn btn-light" value="5">5</button>
        <button id="six"   type="button" class="btn btn-light" value="6">6</button>
        <button id="seven" type="button" class="btn btn-light" value="7">7</button>
        <button id="eight" type="button" class="btn btn-light" value="8">8</button>
        <button id="nine"  type="button" class="btn btn-light" value="9">9</button> -->

    </body>
</html>