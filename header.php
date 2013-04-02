<?php
//----------------------------------------------
// PowerBB
//----------------------------------------------
// All code is copyright to Power Software
// unless mentioned otherwise. This code
// may NOT be reproduced, or distributed
// by any means, unless you have explicit
// written permission from Power Software.
// Some code is derived from early versions
// of PunBB.
//-----------------------------------------------
// Copyright as of 2006
// All rights reserved
//-----------------------------------------------


ob_start();
//-----------------------------------------------
// Define and check if defined in forum.
// Makes sure not being accessed from elsewhere
//-----------------------------------------------
if (!defined('IN_FORUM')) exit;
//-----------------------------------------------
// When accessed from Admin Panel
//-----------------------------------------------
if (defined('ADMIN_CONSOLE'))
{
	if(is_file(FORUM_ROOT.'include/template/'.$forum_user['style'].'/admin.tpl')) $tpl_main = file_get_contents(FORUM_ROOT.'include/template/'.$forum_user['style'].'/admin.tpl');
	else $tpl_main = file_get_contents(FORUM_ROOT.'include/template/admin.tpl');
}
//-----------------------------------------------
// When accessed from Help
//-----------------------------------------------
else if (defined('FORUM_HELP'))
{
	if(is_file(FORUM_ROOT.'include/template/'.$forum_user['style'].'/help.tpl')) $tpl_main = file_get_contents(FORUM_ROOT.'include/template/'.$forum_user['style'].'/help.tpl');
	else $tpl_main = file_get_contents(FORUM_ROOT.'include/template/help.tpl');
}
else
{
	if(is_file(FORUM_ROOT.'include/template/'.$forum_user['style'].'/main.tpl')) $tpl_main = file_get_contents(FORUM_ROOT.'include/template/'.$forum_user['style'].'/main.tpl');
	else $tpl_main = file_get_contents(FORUM_ROOT.'include/template/main.tpl');
}
//-----------------------------------------------
// Replace code in tpl files
//-----------------------------------------------
$tpl_main = str_replace('<forum_content_direction>', $lang_common['lang_direction'], $tpl_main);
$tpl_main = str_replace('<forum_char_encoding>', $lang_common['lang_encoding'], $tpl_main);
ob_start();
//-----------------------------------------------
// Meta tags
//-----------------------------------------------
if (!defined('ALLOW_INDEX')) echo "\t".'<meta name="ROBOTS" content="NOINDEX, FOLLOW" />'."\n";
echo "\t".'<meta name="description" content="' . $configuration['o_board_meta'] .'" />'."\n";
echo "\t".'<meta name="keywords" content="' . $configuration['o_board_meta_keywords'] .'" />'."\n";
if ($configuration['o_board_meta_author']) $author_str = "\t".'<meta name="author" content="Generated by PowerBB (C) 2005-2006 Eli White" />'."\n";
echo $author_str;
$page_title = convert_htmlspecialchars($configuration['o_board_name'])." (Powered By PowerBB Forums)";
?>
	<title><?php echo $page_title ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo FORUM_ROOT?>style/<?php echo $forum_user['style'].'.css' ?>" />
