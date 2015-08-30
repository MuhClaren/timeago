<?php
/**
 * TimeAgo - Admin Control Panel Module Info
 *
 * PHP Version 5.4
 *
 * @category  PHP
 * @package   timeago
 * @author    MuhClaren
 * @copyright 2015 (c) MOP
 * @license   GNU General Public License v2
 */

namespace mop\timeago\acp;

/**
 * Module Information
 */
class timeago_info
{
	/**
	 * ACP settings module
	 *
	 * @return array
	 */
	public function module()
	{
		return [
			'filename' => '\mop\timeago\acp\timeago_module',
			'title'    => 'ACP_TIMEAGO_TITLE',
			'modes'    => [
				'general'      => [
					'title' => 'ACP_TIMEAGO_GENERAL_SETTINGS',
					'auth'  => 'ext_mop/timeago && acl_a_board',
					'cat'   => ['ACP_timeago_TITLE']
				],
			],
		];
	}

}
