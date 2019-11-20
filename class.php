<?php
class Achievement
{
  public $ID = -1;
  public $Order = -1;
  public $Title = '';
  public $Desc = '';
  public $EndDesc = '';
  public $AddDate = '0000-00-00';
  public $EndDate = '0000-00-00';

  public $MasterID = -1;

  private $AchieveCompleteWidth = 574;

  public $SubAchievements = array();

  public function __construct() { }

  public function SetAchievements()
  {
    $args = func_get_args();
    if( func_num_args() == 1) //Achievement
    {
      $this->ID = $args[0]->ID;
      $this->Title = $args[0]->Title;
      $this->Desc = $args[0]->Desc;
      $this->EndDesc = $args[0]->EndDesc;
      $this->AddDate = $args[0]->AddDate;
      $this->EndDate = $args[0]->EndDate;
      $this->MasterID = $args[0]->MasterID;
      $this->AchieveScore = $args[0]->AchieveScore;
      $this->AchieveComplete = $args[0]->AchieveComplete;
      $this->Order = $args[0]->Order;
    }
    else //$ID,$Title,$Desc,$EndDesc,$AddDate,$EndDate,$MasterID
    {
      $this->ID = $args[0];
      $this->Title = $args[1];
      $this->Desc = $args[2];
      $this->EndDesc = $args[3];
      $this->AddDate = $args[4];
      $this->EndDate = $args[5];
      $this->MasterID = $args[6];
      $this->AchieveScore = $args[7];
      $this->AchieveComplete = $args[8];
      $this->Order = $args[9];
    }
    //echo $this->ID.' - '.$this->Title.' - '.$this->Desc.' - '.$this->EndDesc.' - '.$this->AddDate.' - '.$this->EndDate.' - '.$this->MasterID.'<br>';
  }

  public function AddSubAchievements( $Achievements )
  {
    $this->SubAchievements[] = $Achievements;
  }