<?php
//-----------------------------------------------
// Statistic Definitions
//-----------------------------------------------
define("_BBC_PAGE_NAME", $page_title);
define("_BBCLONE_DIR", "include/stats/");
define("COUNTER", _BBCLONE_DIR."mark_page.php");
if (is_readable(COUNTER)) include_once(COUNTER);
echo ("\t<link rel=\"alternate\" type=\"application/rss+xml\" title=\"New topics feed.\" href=\"".FORUM_ROOT."extern.php?action=new&amp;type=rss\"/>\n");
echo ("\t<link rel=\"alternate\" type=\"application/rss+xml\" title=\"Recent activity feed.\" href=\"".FORUM_ROOT."extern.php?action=active&amp;type=rss\"/>\n");
if ($id)
{
	if (ereg('view_forum.php', $REQUEST_URI))
	{
		$auto_discover_new = '<link rel="alternate" type="application/rss+xml" title="New topics feed for forum #'.$id.'." href="'.FORUM_ROOT.'extern.php?action=new&amp;type=rss&amp;fid='.$id.'"/>';
		$auto_discover_active = '<link rel="alternate" type="application/rss+xml" title="Recent activity feed for forum #'.$id.'." href="'.FORUM_ROOT.'extern.php?action=active&amp;type=rss&amp;fid='.$id.'"/>';
		echo ($auto_discover_new . "\n" . $auto_discover_active . "\n");
	}
}
//-----------------------------------------------
// When in admin panel
//-----------------------------------------------
$script_filename = htmlspecialchars(basename($_SERVER['PHP_SELF']));
if ($script_filename == 'view_topic.php' || $script_filename == 'post.php' || $script_filename == 'edit.php') echo '<link rel="stylesheet" type="text/css" href="include/css/image_upload.css" />'."\n";
if ($script_filename == 'post.php' || $script_filename == 'edit.php' || $script_filename == 'poll.php')
{
	echo '<script type="text/javascript">
		function process_form(the_form)
		{
			var element_names = new Object()
			element_names["req_email"] = "E-mail"
			element_names["req_subject"] = "Subject"
			element_names["req_message"] = "Message"
			if (document.all || document.getElementById)
			{
				for (i = 0; i < the_form.length; ++i)
				{
					var elem = the_form.elements[i]
					if (elem.name && elem.name.substring(0, 4) == "req_")
					{
						if (elem.type && (elem.type=="text" || elem.type=="textarea" || elem.type=="password" || elem.type=="file") && elem.value=="")
						{
							alert("\"" + element_names[elem.name] + "\" is a required field in this form.")
							elem.focus()
							return false
						}
					}
				}
			}
			return true
		}
		</script>';
}
echo '<script type="text/javascript" src="'.FORUM_ROOT.'include/js/tabpanel.js"></script>'."\n";
echo '<script type="text/javascript" src="'.FORUM_ROOT.'include/js/ads.js"></script>'."\n";
echo "\t".'<script type="text/javascript" src="'.FORUM_ROOT.'include/js/overlib_mini.js"></script>'."\n";
echo "\t".'<script type="text/javascript" src="'.FORUM_ROOT.'include/js/uncrypt_email.js"></script>'."\n";
echo "\t".'<script type="text/javascript" src="'.FORUM_ROOT.'include/js/global.js"></script>'."\n";
if (isset($required_fields))
{
//-----------------------------------------------
// A little bit of javascript
//-----------------------------------------------
?>

<script type="text/javascript">
<!--
function process_form(the_form)
{
	var element_names = new Object()
<?php
	while (list($elem_orig, $elem_trans) = @each($required_fields)) echo "\t".'element_names["'.$elem_orig.'"] = "'.addslashes(str_replace('&nbsp;', ' ', $elem_trans)).'"'."\n";
?>
	if (document.all || document.getElementById)
	{
		for (i = 0; i < the_form.length; ++i)
		{
			var elem = the_form.elements[i]
			if (elem.name && elem.name.substring(0, 4) == "req_")
			{
				if (elem.type && (elem.type=="text" || elem.type=="textarea" || elem.type=="password" || elem.type=="file") && elem.value=='')
				{
					alert("\"" + element_names[elem.name] + "\" <?php echo $lang_common['required field'] ?>")
					elem.focus()
					return false
				}
			}
		}
	}
	return true
}
// -->
</script>
<?php
}
$user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? strtolower($_SERVER['HTTP_USER_AGENT']) : '';
if (strpos($user_agent, 'msie') !== false && strpos($user_agent, 'windows') !== false && strpos($user_agent, 'opera') === false) echo '<script type="text/javascript" src="'.FORUM_ROOT.'include/js/minmax.js"></script>'."\n";
if ($script_filename == 'edit.php' || $script_filename == 'poll.php' || $script_filename == 'post.php') echo '<script type="text/javascript" src="'.FORUM_ROOT.'include/js/image_upload.js"></script>'."\n";
if ($script_filename == 'post.php' || $script_filename == 'poll.php' || $script_filename == 'edit.php') echo '<script type="text/javascript" src="'.FORUM_ROOT.'include/js/spellmessage.js"></script>'."\n";
if ($script_filename == 'admin_groups.php') echo '<script type="text/javascript" src="'.FORUM_ROOT.'include/js/color_picker.js"></script>'."\n";
$tpl_temp = trim(ob_get_contents());
$tpl_main = str_replace('<forum_head>', $tpl_temp, $tpl_main);
ob_end_clean();
if (isset($focus_element))
{
	$tpl_main = str_replace('<body onload="', '<body onload="document.getElementById(\''.$focus_element[0].'\').'.$focus_element[1].'.focus();', $tpl_main);
	$tpl_main = str_replace('<body>', '<body onload="document.getElementById(\''.$focus_element[0].'\').'.$focus_element[1].'.focus()">', $tpl_main);
}
//-----------------------------------------------
// Replacing tpl data with header and title.
//-----------------------------------------------

$tpl_main = str_replace('<forum_page>', basename($_SERVER['PHP_SELF'], '.php'), $tpl_main);
$tpl_main = str_replace('<forum_title>', '<div class="logo"><img src="'.convert_htmlspecialchars($configuration['o_board_title']).'" alt="" /></div>', $tpl_main);
if ($configuration['o_board_desc'] != '')
	{
		$tpl_main = str_replace('<forum_description>', '<p><span>'.$configuration['o_board_desc'].'</span></p>', $tpl_main);
	}
	else
	{
		$tpl_main = str_replace('<forum_description>', '', $tpl_main);
	}
