<?php
/*switch (PHP_OS)
{
	case 'WINNT':
	case 'WIN32':
		$locale = 'english';
		break;
	case 'FreeBSD':
	case 'NetBSD':
	case 'OpenBSD':
		$locale = 'en_US.US-ASCII';
		break;
	default:
		$locale = 'en_US';
		break;
}
setlocale(LC_CTYPE, $locale);*/
$lang_common = array(
'lang_direction'			=>	'ltr',
'lang_encoding'			=>	'iso-8859-1',
'Online List'			=>	'Online List',
'Statistics'			=>	'Statistics',
'lang_multibyte'			=>	true,
'Advertisement'			=>	'Advertisement',
'Information'			=>	'Information',
'Guest_information'		=>	'Register to remove this pesky message!',
'Image_Upload'			=>	'Image Upload',
'Uploaded_Images'			=>	'Uploaded Images',
'image_upload_show'		=>	'Show',
'image_upload_slots'		=>	'Upload Slots',
'image_upload_limits'		=>	'Limits',
'image_upload_limits2'		=> 	'images per post, each image must be less then',
'image_upload_pixels'		=> 	'pixels and',
'Previous Image'			=> 	'Previous Image',
'Back to Topic'			=> 	'Back to Topic',
'Next Image'			=> 	'Next Image',
'Upload Results'			=> 	'Image Upload Results',
'Extension Banned'		=> 	'is not allowed',
'Size Too Big'			=> 	'exceeds maximum file size',
'Dim Too Big'			=> 	'exceeds maximum image dimensions',
'Downloads'				=> 	'Downloads',
'Uploaded'				=> 	'Uploaded',
'Images'				=> 	'Images',
'Bad request'			=>	'Bad request. The link you followed is incorrect or outdated.',
'No view'				=>	'You do not have permission to view these forums.',
'No permission'			=>	'You do not have permission to access this page.',
'Bad referrer'			=>	'Bad HTTP_REFERER. You were referred to this page from an unauthorized source. If the problem persists please make sure that \'Base URL\' is correctly set in Admin/Board configuration and that you are visiting the forum by navigating to that URL. More information regarding the referrer check can be found in the PowerBB Forum documentation.',
'New icon'				=>	'There are new posts',
'Normal icon'			=>	'<!-- -->',
'Print version'			=>	'Printable version',
'Closed icon'			=>	'This topic is closed',
'Redirect icon'			=>	'Redirected forum',
'Announcement'			=>	'Announcement',
'Options'				=>	'Options',
'Actions'				=>	'Actions',
'Submit'				=>	'Submit',
'Ban message'			=>	'You are banned from this forum.',
'Ban message 2'			=>	'The ban expires at the end of',
'Ban message 3'			=>	'The administrator or moderator that banned you left the following message:',
'Ban message 4'			=>	'Please direct any inquiries to the forum administrator at',
'Never'				=>	'Never',
'Today'				=>	'Today',
'Yesterday'				=>	'Yesterday',
'Yes'					=>	'Yes',
'No'					=>	'No',
'Info'				=>	'Info',
'Go back'				=>	'Go back',
'Maintenance'			=>	'Site is offline',
'Redirecting'			=>	'Redirecting',
'Click redirect'			=>	'Click here if you do not want to wait any longer (or if your browser does not automatically forward you)',
'on'					=>	'on',
'off'					=>	'off',
'Signatures'			=>	'Signatures',
'Invalid e-mail'			=>	'The e-mail address you entered is invalid.',
'required field'			=>	'is a required field in this form.',
'Last post'				=>	'Last post',
'by'					=>	'by',
'New posts'				=>	'New&nbsp;posts',
'New posts info'			=>	'Go to the first new post in this topic.',
'Username'				=>	'Username',
'Password'				=>	'Password',
'E-mail'				=>	'E-mail',
'Send e-mail'			=>	'Send e-mail',
'Moderated by'			=>	'Moderators',
'Subforums'				=>	'Subforums',
'Registered'			=>	'Registered',
'Subject'				=>	'Subject',
'Message'				=>	'Message',
'Topic'				=>	'Topic',
'Poll'                    	=>    'Polls',
'Forum'				=>	'Forum',
'Posts'				=>	'Posts',
'Replies'				=>	'Replies',
'Author'				=>	'Author',
'Pages'				=>	'Pages',
'BBCode'				=>	'BBCode',
'img tag'				=>	'[img] tag',
'Smilies'				=>	'Smilies',
'and'					=>	'and',
'Image link'			=>	'image',
'wrote'				=>	'wrote',
'Code'				=>	'Code',
'Mailer'				=>	'Mailer',
'Important information'		=>	'Important information',
'Write message legend'		=>	'Write your message and submit',
'Title'				=>	'Title',
'Member'				=>	'Member',
'Moderator'				=>	'Moderator',
'Administrator'			=>	'Administrator',
'Banned'				=>	'Banned',
'Guest'				=>	'Guest',
'BBCode error'			=>	'The BBCode syntax in the message is incorrect.',
'BBCode error 1'			=>	'Missing start tag for [/quote].',
'BBCode error 2'			=>	'Missing end tag for [code].',
'BBCode error 3'			=>	'Missing start tag for [/code].',
'BBCode error 4'			=>	'Missing one or more end tags for [quote].',
'BBCode error 5'			=>	'Missing one or more start tags for [/quote].',
'Index'				=>	'Index',
'User list'				=>	'User List',
'Rules'				=>  	'Rules',
'Search'				=>  	'Search',
'Register'				=>  	'Register',
'Login'				=>  	'Login',
'Not logged in'			=>  	'You are not logged in.',
'Profile'				=>	'Profile',
'Logout'				=>	'Logout',
'Logged in as'			=>	'Logged in as',
'Admin'				=>	'Admin',
'Last visit'			=>	'Last visit',
'Show new posts'			=>	'Show new posts since last visit',
'Mark all as read'		=>	'Mark all topics as read',
'Mark forum as read'		=>	'Mark this forum as read',
'Link separator'			=>	'',
'Board footer'			=>	'Board footer',
'Search links'			=>	'Search links',
'Show recent posts'		=>	'Show recent posts',
'Show unanswered posts'		=>	'Show unanswered posts',
'Show your posts'			=>	'Show your posts',
'Show subscriptions'		=>	'Show your subscribed topics',
'Jump to'				=>	'Jump to',
'MyProfile'				=>	'My Profile',
'Go'					=>	' Go ',
'Move topic'			=>  	'Move topic',
'Open topic'			=>  	'Open topic',
'Close topic'			=>  	'Close topic',
'Unstick topic'			=>  	'Unstick topic',
'Stick topic'			=>  	'Stick topic',
'Valide topic'			=>  	'Validate the post', 
'Password Protected'		=>	'This forum is password protected',
'No Forum Auth'			=>	'You supplied an invalid password.',
'User map'				=> 	'User Map',
'Moderate forum'			=>	'Moderate forum',
'Delete posts'			=>	'Delete multiple posts',
'Debug table'			=>	'Debug information',
'RSS Desc Active'			=>	'The most recently active topics at',
'RSS Desc New'			=>	'The newest topics at',
'Posted'				=>	'Posted'
);