  public function ShowAchievement()
  {
    global $_Debug;
    //$_Debug['php'][] = $this->Title;

    $AddDate = $this->AddDate;
    $EndDate = $this->EndDate;

    if( count($this->SubAchievements) > 0 )
    {
      foreach($this->SubAchievements as $SubAchievement)
      {
        if( $AddDate > $SubAchievement->AddDate )
          $AddDate = $SubAchievement->AddDate;
        if( $EndDate < $SubAchievement->EndDate )
          $EndDate = $SubAchievement->EndDate;

        $Score += ($SubAchievement->AchieveScore/$SubAchievement->AchieveComplete)*1/(count($this->SubAchievements));
      }

      $ScoreWidth = $Score * $this->AchieveCompleteWidth;
      $Score = round($Score*100);
      $Score .= ' %';
    } else
    {
      if( $this->AchieveComplete == 100)
        $Score = $this->AchieveScore.' %';
      else
        $Score = $this->AchieveScore.' / '.$this->AchieveComplete;

      $ScoreWidth = ($this->AchieveScore / $this->AchieveComplete) * $this->AchieveCompleteWidth;
    }

    if( $ScoreWidth < 2 )
      $ScoreWidth = 2;

    if( count($this->SubAchievements) > 0 )
    {
      $deploy .= $PHP_EOL.'    <a href="#" id="achievement_master_'.$this->ID.'">';
      $deploy .= $PHP_EOL.'      <img class="achievement_master" id="achievement_master_'.$this->ID.'" src="imgs/plus.png" width="20" height="20" alt=""/>';
      $deploy .= $PHP_EOL.'    </a>';
    }
    else
      $deploy = '';

    if( $ScoreWidth == $this->AchieveCompleteWidth || $this->EndDate)
    {
      $achievement_container_class = " achievement_container_100";
      $achievement_score_bar_class = " achievement_score_bar_100";
    }

    $return .= $PHP_EOL.'<div class="achievement_container'.$achievement_container_class.'" id="achievement_container_'.$this->ID.'">';
    $return .= $PHP_EOL.'  <div class="achievement_deploy">';
    $return .= $deploy;
    $return .= $PHP_EOL.'  </div>';
    $return .= $PHP_EOL.'  <div class="achievement_img" id="achievement_img_'.$this->ID.'">';
    if( is_file('achievements_imgs/'.$this->ID.'.png') )
      $return .= $PHP_EOL.'    <img class="achievement_img" src="achievements_imgs/'.$this->ID.'.png" width="50" height="50" alt="'.$this->ID.'" title="'.$this->ID.' ('.$this->Order.') - '.$this->Title.'"/>';
    $return .= $PHP_EOL.'  </div>';
    $return .= $PHP_EOL.'  <div class="achievement_text" id="achievement_text_'.$this->ID.'">';
    $return .= $PHP_EOL.'    <div class="achievement_dates">';
    //$return .= $PHP_EOL.'      <h3 class="achievement_adddate">Ajout&eacute; : '.utf8_decode( strftime( "%d %B %Y %H:%I:%S" , strtotime( $AddDate ) ) ).'</h3>';
    $return .= $PHP_EOL.'      <h3 class="achievement_adddate">Ajout&eacute; : '.strftime( "%d %B %Y %H:%I:%S" , strtotime( $AddDate ) ).'</h3>';
    if( $this->EndDate )
      //$return .= $PHP_EOL.'      <h3 class="achievement_enddate">Termin&eacute; : '.utf8_decode( strftime( "%d %B %Y %H:%I:%S" , strtotime( $EndDate ) ) ).'</h3>';
      $return .= $PHP_EOL.'      <h3 class="achievement_enddate">Termin&eacute; : '.strftime( "%d %B %Y %H:%I:%S" , strtotime( $EndDate ) ).'</h3>';
    $return .= $PHP_EOL.'    </div>';
    $return .= $PHP_EOL.'    <div class="achievement_title" id="achievement_title_'.$this->ID.'">';
    $return .= $PHP_EOL.'      <h2 class="achievement_title">'.$this->Title.'</h2>';
    $return .= $PHP_EOL.'    </div>';
    $return .= $PHP_EOL.'    <div class="achievement_score" id="achievement_score_'.$this->ID.'">';
    $return .= $PHP_EOL.'      <h2 class="achievement_score">'.$Score.'</h2>';
    $return .= $PHP_EOL.'    </div>';
    $return .= $PHP_EOL.'    <div class="achievement_score_container">';
    $return .= $PHP_EOL.'      <div class="achievement_score_bar'.$achievement_score_bar_class.'" style="width:'.$ScoreWidth.'px;">&nbsp;</div>';
    $return .= $PHP_EOL.'    </div>';
    $return .= $PHP_EOL.'    <div class="achievement_desc" id="achievement_desc_'.$this->ID.'">';
    $return .= $PHP_EOL.'      <div class="achievement_desc_deploy">';
    $return .= $PHP_EOL.'        <a href="#" id="achievement_desc_'.$this->ID.'">';
    $return .= $PHP_EOL.'          <img class="achievement_desc" id="achievement_desc_'.$this->ID.'" src="imgs/plus.png" width="20" height="20" alt="" />';
    $return .= $PHP_EOL.'        </a>';
    $return .= $PHP_EOL.'      </div>';
    $return .= $PHP_EOL.'      <h4 class="achievement_desc" id="achievement_desc_'.$this->ID.'">'.$this->Desc.'</h4>';
    $return .= $PHP_EOL.'    </div>';
    if( $this->EndDesc != '' )
    {
      $return .= $PHP_EOL.'    <div class="achievement_enddesc" id="achievement_enddesc_'.$this->ID.'">';
      $return .= $PHP_EOL.'      <h4 class="achievement_enddesc" id="achievement_enddesc_'.$this->ID.'">'.$this->EndDesc.'</h4>';
      $return .= $PHP_EOL.'    </div>';
    }
    $return .= $PHP_EOL.'  </div>';
    $return .= $PHP_EOL.'</div>';

    if( count($this->SubAchievements) > 0 )
    {
      $return .= $PHP_EOL.'<div class="achievement_subachievements" id="achievement_subachievements_'.$this->ID.'">';

      foreach($this->SubAchievements as $SubAchievement)
        $return .= $SubAchievement->ShowAchievement();

      $return .= $PHP_EOL.'  <div class="achievement_subachievements_spacer">';
      $return .= $PHP_EOL.'  </div>';
      $return .= $PHP_EOL.'</div>';
    }

    return($return);
  }

  public function __toString()
  {

    if( count($this->SubAchievements) != 0 )
    {
      foreach($this->SubAchievements as $SubAchievement)
        $Score += ($SubAchievement->AchieveScore/$SubAchievement->AchieveComplete)*1/(count($this->SubAchievements));
    } else
    {
      $Score = $this->AchieveScore / $this->AchieveComplete;
    }

    $return .= 'ID=<b>__'.$this->ID.'</b> - ';
    $return .= 'Title=<b>'.$this->Title.'</b> - ';
    $return .= 'Desc=<b>'.$this->Desc.'</b> - ';
    $return .= 'EndDesc=<b>'.$this->EndDesc.'</b> - ';
    $return .= 'AddDate=<b>'.$this->AddDate.'</b> - ';
    $return .= 'EndDate=<b>'.$this->EndDate.'</b> - ';
    $return .= 'MasterID=<b>'.$this->MasterID.'</b> - ';
    $return .= 'AchieveScore=<b>'.$this->AchieveScore.'</b> - ';
    $return .= 'AchieveComplete=<b>'.$this->AchieveComplete.'</b> - ';
    $return .= 'Score=<b>'.round(($Score*100),2).'%</b><br>';
    return($return);
  }
}
?>