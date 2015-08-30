<?php

	/**
	 * TimeAgo - LANGUAGE FILE.
	 *
	 * This file contains the (English - US) language definitions for
	 * the labels used in the ACP extensions tab
	 *
	 * PHP Version 5.4
	 *
	 * @category  PHP
	 *
	 * @author    MuhClaren
	 * @copyright 2015 (c) MOP
	 * @license   GNU General Public License v2
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
			'ACP_TIMEAGO_TITLE'            => 'TimeAgo',
			'ACP_TIMEAGO_GENERAL_SETTINGS' => 'General Settings',
		]
	);
