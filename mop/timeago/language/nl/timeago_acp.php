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

		// define the characters of the language used for plurals. For example, english uses "s" to indicate more than one day (days).
		'TA_PLURAL_CHARS'             => 'en',
		// common lang variables
		'TA_SECOND'                   => 'seconde',
		'TA_MINUTE'                   => 'minuut',
		'TA_HOUR'                     => 'uur',
		'TA_DAY'                      => 'dag',
		'TA_WEEK'                     => 'week',
		'TA_MONTH'                    => 'maand',
		'TA_YEAR'                     => 'jaar',
		'TA_DECADE'                   => 'decennium',
		'TA_OFF'                      => 'Uit',
		'TA_SHORT'                    => 'Kort (1 Jaar Geleden)',
		'TA_MEDIUM'                   => 'Gemiddeld (1 Jaren 2 Maanden Geleden)',
		'TA_FULL'                     => 'Volledig (1 Jaar 2 Maanden 3 Dagen geleden)',
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
