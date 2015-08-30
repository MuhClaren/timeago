<?php
/**
 * TimeAgo - NL LANGUAGE FILE
 *
 * This file contains the (Dutch - NL) language definitions for
 * the labels used in the ACP extensions tab. Translation provided by
 * SvennD
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
		// this is a belgium nl translation (http://taaladvies.net/taal/advies/vraag/511/)
		'TA_SECOND'                   => [0 => 'seconden', 1 => 'seconde', 2 => 'seconden', 3 => 'seconden', 4 => 'seconden',],
		'TA_MINUTE'                   => [0 => 'minuten', 1 => 'minuut', 2 => 'minuten', 3 => 'minuten', 4 => 'minuten',],
		'TA_HOUR'                     => [0 => 'uren', 1 => 'uur', 2 => 'uur', 3 => 'uur', 4 => 'uur',],
		'TA_DAY'                      => [0 => 'dagen', 1 => 'dag', 2 => 'dagen', 3 => 'dagen', 4 => 'dagen',],
		'TA_WEEK'                     => [0 => 'weken', 1 => 'week', 2 => 'weken', 3 => 'weken', 4 => 'weken',],
		'TA_MONTH'                    => [0 => 'maanden', 1 => 'maand', 2 => 'maand', 3 => 'maand', 4 => 'maand',],
		'TA_YEAR'                     => [0 => 'jaren', 1 => 'jaar', 2 => 'jaar', 3 => 'jaar', 4 => 'jaar',],
		'TA_DECADE'                   => [0 => 'decennia', 1 => 'decennium', 2 => 'decennia', 3 => 'decennia', 4 => 'decennia',],
		'TA_AGO'                      => 'geleden',
		'TA_OFF'                      => 'Uit',
		'TA_SHORT'                    => 'Kort (1 jaar geleden)',
		'TA_MEDIUM'                   => 'Gemiddeld (1 jaar 2 maand geleden)',
		'TA_FULL'                     => 'Volledig (1 jaar 2 maand 3 dagen geleden)',
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
		'TA_EXTENDED_EXAMPLE'         => '(BV. 9 uur geleden (12 Aug 2015 08:07))',
		'TA_DETAIL'                   => 'Gedetaileerd niveau',
		'TA_TIMER_SETTINGS'           => 'Timer instellingen',
		'TA_TIMER'                    => 'Timer',
		'TA_TIMER_EXPLAIN'            => 'Tijd dat de TimeAgo actief moet zijn op de tijdsaanduiding. Voorbeeld: Dit op twee zetten zou ervoor zorgen dat na twee dagen de tijd terug in het normaal phpBB formaat wordt gezet. Als er geen waarde is gezet wordt deze functie gedeactiveerd. Geldige input 1 - 999, 0 of leeg zet deze functie uit.',
		'TA_DAYS'                     => 'Dagen',
	]
);
