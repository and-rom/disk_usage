<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
include('config.php');
include('func.php');

$devices = getDiskUsage($devices);

for ($i = 0; $i < count($devices); $i++) {
  if ($devices[$i]['name'] != 'err') {
  ?>
  <div class='progress'>
    <div class='progress-header'>
      <span class='progress-header-name'><?=$devices[$i]['name']?></span>
      <span class='progress-header-path'><?=$devices[$i]['path']?></span>
      <span class='progress-header-total'>Total size: <?=$devices[$i]['total']?></span>
    </div>
    <div class='progress-bar'>
      <div class='progress-bar-used' style="width: <?=$devices[$i]['percentage_used']?>%;">
        <span class='progress-bar-used-text-percentage'><?=$devices[$i]['percentage_used']?> %</span>
        <span class='progress-bar-used-text'><?=$devices[$i]['used']?></span>
      </div>
      <div class='progress-bar-free' style="margin-left: <?=$devices[$i]['percentage_used']?>%;">
        <span class='progress-bar-free-text-percentag'><?=$devices[$i]['percentage_free']?> %</span>
        <span class='progress-bar-free-text'><?=$devices[$i]['free']?></span>
      </div>
    </div>
  </div>
<?
} else {
?>
  <div class='error'>
    <span><?=$devices[$i]['path']?> not a directory</span>
  </div>
<?
}
}
?>
<body>
</html>
