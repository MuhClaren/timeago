<?php
/**
 * TimeAgo - LANGUAGE FILE
 *
 * This file contains the ( Arabic ) language definitions for
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
 * 
 * Translated By : Bassel Taha Alhitary - www.alhitary.net
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
		// common lang variables
		'CHARS'                       => 'حروف',
		'TA_SECOND'                   => 'ثانية',
		'TA_MINUTE'                   => 'دقيقة',
		'TA_HOUR'                     => 'ساعة',
		'TA_DAY'                      => 'يوم',
		'TA_WEEK'                     => 'أسبوع',
		'TA_MONTH'                    => 'شهر',
		'TA_YEAR'                     => 'سنة',
		'TA_DECADE'                   => '10 سنوات',
		'TA_OFF'                      => 'لا',
		'TA_SHORT'                    => 'قصير ( مُنذ 1 سنة )',
		'TA_MEDIUM'                   => 'متوسط ( مُنذ 1 سنة 2 شهور )',
		// general settings
		'TA_GENERAL_SETTINGS'         => 'الإعدادات',
		'TA_GENERAL_SETTINGS_EXPLAIN' => 'ضبط الإعدادات',
		'TA_DISPLAY_SETTINGS'         => 'الخيارات',
		'TA_CAT'                      => 'الصفحة الرئيسية ',
		'TA_CAT_EXPLAIN'              => 'تطبيق التوقيت الماضي في "آخر مُشاركة" بالصفحة الرئيسية',
		'TA_VIEWFORUM'                => 'صفحة المنتديات ',
		'TA_VIEWFORUM_EXPLAIN'        => 'تطبيق التوقيت الماضي في قائمة المواضيع بصفحة المنتدى',
		'TA_VIEWTOPIC'                => 'صفحة الموضوع ',
		'TA_VIEWTOPIC_EXPLAIN'        => 'تطبيق التوقيت الماضي في كل مُشاركة ( صفحة الموضوع )',
		'TA_FULL'                     => 'كامل ( مُنذ 1 سنة 2 شهور 3 أيام )',
		'TA_EXTENDED'                 => 'إضافة',
		'TA_EXTENDED_EXPLAIN'         => 'إضافة صيغة التوقيت الإفتراضي للمنتدى في نهاية التوقيت الماضي.',
		'TA_EXTENDED_EXAMPLE'         => '( مثال : مُنذ 9 ساعات ( السبت أغسطس 08 , 2015 11:57 ص ) )',
		'TA_DETAIL'                   => 'مستوى التفاصيل',
	]
);
