<?php

require_once MODEL_PATH. 'db.php';

// 名前と連打数をデータベースに登録
function add_ranking($db, $name, $mash){

    $sql="
    INSERT INTO
      mash_game(
      name,
      mash)
    VALUES
      (?,?)
    ";

    return execute_query($db, $sql, array($name, $mash));
}
