<?php

	/**
	 * TimeAgo - Admin Control Panel - General Settings Module.
	 *
	 * PHP Version 5.4
	 *
	 * @category  PHP
	 *
	 * @author    MuhClaren
	 * @copyright 2015 (c) MOP
	 * @license   GNU General Public License v2
	 */
	namespace mop\timeago\acp;

	/**
	 * Class timeago_module.
	 *
	 * @property string tpl_name
	 * @property mixed  page_title
	 */
	class timeago_module
	{
		/** @var \phpbb\config\config */
		protected $config;

		/** @var \phpbb\db\driver\driver_interface */
		protected $db;

		/** @var string */
		protected $phpbb_root_path;

		/** @var \phpbb\request\request_interface */
		protected $request;

		/** @var \phpbb\template\template */
		protected $template;

		/** @var \phpbb\user */
		protected $user;

		/** @var $u_action */
		public $u_action;

		/**
		 * Main ACP module.
		 *
		 */
		public function main()
		{
			$this->config          = $GLOBALS['config'];
			$this->user            = $GLOBALS['user'];
			$this->phpbb_root_path = $GLOBALS['phpbb_root_path'];
			$this->request         = $GLOBALS['request'];
			$this->template        = $GLOBALS['template'];

			$this->user->add_lang('acp/common');
			$this->user->add_lang_ext('mop/timeago', 'timeago_acp');

			$this->tpl_name   = 'acp_ta_general';
			$this->page_title = $this->user->lang('ACP_TIMEAGO_GENERAL_SETTINGS');

			$form_key         = 'acp_ta_general';
			add_form_key($form_key);

			// populate our config values
			$this->set_config($form_key);

			// set the template variables
			$this->set_template_ary();
		}

		/**
		 * @param string $form_key
		 */
		private function set_config($form_key)
		{
			if ($this->request->is_set_post('submit'))
			{
				if (check_form_key($form_key) === false)
				{
					trigger_error($this->user->lang('FORM_INVALID').adm_back_link($this->u_action), E_USER_WARNING);
				}

				$this->config->set('ta_cat', $this->request->variable('ta_cat', 1));
				$this->config->set('ta_cat_extended', $this->request->variable('ta_cat_extended', 0));
				$this->config->set('ta_viewforum', $this->request->variable('ta_viewforum', 1));
				$this->config->set('ta_viewforum_extended', $this->request->variable('ta_viewforum_extended', 0));
				$this->config->set('ta_viewtopic', $this->request->variable('ta_viewtopic', 1));
				$this->config->set('ta_viewtopic_extended', $this->request->variable('ta_viewtopic_extended', 0));
				$this->config->set('ta_timer', $this->request->variable('ta_timer', 0));

				trigger_error($this->user->lang('CONFIG_UPDATED').adm_back_link($this->u_action));
			}
		}

		private function set_template_ary()
		{
			$this->template->assign_vars(
				[
					'TA_FORUM_ROOT'         => $this->phpbb_root_path,
					'TA_CAT'                => !empty($this->config['ta_cat']) ? $this->config['ta_cat'] : 0,
					'TA_CAT_EXTENDED'       => $this->config['ta_cat_extended'],
					'TA_VIEWFORUM'          => !empty($this->config['ta_viewforum']) ? $this->config['ta_viewforum'] : 0,
					'TA_VIEWFORUM_EXTENDED' => $this->config['ta_viewforum_extended'],
					'TA_VIEWTOPIC'          => !empty($this->config['ta_viewtopic']) ? $this->config['ta_viewtopic'] : 0,
					'TA_VIEWTOPIC_EXTENDED' => $this->config['ta_viewtopic_extended'],
					'TA_TIMER'              => !empty($this->config['ta_timer']) ? $this->config['ta_timer'] : 0,
					'U_ACTION'              => $this->u_action,
				]
			);
		}
	}
