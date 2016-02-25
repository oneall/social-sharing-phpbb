<?php
/**
 * @package   	OneAll Social Login
 * @copyright 	Copyright 2013-2016 http://www.oneall.com - All rights reserved.
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
namespace oneall\socialsharing\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Event listener
 */
class listener implements EventSubscriberInterface
{
	// @var \phpbb\config\config
	protected $config;

	// @var \phpbb\config\db_text
	protected $config_text;

	// @var \phpbb\controller\helper
	protected $controller_helper;

	// @var \phpbb\request\request
	protected $request;

	// @var \phpbb\template\template
	protected $template;

	// @var \phpbb\user
	protected $user;
	
	// @var \phpbb\event\dispatcher_interface
	protected $dispatcher;

	// @var string php_root_path
	protected $phpbb_root_path;

	// @var string phpEx
	protected $php_ext;


	/**
	 * Constructor
	 */
	public function __construct (
			\phpbb\config\config $config,
			\phpbb\config\db_text $config_text,
			\phpbb\controller\helper $controller_helper,
			\phpbb\request\request $request,
			\phpbb\template\template $template,
			\phpbb\user $user,
			\phpbb\event\dispatcher_interface $dispatcher, 
			$phpbb_root_path, $php_ext)
	{
		$this->config = $config;
		$this->config_text = $config_text;
		$this->controller_helper = $controller_helper;
		$this->request = $request;
		$this->template = $template;
		$this->user = $user;
		$this->dispatcher = $dispatcher;
		$this->phpbb_root_path = $phpbb_root_path;
		$this->php_ext = $php_ext;
	}

	/**
	 * Subscribe to events.
	 */
	static public function getSubscribedEvents ()
	{
		return array (
				'core.page_header_after' => 'configure_icons',
				'core.user_setup' => 'add_language'
		);
	}

	/**
	 * Configure the Social Sharing Icons.
	 */
	public function configure_icons ($event)
	{
		// Required configuration to display icons:
		if (!empty ($this->config['oa_social_sharing_disable']) 
			or empty ($this->config['oa_social_sharing_api_subdomain'])
			or empty ($this->config['oa_social_sharing_providers'])
		) 
		{
			$this->template->assign_var ('OA_SOCIAL_SHARING_EMBED_LIBRARY', 0);
			$this->template->assign_var ('OA_SOCIAL_SHARING_EMBED_ICONS', 0);
			return;
		}
		// We're displaying the icons.
		$this->template->assign_var ('OA_SOCIAL_SHARING_EMBED_ICONS', 1);
		// Do not load the library if Social Login loaded it:
		if (empty ($this->config ['oa_social_login_disable']) && 
			!empty ($this->config ['oa_social_login_api_subdomain']))
		{
			$this->template->assign_var ('OA_SOCIAL_SHARING_EMBED_LIBRARY', 0);
		}
		else 
		{
			$this->template->assign_var ('OA_SOCIAL_SHARING_EMBED_LIBRARY', 1);	
		}
		$this->template->assign_var ('OA_SOCIAL_SHARING_SUBDOMAIN', $this->config ['oa_social_sharing_api_subdomain']);

		$all_providers = \oneall\socialsharing\acp\socialsharing_acp_module::get_providers ();
		$sel_providers = explode (',', $this->config['oa_social_sharing_providers']);
		foreach ($all_providers as $prov)
		{
			if (in_array ($prov['val'], $sel_providers))
			{
				$this->template->assign_block_vars ('oa_social_sharing_icons', array (
						'PROVIDER_BTN' => $prov['val'],
						'PROVIDER_LBL' => $prov['lbl']
				));
			}
		}
		$this->template->assign_var ('OA_SOCIAL_SHARING_CAPTION', 
				empty ($this->config ['oa_social_sharing_caption']) ? '' : $this->config ['oa_social_sharing_caption']);
		// Disabled values stored in config.
		$this->template->assign_var ('OA_SOCIAL_SHARING_PAGEBODYAFTER',
				empty ($this->config ['oa_social_sharing_pagebodyafter_disable']) ? 1 : 0);
		$this->template->assign_var ('OA_SOCIAL_SHARING_HEADERBEFORE',
				empty ($this->config ['oa_social_sharing_headercontentbefore_disable']) ? 1 : 0);
		$this->template->assign_var ('OA_SOCIAL_SHARING_TOPICCONTACT',
				empty ($this->config ['oa_social_sharing_viewtopicbodycontactfields_disable']) ? 1 : 0);
		$this->template->assign_var ('OA_SOCIAL_SHARING_TOPICPAGIN',
				empty ($this->config ['oa_social_sharing_viewtopicpaginationtopafter_disable']) ? 1 : 0);
		$this->template->assign_var ('OA_SOCIAL_SHARING_TOPICCUSTOM',
				empty ($this->config ['oa_social_sharing_viewtopicdropdownbottomcustom_disable']) ? 1 : 0);
		$this->template->assign_var ('OA_SOCIAL_SHARING_BTNS',
				empty ($this->config ['oa_social_sharing_btns']) ? 'btn_s' : $this->config ['oa_social_sharing_btns']);
		$this->template->assign_var ('OA_SOCIAL_SHARING_OPT',
				empty ($this->config ['oa_social_sharing_insight_disable']) ? 1 : 0);
	}
	
	/**
	 * Add Social Sharing language file.
	 */
	public function add_language ($event)
	{
		// Read language settings.
		$lang_set_ext = $event['lang_set_ext'];

		// Add frontend language strings.
		$lang_set_ext[] = array(
				'ext_name' => 'oneall/socialsharing',
				'lang_set' => 'frontend'
		);

		// Add backend language strings.
		$lang_set_ext[] = array(
				'ext_name' => 'oneall/socialsharing',
				'lang_set' => 'backend'
		);

		// Set language settings.
		$event['lang_set_ext'] = $lang_set_ext;
	}

}
