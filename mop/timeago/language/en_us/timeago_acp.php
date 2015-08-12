<?php
/**
 * TimeAgo - LANGUAGE FILE
 *
 * This file contains the (English - US) language definitions for
 * the labels and explanations text used in the admin control panel
 * TimeAgo Extension Settings module.
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
		// Set the plurals - <key> => 'plural string' where <key> is the unit count, such as number of days
		'TA_SECOND'                   => [0 => 'seconds', 1 => 'second', 2 => 'seconds', 3 => 'seconds', 4 => 'seconds',],
		'TA_MINUTE'                   => [0 => 'minutes', 1 => 'minute', 2 => 'minutes', 3 => 'minutes', 4 => 'minutes',],
		'TA_HOUR'                     => [0 => 'hours', 1 => 'hour', 2 => 'hours', 3 => 'hours', 4 => 'hours',],
		'TA_DAY'                      => [0 => 'days', 1 => 'day', 2 => 'days', 3 => 'days', 4 => 'days',],
		'TA_WEEK'                     => [0 => 'weeks', 1 => 'week', 2 => 'weeks', 3 => 'weeks', 4 => 'weeks',],
		'TA_MONTH'                    => [0 => 'months', 1 => 'month', 2 => 'months', 3 => 'months', 4 => 'months',],
		'TA_YEAR'                     => [0 => 'Years', 1 => 'Year', 2 => 'Years', 3 => 'Years', 4 => 'Years',],
		'TA_DECADE'                   => [0 => 'decades', 1 => 'decade', 2 => 'decades', 3 => 'decades', 4 => 'decades',],
		'TA_AGO'                      => 'ago',
		'TA_OFF'                      => 'Off',
		'TA_SHORT'                    => 'Short (1 year ago)',
		'TA_MEDIUM'                   => 'Medium (1 year 2 months ago)',
		'TA_FULL'                     => 'Full (1 year 2 months 3 days ago)',
		// general settings
		'TA_GENERAL_SETTINGS'         => 'General Settings',
		'TA_GENERAL_SETTINGS_EXPLAIN' => 'Configure TimeAgo settings',
		'TA_DISPLAY_SETTINGS'         => 'TimeAgo Format Options',
		'TA_CAT'                      => 'index.php',
		'TA_CAT_EXPLAIN'              => 'Applies TimeAgo on the Category Forums List for "Last Post"',
		'TA_VIEWFORUM'                => 'viewforum.php',
		'TA_VIEWFORUM_EXPLAIN'        => 'Applies TimeAgo on the list of topics in forum view',
		'TA_VIEWTOPIC'                => 'viewtopic.php',
		'TA_VIEWTOPIC_EXPLAIN'        => 'Applies TimeAgo in each post',
		'TA_EXTENDED'                 => 'Extend',
		'TA_EXTENDED_EXPLAIN'         => 'Add the native phpBB timestamp to the end of TimeAgo.',
		'TA_EXTENDED_EXAMPLE'         => '(E.g. 9 hours ago (Sat Aug 08, 2015 11:57 am))',
		'TA_DETAIL'                   => 'Detail Level',
	]
);
