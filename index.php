<?php

// *nix スタイル (大文字の 'S' に注意)
require_once('/home/vagrant/smarty-3.1.30/libs/Smarty.class.php');

$smarty = new Smarty();
$smarty->template_dir = '/home/vagrant/smartyinstall/templates/';
$smarty->compile_dir  = '/home/vagrant/smartyinstall/templates_c/';
$smarty->config_dir   = '/home/vagrant/smartyinstall/configs/';
$smarty->cache_dir    = '/home/vagrant/smartyinstall/cache/';
$smarty->assign('name', 'Ned');



$db_host = 'localhost';
$db_name = 'board_db';
$db_user = 'board_user';
$db_pass = 'board_pass';

//データべースへ接続する
$link = mysqli_connect( $db_host, $db_user, $db_pass, $db_name );
if ($link !== false ) {
  $msg = '';
  $err_msg = '';

  if ( isset( $_POST['send']) === true ) {
    $name = $_POST['name'];
    $comment = $_POST['comment'];

    if ( $name !== '' && $comment !== '' ) {
      $query = "INSERT INTO board ( "
             . "name , "
             . "comment "
             . ") VALUES ( "
             . "'" . mysqli_real_escape_string( $link, $name) ."',"
             . "'" . mysqli_real_escape_string( $link, $comment) ."'"
             . " )";

      $res = mysqli_query( $link, $query);

      if ( $res !== false) {
        $msg = '書き込みに成功しました';
      }else{
        $err_msg = '書き込みに失敗しました';
      }
    }else{
      $err_msg = '名前とコメントを記入してください';
    }
  }

  $query = "SELECT id, name, comment FROM board";
  $res = mysqli_query( $link, $query );
  $data = array();
  while ( $row = mysqli_fetch_assoc( $res ) ) {
      array_push( $data, $row);
  }
  arsort( $data );
}else{
  echo "データベースの接続に失敗しました";
}

//データベースへの接続を閉じる
mysqli_close( $link);

$smarty->assign('msg', $msg);
$smarty->assign('err_msg', $err_msg);
$smarty->assign('data', $data);
$smarty->assign('key', $key);
$smarty->assign('val', $val);
$smarty->display('index.tpl');


?>
