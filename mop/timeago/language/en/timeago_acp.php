<?php
/**
 * TimeAgo - LANGUAGE FILE
 *
 * This file contains the (English - British) language definitions for
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
		// define the characters of the language used for plurals. For example, english uses "s" to indicate more than one day (days).
		'TA_PLURAL_CHARS'             => 's',
		// common lang variables
		'TA_SECOND'                   => 'second',
		'TA_MINUTE'                   => 'minute',
		'TA_HOUR'                     => 'hour',
		'TA_DAY'                      => 'day',
		'TA_WEEK'                     => 'week',
		'TA_MONTH'                    => 'month',
		'TA_YEAR'                     => 'year',
		'TA_DECADE'                   => 'decade',
		'TA_OFF'                      => 'Off',
		'TA_SHORT'                    => 'Short (1 Year Ago)',
		'TA_MEDIUM'                   => 'Medium (1 Year 2 Months Ago)',
		'TA_FULL'                     => 'Full (1 Year 2 Months 3 Days Ago)',
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
		'TA_EXTENDED_EXAMPLE'         => '(E.g. 9 Hours Ago (Sat Aug 08, 2015 11:57 am))',
		'TA_DETAIL'                   => 'Detail Level',
	]
);
