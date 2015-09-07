<?php
	/**
	 * TimeAgo - LANGUAGE FILE.
	 *
	 * This file contains the (Czech) language definitions for
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
			'TA_SECOND'                   => [0 => 'sekundami', 1 => 'sekundou', 2 => 'sekundami', 3 => 'sekundami', 4 => 'sekundami'],
			'TA_MINUTE'                   => [0 => 'minutami', 1 => 'minutou', 2 => 'minutami', 3 => 'minutami', 4 => 'minutami'],
			'TA_HOUR'                     => [0 => 'hodinami', 1 => 'hodinou', 2 => 'hodinami', 3 => 'hodinami', 4 => 'hodinami'],
			'TA_DAY'                      => [0 => 'dny', 1 => 'dnem', 2 => 'dny', 3 => 'dny', 4 => 'dny'],
			'TA_WEEK'                     => [0 => 'týdny', 1 => 'týdnem', 2 => 'týdny', 3 => 'týdny', 4 => 'týdny'],
			'TA_MONTH'                    => [0 => 'měsíci', 1 => 'měsícem', 2 => 'měsíci', 3 => 'měsíci', 4 => 'měsíci'],
			'TA_YEAR'                     => [0 => 'roky', 1 => 'rokem', 2 => 'roky', 3 => 'roky', 4 => 'roky'],
			'TA_DECADE'                   => [0 => 'desetiletími', 1 => 'desetiletím', 2 => 'desetiletími', 3 => 'desetiletími', 4 => 'desetiletími'],
			'TA_AGO'                      => 'před',
			'TA_OFF'                      => 'Vypnuto',
			'TA_SHORT'                    => 'Krátký (před 1 rokem)',
			'TA_MEDIUM'                   => 'Střední (Před 1 rokem 2 měsíci)',
			'TA_FULL'                     => 'Plný (Před 1 rokem 2 měsíci 3 dny)',
			// general settings
			'TA_GENERAL_SETTINGS'         => 'Obecné nastavení',
			'TA_GENERAL_SETTINGS_EXPLAIN' => 'Přizpůsobení nastavení TimeAgo',
			'TA_DISPLAY_SETTINGS'         => 'Možnosti formátu TimeAgo',
			'TA_CAT'                      => 'index.php',
			'TA_CAT_EXPLAIN'              => 'Používat TimeAgo ve výpisu fór u posledního příspěvku',
			'TA_VIEWFORUM'                => 'viewforum.php',
			'TA_VIEWFORUM_EXPLAIN'        => 'Používat TimeAgo ve výpisu témat v zobrazení fóra',
			'TA_VIEWTOPIC'                => 'viewtopic.php',
			'TA_VIEWTOPIC_EXPLAIN'        => 'Používat TimeAgo u každého příspěvku',
			'TA_EXTENDED'                 => 'Rozšířené',
			'TA_EXTENDED_EXPLAIN'         => 'Přidat výchozí časové razítko systému phpBB za TimeAgo.',
			'TA_EXTENDED_EXAMPLE'         => '(Příklad: Před 9 hodinami (ned zář 06, 2015 11:57 am))',
			'TA_DETAIL'                   => 'Úroveň detailů',
			'TA_TIMER_SETTINGS'           => 'Nastavení časovače',
			'TA_TIMER'                    => 'Časovač',
			'TA_TIMER_EXPLAIN'            => 'Doba trvání [dny] od chvíle odeslání příspěvku, kdy má být TimeAgo aktivní. Příklad: nastavení hodnoty 2 způsobí, že se TimeAgo vrátí k standardnímu phpBB formátu data po dvou dnech. Pokud není nastavena žádná hodnota, bude vždy použit pouze formát TimeAgo. Platné hodnoty: 1 - 999, 0 nebo prázdné vypne tuto volbu',
			'TA_DAYS'                     => 'Dnů',
		]
	);
