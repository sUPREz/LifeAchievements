<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<?php
require('config.php');

$start = utime();

if( isset($_GET['Area']) )
{
  switch($_GET['Area'])
  {
    default:
      echo 'Choose a page in the menu';
      break;
  }
}

//GET ALL ACHIEVEMENTS FROM DB
$_AchievementsTree = array();

$Result = SQLQuery("select * from la_achievements WHERE MasterID is null OR `MasterID`=0 ORDER BY `Order` ASC, `AddDate` ASC");
while ($row = mysql_fetch_array($Result)) {
  //$print_r($row);
  //__construct($ID,$Title,$Desc,$EndDesc,$AddDate,$EndDate,$MasterID)
  $Achievement = new Achievement();
  $Achievement->SetAchievements($row['ID'],$row['Title'],$row['Desc'],$row['EndDesc'],$row['AddDate'],$row['EndDate'],$row['MasterID'],$row['AchieveScore'],$row['AchieveComplete'],$row['Order']);

  $index = Count($_AchievementsTree);
  $_AchievementsTree[ $index ] = new Achievement();
  $_AchievementsTree[ $index ]->SetAchievements($Achievement);

  $Result2 = SQLQuery('select * from la_achievements WHERE MasterID = "'.$row['ID'].'" ORDER BY `Order` ASC, `AddDate` ASC');
  while ($row2 = mysql_fetch_array($Result2)) {
    $Achievement2 = new Achievement();
    $Achievement2->SetAchievements($row2['ID'],$row2['Title'],$row2['Desc'],$row2['EndDesc'],$row2['AddDate'],$row2['EndDate'],$row2['MasterID'],$row2['AchieveScore'],$row2['AchieveComplete'],$row2['Order']);
    $_AchievementsTree[$index]->AddSubAchievements($Achievement2);

  }
}

//DISPLAY ACHIEVEMENT TREE
foreach( $_AchievementsTree as $Achievement)
  $_Content .= $Achievement->ShowAchievement();

//*/

//
?>
  <title>Life Achievements</title>
  <link rel="shortcut icon" href="imgs/favicon.ico" type="image/vnd.microsoft.icon" />
  <link rel="icon" href="imgs/favicon.ico" type="image/vnd.microsoft.icon" />
  <link rel="stylesheet" href="Styles.css" type="text/css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
</head>

<body>
<script type="text/javascript" >
$(document).ready(function(){
 //alert( $("*").find("img.achievement_desc").length );
 $("*").find("img.achievement_desc").each( function(index){
   Index = $(this).attr("id").substr( $(this).attr("id").lastIndexOf('_') + 1);
   if( $("h4#achievement_desc_"+Index).height() < $("div#achievement_desc_"+Index).height() && !$("div#achievement_enddesc_"+Index).text() )
     $(this).remove();
 })

 $("a").click(function(event){
   Index = $(this).attr("id").substr( $(this).attr("id").lastIndexOf('_') + 1);

   if( $(this).attr("id").indexOf('achievement_master_') != -1)
   {
     event.preventDefault();
     //$("div#achievement_master_"+Index).slideToggle(500);
     $("#achievement_subachievements_"+Index).animate({"height": "toggle", "opacity": "toggle"},500);
     if($("img#achievement_master_"+Index).attr("src") == 'imgs/minus.png' )
       $("img#achievement_master_"+Index).attr({src:'imgs/plus.png'});
     else
       $("img#achievement_master_"+Index).attr({src:'imgs/minus.png'});
   }
   else if( $(this).attr("id").indexOf('achievement_desc_') != -1)
   {
     event.preventDefault();
     //alert($("img#achievement_desc_"+Index).attr('src'));
     if( $("img#achievement_desc_"+Index).attr('src') == "imgs/plus.png" )
     {
       h4_desc_height = $("h4#achievement_desc_"+Index).height() + 5;
       enddesc_height = $("div#achievement_enddesc_"+Index).height();
       container_height = $("div#achievement_desc_"+Index).height();

       // +1 pour le bord du enddesc
       $("div#achievement_container_"+Index).animate({height:'+='+(h4_desc_height+enddesc_height-container_height)},500);
       $("div#achievement_desc_"+Index).animate({height:h4_desc_height},500);
       $("div#achievement_enddesc_"+Index).slideDown(500);

       $("img#achievement_desc_"+Index).attr({src:'imgs/minus.png'});
     }
     else
     {
       $("div#achievement_container_"+Index).animate({height:'60'},500);
       $("div#achievement_desc_"+Index).animate({height:'20'},500);
       $("div#achievement_enddesc_"+Index).slideUp(500)
       $("img#achievement_desc_"+Index).attr({src:'imgs/plus.png'});
     }
   }
 });
});
</script>
<script language="JavaScript" src="../_Tools/_TextEditor/TextEditor/TextEditor.js" type="text/javascript"></script>
<fieldset style="border:1px solid #F90">
  <legend>Menu</legend>
  <div id="Menu">

  </div>
  <div id="SubMenu">
    <a href="http://sql.free.fr/phpMyAdmin/" target="_blank">PhpMyAdmin</a> -
    <a href="http://jquery.com/" target="_blank">jQuery.com</a>
  </div>
</fieldset>
<!--
<fieldset style="border:1px solid #090">
  <legend>Messages</legend>
<?
//*
if( isset($_Messages) )
{
  foreach( $_Messages as $Message)
    echo $Message.'<br>';
}
//*/
?>
</fieldset>
!-->
<fieldset style="border:1px solid #09F">
  <legend>Content</legend>
<?php
echo $_Content;
?>
</fieldset>

<fieldset style="border:1px solid #090">
  <legend>Edit</legend>
<?php
//*
if( isset($_Edit) )
{
  foreach( $_Edit as $_Edit)
    echo $_Edit.'<br>';
}
//*/
?>
</fieldset>

<fieldset style="border:1px solid #F09">
  <legend>Debug</legend>
  <script>
  PostItHere('Debug','LA');
  </script>
  <fieldset style="border:1px solid #F9F">
    <legend>Javascript</legend>
    <div name="Debug" id="Debug"></div>
  </fieldset>
<?php
//*
foreach($_Debug as $key => $values)
{
  echo '<fieldset style="border:1px solid #F9F"><legend>'.$key.'</legend>';

  if( gettype($values) == 'array' )
  {
    foreach($values as $value)
    {
      if( gettype($value) == 'array' )
        print_r($value);
      else
        echo $value;
      echo "<br>";
    }
  } else
    echo $values;

  echo '</fieldset>';
}
//print_r($_Debug);
//*/
?>
  <fieldset style="border:1px solid #F9F">
    <legend>Render Time</legend>
<?php
$end = utime();
$run = $end - $start;
echo "Page created in: ".substr($run, 0, 5) . " seconds.";
?>
  </fieldset>
</fieldset>
</body>

</html>