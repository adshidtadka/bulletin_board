{* Smarty *}


<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
  <h1>簡易掲示板</h1>
  <form method="post" action="">
    名前<input type="text" name="name" value="" />
    コメント<textarea name="comment" rows="4" cols="20"></textarea>
    <input type="submit" name="send" value="書き込む" />
  </form>
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
