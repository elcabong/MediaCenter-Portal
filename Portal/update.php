<?php
if(isset($_GET['update']) && $_GET['update']){
  updateVersion();
}

function updateVersion(){
	require_once '../lib/class.settings.php';require_once '../lib/class.github.php';
  $github = new GitHub('elcabong','MediaCenter-Portal');
  $commit = $github->getCommits();
  $commitNo = $commit['0']['sha'];
  $config = new ConfigMagik('../config/config.ini', true, true);
	try{
  	$config->set('version', $commitNo, 'ADVANCED');
  } catch (Exception $e){
    echo false; exit;
  }
  echo true;
}
?>