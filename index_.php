<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <title>Life Achievement</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript" >
$(document).ready(function(){
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
     if( $("div#achievement_desc_"+Index).height() == 20 )
     {
       h4_desc_height = $("h4#achievement_desc_"+Index).height() + 5;
       enddesc_height = $("div#achievement_enddesc_"+Index).height();
       container_height = $("div#achievement_desc_"+Index).height();

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
<style type="text/css">
/*<![CDATA[*/
div{border:solid 0px;}

body {
	font-family:Arial, Helvetica, Verdana, sans-serif;
	font-size:12px;
	color:#939393;
	margin:0;
	padding:0;
}
div.achievement_container{ float:none;border:2px solid #000;height:60px; }
div.achievement_deploy{ width:20px;height:60px;float:left;background-color:#C9F; }
div.achievement_img{ width:60px;height:60px;float:left;background-color:#FC9; }
img.achievement_img{ margin:5px; }
img.achievement_master{ position:relative;top:15px; }
div.achievement_text{ width:820px;height:60px;float:left;position:relative;background-color:#CF9; }
div.achievement_dates{ width:220px;height:30px;float:right;background-color:#9FC;margin:10px;text-align:right; }
h3.achievement_adddate{ font-size:12px;padding:0px;margin:0px; }
h3.achievement_enddate{ font-size:12px;padding:0px;margin:0px; }
div.achievement_title{ float:left;width:450px/* was 580px */;height:30px;position:relative;background-color:#9CF;padding:0px;margin:0px;vertical-align:middle; }
h2.achievement_title{ font-weight:bold;font-size:18px;padding:5px 0px 0px 10px;margin:0px; }

div.achievement_score{ float:right;z-index:100;position:relative;background-color:#0F0;height:30px;width:130px;padding:0px;  }
h2.achievement_score{ text-align:right;font-weight:bold;font-size:18px;padding:5px 10px 0px 0px;margin:0px; }

div.achievement_score_container{ float:left;height:10px;width:580px;background-color:#00F; }
div.achievement_score_bar{ margin:3px;height:4px;background-color:#F00; }

div.achievement_desc{ width:580px;height:20px;position:relative;top:0px;background-color:#F9C;padding:0px;margin:0px;overflow:hidden; }
h4.achievement_desc{ font-size:12px;padding:2px 0px 0px 25px;margin:0px; }
div.achievement_desc_deploy{ width:20px;height:20px;position:absolute;background-color:#9FC;text-align:center; }
div.achievement_enddesc{ width:580px;position:relative;top:0px;background-color:#FC0;padding:0px;margin:0px;display:none; }
h4.achievement_enddesc{ font-size:12px;padding:2px 0px 0px 25px;margin:0px; }
div.achievement_subachievements{ padding-left:20px;border:2px solid #FC0;display:none; }


</style>
</head>

<body>
<div class="achievement_container" id="achievement_container_01">
  <div class="achievement_deploy"></div>
  <div class="achievement_img" id="achievement_img_01">
    <img class="achievement_img" src="imgs/" width="50" height="50" alt="" />
  </div>
  <div class="achievement_text" id="achievement_text_01">
    <div class="achievement_dates">
      <h3 class="achievement_adddate">Ajouté : 20 Septembre 1983 à 17:32</h3>
      <h3 class="achievement_enddate">Terminé : 3 janvier 2007 à 09:47</h3>
    </div>
    <div class="achievement_title" id="achievement_title_01">
      <h2 class="achievement_title">Titre</h2>
    </div>
    <div class="achievement_score" id="achievement_score_01">
      <h2 class="achievement_score">8 / 8</h2>
    </div>
    <div class="achievement_score_container">
      <div class="achievement_score_bar" style="width:574px;">&nbsp;</div>
    </div>
    <div class="achievement_desc" id="achievement_desc_01">
      <div class="achievement_desc_deploy"><a href="#" id="achievement_desc_01"><img id="achievement_desc_01" src="imgs/plus.png" width="20" height="20" alt="" /></a></div>
      <h4 class="achievement_desc" id="achievement_desc_01">Description Description Description Description Description Description Description Description Description </h4>
    </div>
    <div class="achievement_enddesc" id="achievement_enddesc_01">
      <h4 class="achievement_enddesc" id="achievement_enddesc_01">End Description End Description End Description End Description End Description</h4>
    </div>
  </div>
</div>

<div class="achievement_container" id="achievement_container_02">
  <div class="achievement_deploy">
    <a href="#" id="achievement_master_02">
      <img class="achievement_master" id="achievement_master_02" src="imgs/plus.png" width="20" height="20" alt=""/>
    </a>
  </div>
  <div class="achievement_img" id="achievement_img_02">
    <img class="achievement_img" src="imgs/" width="50" height="50" alt="" />
  </div>
  <div class="achievement_text" id="achievement_text_02">
    <div class="achievement_dates">
      <h3 class="achievement_adddate">Ajouté : 20 Septembre 1983 à 17:32</h3>
      <h3 class="achievement_enddate">Terminé : 3 janvier 2007 à 09:47</h3>
    </div>
    <div class="achievement_title" id="achievement_title_02">
      <h2 class="achievement_title" id="achievement_title_02">Titre</h2>
    </div>
    <div class="achievement_score" id="achievement_score_01">
      <h2 class="achievement_score">36 %</h2>
    </div>
    <div class="achievement_score_container">
      <div class="achievement_score_bar" style="width:206px;">&nbsp;</div>
    </div>
    <div class="achievement_desc" id="achievement_desc_02">
      <div class="achievement_desc_deploy"><a href="#" id="achievement_desc_02"><img id="achievement_desc_02" src="imgs/plus.png" width="20" height="20" alt=""/></a></div>
      <h4 class="achievement_desc" id="achievement_desc_02">Description Description Description Description Description Description Description Description Description </h4>
    </div>
    <div class="achievement_enddesc" id="achievement_enddesc_02">
      <h4 class="achievement_enddesc" id="achievement_enddesc_02">End Description End Description End Description End Description End Description End Description End Description End Description End Description </h4>
    </div>
  </div>
</div>

<div class="achievement_subachievements" id="achievement_subachievements_02">

<div class="achievement_container" id="achievement_container_05">
  <div class="achievement_deploy"></div>
  <div class="achievement_img" id="achievement_img_05">
    <img class="achievement_img" src="imgs/" width="50" height="50" alt="" />
  </div>
  <div class="achievement_text" id="achievement_text_05">
    <div class="achievement_dates">
      <h3 class="achievement_adddate">Ajouté : 20 Septembre 1983 à 17:32</h3>
      <h3 class="achievement_enddate">Terminé : 3 janvier 2007 à 09:47</h3>
    </div>
    <div class="achievement_title" id="achievement_title_05">
      <h2 class="achievement_title">Titre</h2>
    </div>
    <div class="achievement_score" id="achievement_score_01">
      <h2 class="achievement_score">12 %</h2>
    </div>
    <div class="achievement_score_container">
      <div class="achievement_score_bar" style="width:30px;">&nbsp;</div>
    </div>
    <div class="achievement_desc" id="achievement_desc_05">
      <div class="achievement_desc_deploy"><a href="#" id="achievement_desc_05"><img id="achievement_desc_05" src="imgs/plus.png" width="20" height="20" alt="" /></a></div>
      <h4 class="achievement_desc" id="achievement_desc_05">Description Description Description Description Description Description Description Description Description </h4>
    </div>
    <div class="achievement_enddesc" id="achievement_enddesc_05">
      <h4 class="achievement_enddesc" id="achievement_enddesc_05">End Description End Description End Description End Description End Description</h4>
    </div>
  </div>
</div>

<div class="achievement_container" id="achievement_container_04">
  <div class="achievement_deploy"></div>
  <div class="achievement_img" id="achievement_img_04">
    <img class="achievement_img" src="imgs/" width="50" height="50" alt="" />
  </div>
  <div class="achievement_text" id="achievement_text_04">
    <div class="achievement_dates">
      <h3 class="achievement_adddate">Ajouté : 20 Septembre 1983 à 17:32</h3>
      <h3 class="achievement_enddate">Terminé : 3 janvier 2007 à 09:47</h3>
    </div>
    <div class="achievement_title" id="achievement_title_04">
      <h2 class="achievement_title">Titre</h2>
    </div>
    <div class="achievement_score" id="achievement_score_01">
      <h2 class="achievement_score">9 / 75</h2>
    </div>
    <div class="achievement_score_container">
      <div class="achievement_score_bar" style="width:40px;">&nbsp;</div>
    </div>
    <div class="achievement_desc" id="achievement_desc_04">
      <div class="achievement_desc_deploy"><a href="#" id="achievement_desc_04"><img id="achievement_desc_04" src="imgs/plus.png" width="20" height="20" alt="" /></a></div>
      <h4 class="achievement_desc" id="achievement_desc_04">Description Description Description Description Description Description Description Description Description </h4>
    </div>
    <div class="achievement_enddesc" id="achievement_enddesc_04">
      <h4 class="achievement_enddesc" id="achievement_enddesc_04">End Description End Description End Description End Description End Description</h4>
    </div>
  </div>
</div>

</div>

<div class="achievement_container" id="achievement_container_03">
  <div class="achievement_deploy"></div>
  <div class="achievement_img" id="achievement_img_03">
    <img class="achievement_img" src="imgs/" width="50" height="50" alt="" />
  </div>
  <div class="achievement_text" id="achievement_text_03">
    <div class="achievement_dates">
      <h3 class="achievement_adddate">Ajouté : 20 Septembre 1983 à 17:32</h3>
      <h3 class="achievement_enddate">Terminé : 3 janvier 2007 à 09:47</h3>
    </div>
    <div class="achievement_title" id="achievement_title_03">
      <h2 class="achievement_title">Titre</h2>
    </div>
    <div class="achievement_score" id="achievement_score_01">
      <h2 class="achievement_score">89 %</h2>
    </div>
    <div class="achievement_score_container">
      <div class="achievement_score_bar" style="width:500px;">&nbsp;</div>
    </div>
    <div class="achievement_desc" id="achievement_desc_03">
      <div class="achievement_desc_deploy"><a href="#" id="achievement_desc_03"><img id="achievement_desc_03" src="imgs/plus.png" width="20" height="20" alt="" /></a></div>
      <h4 class="achievement_desc" id="achievement_desc_03">Description Description Description Description Description Description Description Description Description </h4>
    </div>
    <div class="achievement_enddesc" id="achievement_enddesc_03">
      <h4 class="achievement_enddesc" id="achievement_enddesc_03">End Description End Description End Description End Description End Description</h4>
    </div>
  </div>
</div>
</body>
</html>