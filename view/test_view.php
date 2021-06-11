<!DOCTYPE html>
<html lang="ja">
    <head>
        <?php include VIEW_PATH . 'template/header.php'; ?>
        <script>
        
            function test(){
                $('#add').append('<p>s</p>');
            }
            
            $(function(){
                $('#button').click(test);
            });
        </script>
    </head>
    <body>
        <button id="button" type="button" class="btn btn-primary">ボタン</button>
        <div id="add"></div>
    </body>
</html>