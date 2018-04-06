{* Smarty *}

<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>即席掲示板</title>
</head>
<body>
  <h1>即席掲示板</h1>
  <form method="post" action="">
    名前<input type="text" name="name" value="" />
    コメント<textarea name="comment" rows="4" cols="20"></textarea>
    <input type="submit" name="send" value="書き込む" />
  </form>
  <h2>投稿一覧</h2>
  <!-- ここに、書き込まれたデータを表示する -->

  {if  {$msg} !=  '' }
    <p>{$msg}</p>
  {/if}
  {if {$err_msg} != ''}
  <p style="color:#f00;">{$err_msg}</p>
  {/if}
  {foreach $data as $key => $val }
    {$val['name']}　　{$val['comment']}<br>
  {/foreach}
</body>
</html>
