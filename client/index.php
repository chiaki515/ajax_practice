<?php
# 接続
try{
    $db = new PDO('mysql:dbname=test_db;host=db','root','root');
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
}

echo 'Ajax Test';
?>
