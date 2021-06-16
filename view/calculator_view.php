<!DOCTYPE html>
<html lang="ja">
    <head>
        <?php include VIEW_PATH . 'template/header.php'; ?>
        <link rel="stylesheet" href="<?php print STYLESHEET_PATH . 'calculator.css'; ?>"> 
        <title>電卓</title>
        <script>

            // 文字の入力があったら文字を最後尾に付け足す
            function add_string(string){
                var data = document.getElementById(string).value;
                document.getElementById('text_box').value += data;
            }
            
            // 文字を更新
             function update_string(string){
                document.getElementById('text_box').value = string;
             }

            // テキストボックスを更新
            function history_string(string){
                var data = document.getElementById(string).value;
                document.getElementById('text_box').value = data;
            }

            // 文字の最後尾を一文字カット
            function string_slice(){
                var data = document.getElementById('text_box').value;
                var slice_data = data.slice(0, -1);
                document.getElementById('text_box').value = slice_data;
            }

            // 計算をする
            // function calcu(){
            // let r = document.getElementById('text_box').value
            // let f = new Function('return ' + r)
            // update_string(f().toString())

            // }
            

            $(function(){

            });
        </script>
    </head>
    <body>
        <div class="wid-master margin-center">
            <div class="border-main margin-top padding">
            <h1 class="text-center">WEB電卓</h1>
                <form id="result" method="post" action="calculator_result.php">
                    <!-- テキストボックス -->
                    <input class="text-big margin" size="22" type="text" id="text_box" name="calculation" value="<?php if(isset($result_data)){ print $result_data; } ?>" placeholder="計算式を入力してください">
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
                    
                    <div class="">
                        <!-- 演算子 その他 -->
                        <button onclick="add_string('addition')"       id="addition"       type="button" class="btn btn-secondary text-big wid-50 margin" value="+">+</button>
                        <button onclick="add_string('subtraction')"    id="subtraction"    type="button" class="btn btn-secondary text-big wid-50 margin" value="-">-</button>
                        <button onclick="add_string('multiplication')" id="multiplication" type="button" class="btn btn-secondary text-big wid-50 margin" value="*">×</button>
                        <button onclick="add_string('division')"       id="division"       type="button" class="btn btn-secondary text-big wid-50 margin" value="/">÷</button>
                        <button onclick="add_string('percent')"        id="percent"        type="button" class="btn btn-secondary text-big wid-50 margin" value="%">%</button>
                        <button onclick="add_string('brackets_start')" id="brackets_start" type="button" class="btn btn-secondary text-big wid-50 margin" value="(">(</button>
                        <button onclick="add_string('brackets_end')"   id="brackets_end"   type="button" class="btn btn-secondary text-big wid-50 margin" value=")">)</button>

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
                        <form action="calculator_history_delete.php" method="post">
                            <button type="submit" class="btn btn-warning text-big margin">履歴削除</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <?php if($display_mode == DISPLAY_STATUS['open']){ ?>
                <div class="alert alert-success margin-top" role="alert">
                計算履歴を表示中です。計算式を押すと式が反映されます。
                </div>
                <select class="form-select wid-master text-big" multiple>
                <?php   if(is_array($result_historys) === true){ ?> 
                            <?php $id=100; // 数字ボタンのidと被るので100からスタート
                            foreach($result_historys as $result_history){ ?>
                                <?php $id++; ?>
                                <option onclick="history_string(<?php print $id; ?>)" id="<?php print $id; ?>" value="<?php print $result_history;?>"><?php print $result_history;?></option>
                <?php       }
                        } else { ?>
                            <option>計算履歴はありません</option>
                <?php   } ?>
                </select>
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