<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Simple BBS</title>
  </head>
  <body>

<h1>Simple BBS</h1>

<?php
  if( isset($_SESSION['login']) && strlen($_SESSION['login'])>0 )
    print "{$_SESSION['name']} としてログイン中です。";
  print "<a href='login.php'>LOGIN</a>";
?>

<hr />

<?php
  include_once('database.php');

  $result = $db->query("select mid, uid, body, parent, timestamp, name from messages left join users using (uid) order by mid asc");
  while ( $mes = $result->fetch_assoc()) {
    $reslink = "res.php?res={$mes['mid']}";
    print("<a href='$reslink'>{$mes['mid']}</a> ");

    print( $mes['name'] . " : ");
    if( $mes['parent'] != 0 )
      print ">" . $mes['parent'] . " ";
    print( $mes['body'] . $mes['timestamp']);

    print( "<a href='eval.php?mid={$mes['mid']}'>評価</a>");

    print ("<br />");
  }
  $result->close();
 ?>

  <form action='res.php' method='GET'>
    <input type=hidden name=res value='0'>
    <input type=submit value='新規書き込み'>
  </form>


  </body>
  
  #書いてある意味が恐ろしいほど理解できない！
  #何から手を付けるべきやら…。って事で、newuser.phpからいじる事にしよう！
  #と思ったけどやってみたらエラーが凄いことになっただけだった。うーん。
  
</html>
