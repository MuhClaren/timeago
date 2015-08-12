<?php
/**
 * TimeAgo - Config Data & ACP Settings module
 *
 * PHP Version 5.4
 *
 * @category  PHP
 * @package   timeago
 * @author    MuhClaren
 * @copyright 2015 (c) MOP
 * @license   GNU General Public License v2
 */

namespace mop\timeago\migrations\v1_0_0;

/**
 * Class initial
 *
 * @package mop\timeago\migrations
 */
class initial extends \phpbb\db\migration\migration
{

	/**
	 * Initial config settings & ACP module
	 *
	 * @return array
	 */
	public function update_data()
	{
		return [
			['config.add', ['ta_active', 1]],
			['config.add', ['ta_version', '1.2.0']],
			['config.add', ['ta_cat', 2]],
			['config.add', ['ta_cat_extended', 0]],
			['config.add', ['ta_viewforum', 2]],
			['config.add', ['ta_viewforum_extended', 0]],
			['config.add', ['ta_viewtopic', 2]],
			['config.add', ['ta_viewtopic_extended', 1]],
			['module.add', ['acp', 'ACP_CAT_DOT_MODS', 'ACP_TIMEAGO_TITLE']],
			['module.add', ['acp', 'ACP_TIMEAGO_TITLE', ['module_basename' => '\mop\timeago\acp\timeago_module', 'modes' => ['general'],],]],
		];

	}

	/**
	 * Remove FrontPage config data & module
	 *
	 * @return array
	 */
	public function revert_data()
	{
		return [
			['config.remove', ['ta_active']],
			['config.remove', ['ta_version']],
			['config.remove', ['ta_cat']],
			['config.remove', ['ta_cat_extended']],
			['config.remove', ['ta_viewforum']],
			['config.remove', ['ta_viewforum_extended']],
			['config.remove', ['ta_viewtopic']],
			['config.remove', ['ta_viewtopic_extended']],
			['module.remove', ['acp', 'ACP_CAT_DOT_MODS', 'ACP_TIMEAGO_TITLE']],
			['module.remove', ['acp', 'ACP_TIMEAGO_TITLE', ['module_basename' => '\mop\timeago\acp\timeago_module', 'modes' => ['general'],],]],
		];
	}
}
