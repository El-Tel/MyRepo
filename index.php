<?php
$Heading = "My Photos";
$SubHeading = " - ";
$SubIndex = basename($_SERVER['PHP_SELF']);

if(isset($_GET['dir']))
{
  $Heading .= $SubHeading.basename(getcwd());
}

function ShowPics()
{
  $NumCols = 4;

  $Pic=GetFiles('.','');
  $NumPics=sizeof($Pic);
  for($Count=0;$Count < $NumPics;$Count+=$NumCols)
  {
    print '<div class="leftpad">&nbsp</div>'."\n";
    for($Col=0;$Col < $NumCols;$Col++)
    {
      $ImgNo=$Count+$Col;
      if($ImgNo < $NumPics)
      {
        DoPicCell($Pic[$ImgNo],'');
      }
      else
      {
        DoPicCell('','blank');
      }
    }
    print '<br clear="all"/>'."\n";
  }
}

function ShowDirs()
{
  $NumCols = 5;

  $Dir = GetFiles('.','dir');
  $NumDirs = sizeof($Dir);
  for($Count=0;$Count < $NumDirs;$Count+=$NumCols)
  {
    print '<div class="leftpad">&nbsp</div>'."\n";
    for($Col=0;$Col < $NumCols;$Col++)
    {
      $DirNo=$Count+$Col;
      if($DirNo < $NumDirs)
      {
        DoDirCell($Dir[$DirNo],'');
      }
      else
      {
        DoDirCell('','blank');
      }
    }
    print '<br clear="all"/>'."\n";
  }
}

function GetFiles($Dir,$Type)
{
  $List=array();

  if($DirHandle=opendir($Dir))
  {
    $Count = 0;
    while(false !== ($FileName = readdir($DirHandle)))
    {
      $OutStr="";
      if(($FileName != ".")&&($FileName != ".."))
      {
        if($Type=='dir')
        {
          if(is_dir($FileName))
          {
            $List[$Count++]=$FileName;
          }
        }
        elseif(preg_match("/.[j,J][p,P][g,G]$/","$FileName", $Matches)==1)
        {
          $List[$Count++]=$FileName;
        }
      }
    }
    closedir($DirHandle) ;
  }
  array_multisort($List);
  return $List;
}

function DoPicCell($ImgFile,$Blank)
{
  print '<div class="picCell';
  if($Blank=='blank')
  {
    print ' hide">&nbsp;';
  }
  else
  {
    print '"><a href="'.$ImgFile.'" target="_blank"><img src="'.$ImgFile.'" border="0" alt="'.$ImgFile.'"></a>';
  }
  print "</div>\n";
}

function DoDirCell($DirName,$Blank)
{
  global $SubIndex;

  print '<div class="dirCell';
  if($Blank=='blank')
  {
    print ' hide">&nbsp;';
  }
  else
  {
    $secure = md5($DirName);
    print "\" >\n";
    print "<a href=\"$DirName/$SubIndex?dir=$secure\"><img src=\"http://www.apache.org/icons/dir.png\" border=\"0\" alt=\"$DirName\" /><p>$DirName</p></a>\n";
  }
  print "</div>\n";
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><?php print $Heading; ?></title>
<style>
body{
  font-family: Arial,Verdana,sans-serif;
}

a {
  color: black;
  text-decoration: underline;
}
a:hover {
  text-decoration: none;
}

.mainpage{
  background-color: #eeeeee;
  border: 1px solid black;
  margin-left: auto;
  margin-right: auto;
  width: 750px;
}

.banner{
  background-color: #b7dcff;
  color: #404040;
  border-bottom: 1px solid black;
  font-size:22px;
  font-weight: bold;
  height: 32px;
  padding-top: 5px;
  text-align: center;
  width: 100%;
}

.leftpad{
  float: left;
  width: 20px;
}

.picCell{
  background-color: #dddddd;
  border: 1px solid #888888;
  float: left;
  margin: 0 0 10px 10px;
  padding: 1px 0 1px 0;
  width: 150px;
}

.dirCell{
  font-size: 12px;
  float: left;
  margin: 0 0 10px 10px;
  padding: 1px 0 1px 0;
  width: 115px;
}
.dircell img{
  height: 20px;
  margin: -3px 5px;
  width: 20px;
}
.dircell p{
  display: inline;
}

.hide{
  background-color: transparent;
  border: 0;
}

img{
  height: 100px;
}

#footer{
  font-size: 9px;
  padding-right: 10px;
  text-align: right;
}
</style>
</head>
<body>
<div class="mainpage" align="center">
  <div class="banner">
    <?php print $Heading; ?>
  </div>
  <br clear="all">
<?php
  ShowDirs();
  ShowPics();
?>
  <div id="footer">
    <p>Original idea &copy; <a href="http://www.happysoft.co.uk">El_Tel</a></p>
  </div>
</div>
</body>
</html>
