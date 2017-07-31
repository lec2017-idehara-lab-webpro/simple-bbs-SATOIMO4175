<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>New User</title>
  </head>
  <body>

<!--ここはいじらないでおこう。ダブリ防止は必要だからね。-->
<?php
  include_once('database.php');
  if( isset($_POST['uid']) && strlen($_POST['uid'])>0 )
  {
    $q = $db->prepare("insert into users (uid, name, password) values (?, ?, ?)");
    $q->bind_param("sss", $_POST['uid'], $_POST['name'], $_POST['pass']);
    $q->execute();
    if( $q->errno != 0 )
      print("登録失敗。ID が既に取得されています");
    else
    {    
      print("登録しました");
      $_SESSION['login'] = $_POST['uid'];
      $_SESSION['name'] = $_POST['name'];
    }
  }
  else
  
  {
    print "
    <form action='' method='POST'>
    uid : <input type=text name=uid>
    name : <input type=text name=name>
    password : <input type=password name=pass>
    <input type='submit'>
    </form>
    ";
  }
 ?>

<?php

 include_once('database.php');
 #if( isset($_POST['uid']) && if(strpos($_POST['uid'],'tama.ac.jp') === false){a}
 if(!preg_match('tama.ac.jp',$_POST['uid'])){
  print("登録失敗。無効なメールアドレスです");
  }
  #tama.ac.jpが無いと出来ないようにしようとした。しかし、発動しない。
  #原因は読んでも全く解決方法が浮かばない！
  #英文字が使えないと書いてある気がするけど？じゃあどうすればいいの？
  
  #else
   #このelseを有効にするとページの表示すら出来ない。
   {    
      print("登録しました");
      $_SESSION['login'] = $_POST['uid'];
      $_SESSION['name'] = $_POST['name'];
    }


?>
<!--
どんなにやってもエラーしか吐かない。
いったい何がどうしてどうやったらどうなるのだろう？
調べるにも何を調べれば？出てきたものを付け加えてもエラーしか吐かない。
いくらいじっても何もわからなかった。-->

  </body>
</html>