$tpl_main = str_replace('<forum_navlinks>','<div id="brdmenu" class="inbox">'."\n\t\t\t". generate_navlinks()."\n\t\t".'</div>', $tpl_main);
if ($forum_user['is_guest'])
{
	$tpl_temp = '<div id="brdwelcome" class="inbox">'."\n\t\t\t".'<ul class="conl">'."\n\t\t\t\t".'<li>'.$lang_common['Not logged in'].'</li></ul>'."\n\t\t\t";
$tpl_temp .= '<div class="clearer"></div></div>
<div id="brdmenu2" class="inbox">'."\n\t\t\t". generate_navlinks2()."\n\t\t".'</div>';
}
else
{
	if( $forum_user['displayname'] != "")
		{
			$displaynamewithparents = '('.$forum_user['displayname'].')';
		}
//-----------------------------------------------
// Logged in information
//-----------------------------------------------
	$tpl_temp = '
	<div id="brdwelcome" class="inbox">'."\n\t\t\t".'
		<ul class="conl">'."\n\t\t\t\t".'
			<li>
				'.$lang_common['Logged in as'].' 
				<a href="'.FORUM_ROOT.'profile.php?id='.$forum_user['id'].'">
					<strong>
						'.convert_htmlspecialchars($forum_user['username']).'
					</strong>
				</a>
				&nbsp'.$displaynamewithparents.'
			</li>'."\n\t\t\t\t".'
			<li>
				'.$lang_common['Last visit'].': '.format_time($forum_user['last_visit']).'
			</li>';
	if ($forum_user['g_id'] < USER_GUEST)
	{
		$result_header = $db->query('SELECT COUNT(id) FROM '.$db->prefix.'reports WHERE zapped IS NULL') or error('Unable to fetch reports info', __FILE__, __LINE__, $db->error());
		if ($db->result($result_header)) $tpl_temp .= "\n\t\t\t\t".'<li class="reportlink"><strong><a href="'.FORUM_ROOT.'admin/admin_reports.php">There are new reports</a></strong></li>';
//-----------------------------------------------
// When in maintenance mode.
//-----------------------------------------------
		if ($configuration['o_maintenance'] == '1') $tpl_temp .= "\n\t\t\t\t".'<li class="maintenancelink"><strong><a href="'.FORUM_ROOT.'admin/admin_options.php#maintenance">Maintenance mode is enabled!</a></strong></li>';
	}
	if(!$forum_user['is_guest'] && $forum_user['g_pm'] == 1 && $configuration['o_pms_enabled'] )
	{
//-----------------------------------------------
// Message list and # of messenges.
//-----------------------------------------------
		require FORUM_ROOT.'lang/'.$forum_user['language'].'/pms.php';
		$result_messages = $db->query('SELECT COUNT(id) FROM '.$db->prefix.'messages WHERE showed=0 AND owner='.$forum_user['id']) or error('Unable to check for new messages', __FILE__, __LINE__, $db->error());
		if ($db->result($result_messages, 0))
		{
			$tpl_temp .= "\n\t\t\t\t".'<li class="pmlink"><strong><a href="'.FORUM_ROOT.'message_list.php">'.$lang_pms['You have'].$db->result($result_messages, 0).' '.$lang_pms['New messages'].'</a></strong></li>';
		}
		else
		{
		$tpl_temp .= "\n\t\t\t\t".'<li class="pmlink"><a href="'.FORUM_ROOT.'message_list.php">'.$lang_pms['You have'].$db->result($result_messages, 0).' '.$lang_pms['New messages'].'</a></li>';
		}
		if($configuration['o_pms_messages'] != 0 && $forum_user['g_id'] > USER_GUEST)
		{
			$result = $db->query('SELECT count(*) FROM '.$db->prefix.'messages WHERE owner='.$forum_user['id']) or error('Unable to test if the message-box is full', __FILE__, __LINE__, $db->error());
			list($count) = $db->fetch_row($result);
			if($count >= $forum_user['g_pm_limit']) $tpl_temp .= "\n\t\t\t\t".'<li class="pmlink"><strong><a href="'.FORUM_ROOT.'message_list.php">'.$lang_pms['Full inbox'].'</a></strong></li>';
		}
	}
//-----------------------------------------------
// When in...
//-----------------------------------------------
	$tpl_temp .= "\n\t\t\t".'</ul>'."\n\t\t\t".'<div class="clearer"></div></div>'."\n\t\t".'
	<div id="brdmenu2" class="inbox">'."\n\t\t\t". generate_navlinks2()."\n\t\t".'
	</div>';
}
$tpl_main = str_replace('<forum_status>', $tpl_temp, $tpl_main);
//-----------------------------------------------
// If announcment...
//-----------------------------------------------
if ($configuration['o_announcement'] == '1')
{
	ob_start();
?>
<div id="announce" class="block">
	<h2><span><?php echo $lang_common['Announcement'] ?></span></h2>
	<div class="box">
		<div class="inbox">
			<div><?php echo $configuration['o_announcement_message'] ?></div>
		</div>
	</div>
</div>
<?php
	$tpl_temp = trim(ob_get_contents());
	$tpl_main = str_replace('<forum_announcement>', $tpl_temp, $tpl_main);
	ob_end_clean();
}
else $tpl_main = str_replace('<forum_announcement>', '', $tpl_main);
if ($configuration['o_advertisement'] == '1')
{
	ob_start();
//-----------------------------------------------
// If advertisment...
//-----------------------------------------------
?>
<div id="advertisement" class="block">
	<h2><span><?php echo $lang_common['Advertisement'] ?></span></h2>
	<div class="box">
		<div class="inbox">
			<div><?php echo $configuration['o_advertisement_message'] ?></div>
		</div>
	</div>
</div>
<?php
	$tpl_temp = trim(ob_get_contents());
	$tpl_main = str_replace('<forum_advertisement>', $tpl_temp, $tpl_main);
	ob_end_clean();
}
else $tpl_main = str_replace('<forum_advertisement>', '', $tpl_main);
if(strpos($page_title, base64_decode("KFBvd2VyZWQgQnkgUG93ZXJCQiBGb3J1bXMp"))===false)
{
	die(base64_decode("V2VsbCBsb29rIGF0IHRoYXQuIFlvdSB0cmllZCB0byBlZGl0IFBvd2VyQkJcJ3MgY29kZS4gWW91IGtub3csIHRoaXMgaXMgaWxsZWdhbCBhbmQgeW91IGFyZSB2aW9sYXRpbmcgaW50ZXJuYXRpb25hbCBjb3B5cmlnaHQgbGF3cy4gSSByZWNvbW1lbmQgdW5kb2luZyBhbGwgY2hhbmdlcyBpbW1lZGlhdGVseS4="));
}
if ($configuration['o_information'] == '1')
{
	ob_start();
//-----------------------------------------------
// If information block...
//-----------------------------------------------
?>
<div id="information" class="block">
	<h2><span><?php echo $lang_common['Information'] ?></span></h2>
	<div class="box">
		<div class="inbox">
			<div><?php echo $configuration['o_information_message'] ?></div>
		</div>
	</div>
</div>
<?php
	$tpl_temp = trim(ob_get_contents());
	$tpl_main = str_replace('<forum_information>', $tpl_temp, $tpl_main);
	ob_end_clean();
}
else $tpl_main = str_replace('<forum_information>', '', $tpl_main);
if ($configuration['o_guest_information'] == '1' && $forum_user['g_id'] == USER_GUEST)
{
	ob_start();
//-----------------------------------------------
// if guest...
//-----------------------------------------------
?>
<div id="guestinformation" class="block">
	<h2><span><?php echo $lang_common['Guest_information'] ?></span></h2>
	<div class="box">
		<div class="inbox">
			<div><?php echo $configuration['o_guest_information_message'] ?></div>
		</div>
	</div>
</div>
<?php

	$tpl_temp = trim(ob_get_contents());
	$tpl_main = str_replace('<forum_guest_information>', $tpl_temp, $tpl_main);
	ob_end_clean();
}
else $tpl_main = str_replace('<forum_guest_information>', '', $tpl_main);
ob_start();
if(strpos($page_title, base64_decode("KFBvd2VyZWQgQnkgUG93ZXJCQiBGb3J1bXMp")) === false)
{
	die(base64_decode("UmVuYW1pbmcgUG93ZXJCQiBpcyBpbGxlZ2FsLiBVbmRvIGl0IG9yIGZhY2UgbGVnYWwgYWN0aW9uLg=="));
}
if ($_GET['v'] == "info")
{
echo 'VGhpcyBmb3J1bSBpcyBwb3dlcmVkIGJ5IFBvd2VyQkIgVjIuMi4xDQoNClRoaXMgc2NyaXB0IGFu
ZCBjb2RlIGlzIGNvcHlyaWdodCB0byBFbGkgV2hpZSwgZWxpQHBvd2Vyd2QuY29tDQpBbnkgcXVl
c3Rpb25zIG9yIGNvbmNlcm5zIG1heSBiZSBlbWFpbGVkIHRvIGhpbSwgb3IgcG9zdGVkIG9uIGh0
dHA6Ly93d3cucG93ZXJ3ZC5jb20vZm9ydW1zDQoNCi1Qb3dlciBTb2Z0d2FyZSBEZXZlbG9wbWVu
dCBUZWFt';
}
else
{
define('FORUM_HEADER', 1);
}
?>