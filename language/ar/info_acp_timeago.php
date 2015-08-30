<?php

	/**
	 * TimeAgo - LANGUAGE FILE.
	 *
	 * This file contains the ( Arabic ) language definitions for
	 * the labels used in the ACP extensions tab
	 *
	 * PHP Version 5.4
	 *
	 * @category  PHP
	 *
	 * @author    MuhClaren
	 * @copyright 2015 (c) MOP
	 * @license   GNU General Public License v2
	 *
	 * Translated By : Bassel Taha Alhitary - www.alhitary.net.
	 */

	/**
	 * DO NOT CHANGE.
	 */
	if (defined('IN_PHPBB') === false)
	{
		exit;
	}

	if (empty($lang) || is_array($lang) === false)
	{
		$lang = [];
	}

	$lang = array_merge(
		$lang,
		[
			// module category and section titles
			'ACP_TIMEAGO_TITLE'            => 'التوقيت الماضي',
			'ACP_TIMEAGO_GENERAL_SETTINGS' => 'الإعدادات',
		]
	);
