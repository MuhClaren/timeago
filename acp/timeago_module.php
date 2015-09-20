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
		 * @param int    $id
		 * @param string $mode
		 */
		public function main($id, $mode)
		{
			list($error, $form_key) = $this->common_vars();

			add_form_key($form_key);

			if (empty($error) && $this->request->is_set_post('submit'))
			{
				$this->check_form_key($form_key);

				$this->set_configs();

				trigger_error($this->user->lang('CONFIG_UPDATED').adm_back_link($this->u_action));
			}

			$this->set_tpl_ary();

		}

		/**
		 * @return array
		 */
		private function common_vars()
		{
			$this->config          = $GLOBALS['config'];
			$this->user            = $GLOBALS['user'];
			$this->phpbb_root_path = $GLOBALS['phpbb_root_path'];
			$this->request         = $GLOBALS['request'];
			$this->template        = $GLOBALS['template'];
			$this->user->add_lang('acp/common');
			$this->user->add_lang_ext('mop/timeago', 'timeago_acp');
			$error            = '';
			$this->tpl_name   = 'acp_ta_general';
			$this->page_title = $this->user->lang('ACP_TIMEAGO_GENERAL_SETTINGS');
			$form_key         = 'acp_ta_general';

			return [$error, $form_key];
		}

		/**
		 * @param $form_key
		 */
		private function check_form_key($form_key)
		{
			if (check_form_key($form_key) === false)
			{
				trigger_error($this->user->lang('FORM_INVALID').adm_back_link($this->u_action), E_USER_WARNING);
			}
		}

		private function set_configs()
		{
			$this->config->set('ta_cat', $this->request->variable('ta_cat', 1));
			$this->config->set('ta_cat_extended', $this->request->variable('ta_cat_extended', 0));
			$this->config->set('ta_viewforum', $this->request->variable('ta_viewforum', 1));
			$this->config->set('ta_viewforum_extended', $this->request->variable('ta_viewforum_extended', 0));
			$this->config->set('ta_viewtopic', $this->request->variable('ta_viewtopic', 1));
			$this->config->set('ta_viewtopic_extended', $this->request->variable('ta_viewtopic_extended', 0));
			$this->config->set('ta_timer', $this->request->variable('ta_timer', 0));
		}

		private function set_tpl_ary()
		{
// set the template variables
			$this->template->assign_vars(
				[
					'TA_FORUM_ROOT'         => $this->phpbb_root_path,
					'TA_CAT'                => !empty($this->config['ta_cat']) ? $this->config['ta_cat'] : 0,
					'TA_CAT_EXTENDED'       => !empty($this->config['ta_cat_extended']) ? true : false,
					'TA_VIEWFORUM'          => !empty($this->config['ta_viewforum']) ? $this->config['ta_viewforum'] : 0,
					'TA_VIEWFORUM_EXTENDED' => !empty($this->config['ta_viewforum_extended']) ? true : false,
					'TA_VIEWTOPIC'          => !empty($this->config['ta_viewtopic']) ? $this->config['ta_viewtopic'] : 0,
					'TA_VIEWTOPIC_EXTENDED' => !empty($this->config['ta_viewtopic_extended']) ? true : false,
					'TA_TIMER'              => !empty($this->config['ta_timer']) ? $this->config['ta_timer'] : 0,
					'U_ACTION'              => $this->u_action,
				]
			);
		}
	}
