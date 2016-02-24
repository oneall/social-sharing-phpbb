<?php
/**
 * @package   	OneAll Social Sharing
 * @copyright 	Copyright 2013-2015 http://www.oneall.com - All rights reserved.
 * @license   	GNU/GPL 2 or later
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307,USA.
 *
 * The "GNU General Public License" (GPL) is available at
 * http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 */
if (! defined ('IN_PHPBB'))
{
	exit ();
}

if (empty ($lang) || ! is_array ($lang))
{
	$lang = array ();
}

// Social Sharing Backend.
$lang = array_merge ($lang, array (
	'OA_SOCIAL_SHARING_ACP' => 'OneAll Social Sharing Settings',
	'OA_SOCIAL_SHARING_ACP_SETTINGS' => 'Settings',
	'OA_SOCIAL_SHARING_API_CHANGE_SUBDOMAIN' => ' (not found!)',
	'OA_SOCIAL_SHARING_API_CONNECTION' => 'API Connection',
	'OA_SOCIAL_SHARING_API_CONNECTION_HANDLER' => 'API Connection Handler',
	'OA_SOCIAL_SHARING_API_CONNECTION_HANDLER_DESC' => 'OneAll is a connexion manager to the API of the Social Medias',
	'OA_SOCIAL_SHARING_API_CREDENTIALS_CHECK_COM' => 'Could not contact API. Is the API connection setup properly?',
	'OA_SOCIAL_SHARING_API_CREDENTIALS_FILL_OUT' => 'Please enter a subdomain name.',
	'OA_SOCIAL_SHARING_API_CREDENTIALS_KEYS_WRONG' => 'The API credentials are wrong, please check your public/private key.',
	'OA_SOCIAL_SHARING_API_CREDENTIALS_OK' => 'The settings are correct - do not forget to save your changes!',
	'OA_SOCIAL_SHARING_API_CREDENTIALS_SUBDOMAIN_WRONG' => 'The subdomain does not exist. Have you filled it out correctly?',
	'OA_SOCIAL_SHARING_API_CREDENTIALS_TITLE' => 'API Credentials - <a href="https://app.oneall.com/applications/" class="external">Click here to create or view your API Credentials</a>',
	'OA_SOCIAL_SHARING_API_CREDENTIALS_UNKNOW_ERROR' => 'Unknow response - please make sure that you are logged in!',
	'OA_SOCIAL_SHARING_API_CREDENTIALS_USE_AUTO' => 'The connection handler does not seem to work. Please use the Autodetection.',
	'OA_SOCIAL_SHARING_API_SUBDOMAIN' => 'OneAll API Subdomain',
	'OA_SOCIAL_SHARING_API_SUBDOMAIN_DESC' => 'Enter your OneAll application subdomain.',
	'OA_SOCIAL_SHARING_API_VERIFY' => 'Verify API Subdomain',
	'OA_SOCIAL_SHARING_BUTTONS' => 'Style for icons',
	'OA_SOCIAL_SHARING_BUTTONS_DESC' => 'Choose the style for the icons.',
	'OA_SOCIAL_SHARING_CAPTION' => 'Caption for Sharing icons',
	'OA_SOCIAL_SHARING_CAPTION_DEFAULT' => 'Share with',
	'OA_SOCIAL_SHARING_CAPTION_DESC' => 'This title will be displayed above the Social Sharing icons.',
	'OA_SOCIAL_SHARING_CREATE_ACCOUNT_FIRST' => 'To be able to use Social Sharing, you first need to create a free account at <a href="https://app.oneall.com/signup/" class="external">http://www.oneall.com</a> and setup a Site.',
	'OA_SOCIAL_SHARING_DEFAULT' => 'Default',
	'OA_SOCIAL_SHARING_DISCOVER_PLUGINS' => '<a href="http://docs.oneall.com/plugins/" class="external">Discover</a> our turnkey plugins for WordPress, Drupal, OpenCart and more;',
	'OA_SOCIAL_SHARING_DISPLAY_LOC' => 'Where do you want to show the Social Sharing icons?',
	'OA_SOCIAL_SHARING_DISPLAY_PARAMS' => 'Configure the icons',		
	'OA_SOCIAL_SHARING_DO_ENABLE' => 'Enable Social Sharing?',
	'OA_SOCIAL_SHARING_DO_ENABLE_DESC' => 'Allows you to temporarily disable Social Sharing without having to remove it.',
	'OA_SOCIAL_SHARING_DO_ENABLE_NO' => 'Disable',
	'OA_SOCIAL_SHARING_DO_ENABLE_YES' => 'Enable',
	'OA_SOCIAL_SHARING_ENABLE_NETWORKS' => 'Choose the social networks to share to on your forum',
	'OA_SOCIAL_SHARING_ENABLE_SOCIAL_NETWORK' => 'You have to enable at least one social network',
	'OA_SOCIAL_SHARING_ENTER_CREDENTIALS' => 'You have to setup your API credentials',
	'OA_SOCIAL_SHARING_FOLLOW_US_TWITTER' => '<a href="http://www.twitter.com/oneall" class="external">Follow us</a> on Twitter to stay informed about updates;',
	'OA_SOCIAL_SHARING_GET_HELP' => '<a href="http://www.oneall.com/company/contact-us/" class="external">Contact us</a> if you have feedback or need assistance!',
	'OA_SOCIAL_SHARING_HEADERCONTENTBEFORE' => 'Show in the header?',
	'OA_SOCIAL_SHARING_HEADERCONTENTBEFORE_DESC' => 'If enabled, Social Sharing icons will be displayed in the header of every page.',
	'OA_SOCIAL_SHARING_HEADERCONTENTBEFORE_NO' => 'No',
	'OA_SOCIAL_SHARING_HEADERCONTENTBEFORE_YES' => 'Yes, show in the header',
	'OA_SOCIAL_SHARING_INSIGHT' => 'Enable Social Insights to measure referral traffic?',
	'OA_SOCIAL_SHARING_INSIGHT_DESC' => 'See <a href="https://docs.oneall.com/api/resources/sharing-analytics/">https://docs.oneall.com/api/resources/sharing-analytics/</a>',
	'OA_SOCIAL_SHARING_INSIGHT_NO' => 'No',
	'OA_SOCIAL_SHARING_INSIGHT_YES' => 'Yes (involves URI conversion to OneAll shortened URI)',
	'OA_SOCIAL_SHARING_INTRO' => 'Share pages with social networks like Twitter, Facebook, LinkedIn, VKontakte, Google and Yahoo amongst others.',
	'OA_SOCIAL_SHARING_PAGEBODYAFTER' => 'Show in the footer?',
	'OA_SOCIAL_SHARING_PAGEBODYAFTER_DESC' => 'If enabled, Social Sharing icons will be displayed in the footer of every page.',
	'OA_SOCIAL_SHARING_PAGEBODYAFTER_NO' => 'No',
	'OA_SOCIAL_SHARING_PAGEBODYAFTER_YES' => 'Yes, show in the footer',
	'OA_SOCIAL_SHARING_PREVIEW' => 'Preview for the sharing icons',
	'OA_SOCIAL_SHARING_PROFILE_TITLE' => 'Social Sharing',
	'OA_SOCIAL_SHARING_READ_DOCS' => '<a href="http://docs.oneall.com/plugins/" class="external">Read</a> the online documentation for more information about this plugin;',
	'OA_SOCIAL_SHARING_SETTINGS' => 'Settings',
	'OA_SOCIAL_SHARING_SETTINGS_UPDATED' => 'Settings updated successfully.',
	'OA_SOCIAL_SHARING_SETUP_FREE_ACCOUNT' => '<a href="https://app.oneall.com/signup/" class="button1 external">Setup my free account</a>',
	'OA_SOCIAL_SHARING_TITLE' => 'OneAll Social Sharing',
	'OA_SOCIAL_SHARING_TITLE_HELP' => 'Help, Updates &amp; Documentation',
	'OA_SOCIAL_SHARING_VIEW_CREDENTIALS' => '<a href="https://app.oneall.com/applications/" class="button1 external">Create and view my API Credentials</a>',
	'OA_SOCIAL_SHARING_VIEWTOPICBODYCONTACTFIELDS' => 'Show in topic page after contact fields?',
	'OA_SOCIAL_SHARING_VIEWTOPICBODYCONTACTFIELDS_DESC' => 'If enabled, Social Sharing icons will be displayed after the contacts fields on the topic page.',
	'OA_SOCIAL_SHARING_VIEWTOPICBODYCONTACTFIELDS_NO' => 'No',
	'OA_SOCIAL_SHARING_VIEWTOPICBODYCONTACTFIELDS_YES' => 'Yes, show in topic page, after contact fields',
	'OA_SOCIAL_SHARING_VIEWTOPICPAGINATIONAFTER' => 'Show at the top of topic page?',
	'OA_SOCIAL_SHARING_VIEWTOPICPAGINATIONAFTER_DESC' => 'If enabled, Social Sharing icons will be displayed before topic content.',
	'OA_SOCIAL_SHARING_VIEWTOPICPAGINATIONAFTER_NO' => 'No',
	'OA_SOCIAL_SHARING_VIEWTOPICPAGINATIONAFTER_YES' => 'Yes, show at the top of topic page',
	'OA_SOCIAL_SHARING_VIEWTOPICDROPDOWNBOTTOMCUSTOM' => 'Show at the bottom of topic page?',
	'OA_SOCIAL_SHARING_VIEWTOPICDROPDOWNBOTTOMCUSTOM_DESC' => 'If enabled, Social Sharing icons will be displayed after topic content.',
	'OA_SOCIAL_SHARING_VIEWTOPICDROPDOWNBOTTOMCUSTOM_NO' => 'No',
	'OA_SOCIAL_SHARING_VIEWTOPICDROPDOWNBOTTOMCUSTOM_YES' => 'Yes, show at the bottom of topic page',
	'OA_SOCIAL_SHARING_WIDGET_TITLE' => 'Login with a social network',
));
