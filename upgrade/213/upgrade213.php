<?php
define('FORUM_ROOT', '../../');
require FORUM_ROOT.'include/common.php';

$db->query('UPDATE '.$db_prefix."config SET `conf_value` = '2.2' WHERE `conf_name` = 'o_cur_version'") or error('Unable to update table '.$db_prefix.'config. Please check your configuration and try again.');

$db->query('INSERT INTO '.$db->prefix.'gallery_cat (`id`, `cat_name`, `cat_desc`, `moderators`, `num_img`, `last_post`, `last_poster`, `last_poster_id`, `disp_position`) VALUES (NULL, \'New gallery\', \'The Default Category\', NULL, \'0\', NULL, NULL, \'1\', \'0\')') or error ('Unable to add the Default gallery category');

require_once FORUM_ROOT.'include/cache.php';
generate_config_cache();

$latest_version = str_replace('.', '', $configuration['o_cur_version']);
if (file_exists('../'.$latest_version))
{
?>
	<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
	<html>
	<head>
		<title>PowerBB Upgrade Wizard Complete</title>
		<link rel="stylesheet" type="text/css" href="../../include/css/install.css" />
	</head>
	<body>
	<div class="Banner">
		<img src="../../img/logo.png" border="0" alt="PowerBB Forum" />
	</div>
      <div class="Body">
		<div class="Contents">
			<h1>PowerBB Upgrade Wizard</h1><p>You have successfully updated. Click the link below to continue.</p>
			<div class="Button"><a href="../index.php">Click here to upgrade and continue.</a></div>
		</div>
		</div>
		<div class="Foot">
			<a href="http://www.powerwd.com/index.php"><b>Eli White</b></a> <a href="http://www.powerwd.com/forum/index.php">PowerBB Forum</a> Copyright &copy; 2005 - 2006
		</div>
	</div>
	</body>
	</html>
<?
}
else
{
?>
	<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
	<html>
	<head>
		<title>PowerBB Upgrade Wizard Complete</title>
		<link rel="stylesheet" type="text/css" href="../../include/css/install.css" />
	</head>
	<body>
	<div class="Banner">
		<img src="../../img/logo.png" border="0" alt="PowerBB Forum" />
	</div>
      <div class="Body">
		<div class="Contents">
			<h1>PowerBB Upgrade Wizard</h1><p>You are now up to date. Click below to return to your forum.</p>
			<div class="Button"><a href="../../index.php">Click here to return to your forum.</a></div>
		</div>
		</div>
		<div class="Foot">
			<a href="http://www.powerwd.com/index.php"><b>Eli White</b></a> <a href="http://www.powerwd.com/forum/index.php">PowerBB Forum</a> Copyright &copy; 2005 - 2006
		</div>
	</div>
	</body>
	</html>
<?
}
?>