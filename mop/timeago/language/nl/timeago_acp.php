<?php
/**
 * TimeAgo - NL LANGUAGE FILE
 *
 * This file contains the (Dutch - NL) language definitions for
 * the labels used in the ACP extensions tab. Translation provided by
 * Svennson <https://www.phpbb.com/community/memberlist.php?mode=viewprofile&u=187939>
 *
 * PHP Version 5.4
 *
 * @category    PHP
 * @package     timeago
 * @author      MuhClaren
 * @copyright   2015 (c) MOP
 * @license     GNU General Public License v2
 * @translation SvennD
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
		'TA_SECOND'                   => [0 => 'seconden', 1 => 'seconde', 2 => 'seconden', 3 => 'seconden', 4 => 'seconden',],
		'TA_MINUTE'                   => [0 => 'minuuten', 1 => 'minuut', 2 => 'minuuten', 3 => 'minuuten', 4 => 'minuuten',],
		'TA_HOUR'                     => [0 => 'uuren', 1 => 'uur', 2 => 'uuren', 3 => 'uuren', 4 => 'uuren',],
		'TA_DAY'                      => [0 => 'dagen', 1 => 'dag', 2 => 'dagen', 3 => 'dagen', 4 => 'dagen',],
		'TA_WEEK'                     => [0 => 'weeks', 1 => 'week', 2 => 'weeks', 3 => 'weeks', 4 => 'weeks',],
		'TA_MONTH'                    => [0 => 'maanden', 1 => 'maand', 2 => 'maanden', 3 => 'maanden', 4 => 'maanden',],
		'TA_YEAR'                     => [0 => 'jaaren', 1 => 'jaar', 2 => 'jaaren', 3 => 'jaaren', 4 => 'jaaren',],
		'TA_DECADE'                   => [0 => 'decenniumen', 1 => 'decennium', 2 => 'decenniumen', 3 => 'decenniumen', 4 => 'decenniumen',],
		'TA_AGO'                      => 'geleden',
		'TA_OFF'                      => 'Uit',
		'TA_SHORT'                    => 'Kort (1 jaar geleden)',
		'TA_MEDIUM'                   => 'Gemiddeld (1 jaren 2 maanden geleden)',
		'TA_FULL'                     => 'Volledig (1 jaar 2 maanden 3 dagen geleden)',
		// general settings
		'TA_GENERAL_SETTINGS'         => 'Algemene Instellingen',
		'TA_GENERAL_SETTINGS_EXPLAIN' => 'Configurerbare TimeAgo instellingen',
		'TA_DISPLAY_SETTINGS'         => 'TimeAgo Formaat Opties',
		'TA_CAT'                      => 'index.php',
		'TA_CAT_EXPLAIN'              => 'Activeerd TimeAgo op de category forum lijst voor "Laatste Post"',
		'TA_VIEWFORUM'                => 'viewforum.php',
		'TA_VIEWFORUM_EXPLAIN'        => 'Activeerd TimeAgo op de lijst van topics in forum view',
		'TA_VIEWTOPIC'                => 'viewtopic.php',
		'TA_VIEWTOPIC_EXPLAIN'        => 'Activeerd TimeAgo in elke post',
		'TA_EXTENDED'                 => 'Uitgebreid',
		'TA_EXTENDED_EXPLAIN'         => 'Voeg de standaard phpBB tijdnotatie toe aan het eind van TimeAgo.',
		'TA_EXTENDED_EXAMPLE'         => '(BV. 9 uren geleden (Sat Aug 08, 2015 11:57 am))',
		'TA_DETAIL'                   => 'Gedetaileerd niveau',
	]
);
