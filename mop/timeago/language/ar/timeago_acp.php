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
 * Translated By : Bassel Taha Alhitary - www.alhitary.net.
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
		'TA_SECOND'                   => [0 => 'ثواني', 1 => 'ثانية', 2 => 'ثواني', 3 => 'ثواني', 4 => 'ثواني',],
		'TA_MINUTE'                   => [0 => 'دقائق', 1 => 'دقيقة', 2 => 'دقائق', 3 => 'دقائق', 4 => 'دقائق',],
		'TA_HOUR'                     => [0 => 'ساعات', 1 => 'ساعة', 2 => 'ساعات', 3 => 'ساعات', 4 => 'ساعات',],
		'TA_DAY'                      => [0 => 'أيام', 1 => 'يوم', 2 => 'أيام', 3 => 'أيام', 4 => 'أيام',],
		'TA_WEEK'                     => [0 => 'أسابيع', 1 => 'أسبوع', 2 => 'أسابيع', 3 => 'أسابيع', 4 => 'أسابيع',],
		'TA_MONTH'                    => [0 => 'شهور', 1 => 'شهر', 2 => 'شهور', 3 => 'شهور', 4 => 'شهور',],
		'TA_YEAR'                     => [0 => 'سنوات', 1 => 'سنة', 2 => 'سنوات', 3 => 'سنوات', 4 => 'سنوات',],
		'TA_DECADE'                   => [0 => 'عقود', 1 => 'عقد', 2 => 'عقود', 3 => 'عقود', 4 => 'عقود',],
		'TA_AGO'                      => 'مُنذ',
		'TA_OFF'                      => 'لا',
		'TA_SHORT'                    => 'قصير ( مُنذ 1 سنة )',
		'TA_MEDIUM'                   => 'متوسط ( مُنذ 1 سنة 2 شهور )',
		'TA_FULL'                     => 'كامل ( مُنذ 1 سنة 2 شهور 3 أيام )',
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
		'TA_EXTENDED'                 => 'بالإضافة إلى ',
		'TA_EXTENDED_EXPLAIN'         => 'إضافة صيغة التوقيت الإفتراضي للمنتدى بعد التوقيت الماضي.',
		'TA_EXTENDED_EXAMPLE'         => '( مثال : مُنذ 9 ساعات ( السبت أغسطس 08 , 2015 11:57 ص ) )',
		'TA_DETAIL'                   => 'مستوى التفاصيل',
		'TA_TIMER_SETTINGS'           => 'Timer Settings',
		'TA_TIMER'                    => 'Timer',
		'TA_TIMER_EXPLAIN'            => 'Duration of time (days) from the post time that TimeAgo should be active. Example: setting this to 2 will cause TimeAgo to revert to the normal phpBB date-time format after 2 days. If no value is set TimeAgo will never revert. Valid input: 1 - 999, 0 or blank disables this option',
		'TA_DAYS'                     => 'Days',
	]
);
