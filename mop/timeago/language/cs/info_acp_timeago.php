<?php
/**
 * TimeAgo - LANGUAGE FILE
 *
 * This file contains the Czech language definitions for
 * the labels used in the ACP extensions tab
 *
 * PHP Version 5.4
 *
 * @category  PHP
 * @package   timeago
 * @author    MuhClaren
 * @copyright 2015 (c) MOP
 * @license   GNU General Public License v2
 */
/**
 * DO NOT CHANGE
 */
if (defined('IN_PHPBB') === FALSE)
{
	exit;
}
if (empty($lang) || is_array($lang) === FALSE)
{
	$lang = [];
}
$lang = array_merge(
	$lang,
	[
		// module category and section titles
		'ACP_TIMEAGO_TITLE'            => 'TimeAgo',
		'ACP_TIMEAGO_GENERAL_SETTINGS' => 'Obecné nastavení',
	]
);
