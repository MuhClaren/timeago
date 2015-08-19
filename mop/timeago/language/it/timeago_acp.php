<?php
/**
 * TimeAgo - LANGUAGE FILE
 *
 * This file contains the (Italian) language definitions for
 * the labels and explanations text used in the admin control panel
 * TimeAgo Extension Settings module. Translation by
 * Sakkiotto <https://github.com/sakkiotto>
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
		'TA_SECOND'                   => [0 => 'secondo', 1 => 'secondo', 2 => 'secondi', 3 => 'secondi', 4 => 'secondi',],
		'TA_MINUTE'                   => [0 => 'minuto', 1 => 'minuto', 2 => 'minuti', 3 => 'minuti', 4 => 'minuti',],
		'TA_HOUR'                     => [0 => 'ora', 1 => 'ora', 2 => 'ore', 3 => 'ore', 4 => 'ore',],
		'TA_DAY'                      => [0 => 'giorno', 1 => 'giorno', 2 => 'giorni', 3 => 'giorni', 4 => 'giorni',],
		'TA_WEEK'                     => [0 => 'settimana', 1 => 'settimana', 2 => 'settimane', 3 => 'settimane', 4 => 'settimane',],
		'TA_MONTH'                    => [0 => 'mese', 1 => 'mese', 2 => 'mesi', 3 => 'mesi', 4 => 'mesi',],
		'TA_YEAR'                     => [0 => 'anno', 1 => 'anno', 2 => 'anni', 3 => 'anni', 4 => 'anni',],
		'TA_DECADE'                   => [0 => 'decennio', 1 => 'decennio', 2 => 'decenni', 3 => 'decenni', 4 => 'decenni',],
		'TA_AGO'                      => 'fa',
		'TA_OFF'                      => 'Off',
		'TA_SHORT'                    => 'Short (1 Anno fa)',
		'TA_MEDIUM'                   => 'Medium (1 Anno 2 Mesi fa)',
		'TA_FULL'                     => 'Full (1 Anno 2 Mesi 3 Giorni fa)',
		// general settings
		'TA_GENERAL_SETTINGS'         => 'Impostazioni Generali',
		'TA_GENERAL_SETTINGS_EXPLAIN' => 'Configura impostazioni TimeAgo',
		'TA_DISPLAY_SETTINGS'         => 'TimeAgo Formato Opzioni',
		'TA_CAT'                      => 'index.php',
		'TA_CAT_EXPLAIN'              => 'Applica TimeAgo in “Ultimo Messaggio” nella Lista Categorie Forum',
		'TA_VIEWFORUM'                => 'viewforum.php',
		'TA_VIEWFORUM_EXPLAIN'        => 'Applica TimeAgo nella lista argomenti in vista forum',
		'TA_VIEWTOPIC'                => 'viewtopic.php',
		'TA_VIEWTOPIC_EXPLAIN'        => 'Applica TimeAgo in ogni messaggio',
		'TA_EXTENDED'                 => 'Esteso',
		'TA_EXTENDED_EXPLAIN'         => 'Aggiungi phpBB timestamp nativo dopo TimeAgo.',
		'TA_EXTENDED_EXAMPLE'         => '(Es. 9 Ore fa (Sat Aug 08, 2015 11:57 am))',
		'TA_DETAIL'                   => 'Dettagli',
	]
);
