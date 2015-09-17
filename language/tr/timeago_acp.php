<?php
	/**
	 * TimeAgo - LANGUAGE FILE.
	 *
	 * This file contains the (Turkish) language definitions for
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
			'TA_SECOND'                   => [0 => 'saniye', 1 => 'saniye', 2 => 'saniye', 3 => 'saniye', 4 => 'saniye'],
			'TA_MINUTE'                   => [0 => 'dakika', 1 => 'dakika', 2 => 'dakika', 3 => 'dakika', 4 => 'dakika'],
			'TA_HOUR'                     => [0 => 'saat', 1 => 'saat', 2 => 'saat', 3 => 'saat', 4 => 'saat'],
			'TA_DAY'                      => [0 => 'gün', 1 => 'gün', 2 => 'gün', 3 => 'gün', 4 => 'gün'],
			'TA_WEEK'                     => [0 => 'hafta', 1 => 'hafta', 2 => 'hafta', 3 => 'hafta', 4 => 'hafta'],
			'TA_MONTH'                    => [0 => 'ay', 1 => 'ay', 2 => 'ay', 3 => 'ay', 4 => 'ay'],
			'TA_YEAR'                     => [0 => 'yıl', 1 => 'yıl', 2 => 'yıl', 3 => 'yıl', 4 => 'yıl'],
			'TA_DECADE'                   => [0 => 'on yıl', 1 => 'on yıl', 2 => 'on yıl', 3 => 'on yıl', 4 => 'on yıl'],
			'TA_AGO'                      => 'önce',
			'TA_OFF'                      => 'Kapalı',
			'TA_SHORT'                    => 'Kısa (1 yıl önce)',
			'TA_MEDIUM'                   => 'Orta (1 yıl 2 ay önce)',
			'TA_FULL'                     => 'Tam (1 yıl 2 ay 3 gün önce)',
			// general settings
			'TA_GENERAL_SETTINGS'         => 'Genel Ayarlar',
			'TA_GENERAL_SETTINGS_EXPLAIN' => 'TimeAgo seçeneklerini ayarla',
			'TA_DISPLAY_SETTINGS'         => 'TimeAgo Biçim Seçenekleri',
			'TA_CAT'                      => 'index.php',
			'TA_CAT_EXPLAIN'              => 'TimeAgo'yu Kategori Forum Listesindeki "Son Gönderi" için uygular',
			'TA_VIEWFORUM'                => 'viewforum.php',
			'TA_VIEWFORUM_EXPLAIN'        => 'TimeAgo'yu forum görünümdeki başlık listesi için uygular',
			'TA_VIEWTOPIC'                => 'viewtopic.php',
			'TA_VIEWTOPIC_EXPLAIN'        => 'TimeAgo'yu her gönderi için uygular',
			'TA_EXTENDED'                 => 'Detaylandır',
			'TA_EXTENDED_EXPLAIN'         => 'phpBB'nin kendi tarih biçimini TimeAgo'nun sonuna ekler.',
			'TA_EXTENDED_EXAMPLE'         => '(Ör. 9 saat önce (Cts Ağu 08, 2015 11:57 am))',
			'TA_DETAIL'                   => 'Detay Seviyesi',
			'TA_TIMER_SETTINGS'           => 'Süre Ayarları',
			'TA_TIMER'                    => 'Süre',
			'TA_TIMER_EXPLAIN'            => 'Gönderi zamanından itibaren TimeAgo'nun ne kadar süre (gün) aktif olacağını belirler. Örnek: Bu ayarı 2 olarak ayarlarsanız; gönderi yapılmasından 2 gün sonra, TimeAgo phpBB'nin kendi tarih stiline dönmesini sağlar. Eğer herhangi bir değer girilmezse bu dönüşüm sağlanmaz. Geçerli giriş aralığı: 1 - 999'dur, 0 girilmesi veya boş bırakılması bu özelliği devre dışı bırakır.',
			'TA_DAYS'                     => 'Gün',
		]
	);
