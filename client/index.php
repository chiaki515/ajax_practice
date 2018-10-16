<?php
# 接続
try {
    $db = new PDO('mysql:dbname=test;host=db', 'root', 'root');
} catch (PDOException $e) {
    print('Error:'.$e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <form name="fm">
    <label>名前：<input type="text" name="name" size="15"></label>
    <input type="button" id="btnsend" name="submit" value="送信" onclick="asyncSend()">
  </form>
<div id="result"></div>

  <script type="text/javascript">
  $('#btnsend').on('click', function(){
    $('#result').text('通信中...');
    // Ajax通信を開始
    $.ajax({
      url: 'request.php',
      type: 'POST',
      dataType: 'html',
      // フォーム要素の内容をハッシュ形式に変換
      data: $('form').serializeArray(),
      timeout: 5000,
    })
    .done(function(data) {
        // 通信成功時の処理を記述
        $('#result').html(data);
    })
    .fail(function() {
      alert('error');
        // 通信失敗時の処理を記述
    });
  })
  </script>
</body>
</html>
