<?php
function SQLQuery($query)
{
  global $db_server;
  global $db_user;
  global $db_password;
  global $db_name;

  global $_Debug;

  $start = utime();

  $db_database = mysql_connect($db_server, $db_user, $db_password) or die('Could not connect: ' . mysql_error());
  mysql_select_db($db_name,$db_database) or die('Could not select database');
  $result = mysql_query($query) or die('Query failed: ' . mysql_error());

  $end = utime();
  $run = $end - $start;
  $_Debug['SQL'][] = 'Query "'.$query.'" run in '.substr($run, 0, 5).' sec';

  return( $result );
}
?>