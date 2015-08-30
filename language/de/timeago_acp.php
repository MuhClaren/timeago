<?php

	/**
	 * TimeAgo - LANGUAGE FILE.
	 *
	 * This file contains the (German - DE) language definitions for
	 * the labels and explanations text used in the admin control panel
	 * TimeAgo Extension Settings module.
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
			// Set the plurals - <key> => 'plural string' where <key> is the unit count, such as number of days
			'TA_SECOND'                   => [0 => 'Sekunden', 1 => 'Sekunde', 2 => 'Sekunden', 3 => 'Sekunden', 4 => 'Sekunden'],
			'TA_MINUTE'                   => [0 => 'Minuten', 1 => 'Minute', 2 => 'Minuten', 3 => 'Minuten', 4 => 'Minuten'],
			'TA_HOUR'                     => [0 => 'Stunden', 1 => 'Stunde', 2 => 'Stunden', 3 => 'Stunden', 4 => 'Stunden'],
			'TA_DAY'                      => [0 => 'Tage', 1 => 'Tag', 2 => 'Tagen', 3 => 'Tagen', 4 => 'Tagen'],
			'TA_WEEK'                     => [0 => 'Wochen', 1 => 'Woche', 2 => 'Wochen', 3 => 'Wochen', 4 => 'Wochen'],
			'TA_MONTH'                    => [0 => 'Monaten', 1 => 'Monat', 2 => 'Monaten', 3 => 'Monaten', 4 => 'Monaten'],
			'TA_YEAR'                     => [0 => 'Jahren', 1 => 'Jahr', 2 => 'Jahren', 3 => 'Jahren', 4 => 'Jahren'],
			'TA_DECADE'                   => [0 => 'Dekaden', 1 => 'Dekade', 2 => 'Dekaden', 3 => 'Dekaden', 4 => 'Dekaden'],
			'TA_AGO'                      => 'Vor',
			'TA_OFF'                      => 'aus',
			'TA_SHORT'                    => 'Kurz (Vor 1 Jahr)',
			'TA_MEDIUM'                   => 'Mittel (Vor 1 Jahr 2 Monaten)',
			'TA_FULL'                     => 'Vollständig (Vor 1 Jahr 2 Monaten 3 Tagen)',
			// general settings
			'TA_GENERAL_SETTINGS'         => 'Generelle Einstellungen',
			'TA_GENERAL_SETTINGS_EXPLAIN' => 'Anpassen der Zeit Bevor Einstellungen',
			'TA_DISPLAY_SETTINGS'         => 'TimeAgo Format Optionen',
			'TA_CAT'                      => 'index.php',
			'TA_CAT_EXPLAIN'              => 'Fügt Zeit Bevor auf Forum-Kategorien für letzte Beiträge hinzu',
			'TA_VIEWFORUM'                => 'viewforum.php',
			'TA_VIEWFORUM_EXPLAIN'        => 'Fügt Zeit Bevor auf die Beitrags Listen in der Forum Übersicht hinzu',
			'TA_VIEWTOPIC'                => 'viewtopic.php',
			'TA_VIEWTOPIC_EXPLAIN'        => 'Fügt Zeit Bevor jedem Beitrag hinzu',
			'TA_EXTENDED'                 => 'Erweitert',
			'TA_EXTENDED_EXPLAIN'         => 'Fügt eine native phpBB Zeitmarke am Ende von Zeit Bevor hinzu.',
			'TA_EXTENDED_EXAMPLE'         => '(Z.b. Vor 9 Stunden (Sa Aug 08, 2015 11:57))',
			'TA_DETAIL'                   => 'Detail Level',
			'TA_TIMER_SETTINGS'           => 'Timer Settings',
			'TA_TIMER'                    => 'Timer',
			'TA_TIMER_EXPLAIN'            => 'Duration of time (days) from the post time that TimeAgo should be active. Example: setting this to 2 will cause TimeAgo to revert to the normal phpBB date-time format after 2 days. If no value is set TimeAgo will never revert. Valid input: 1 - 999, 0 or blank disables this option',
			'TA_DAYS'                     => 'Days',
		]
	);
