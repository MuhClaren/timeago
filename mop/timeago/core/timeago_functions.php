<?php
/**
 * TimeAgo - Class to generate fuzzy timestamps from epoch time
 *
 * Inject into the native phpbb timestamp template variables the
 * TimeAgo string.
 *
 * PHP Version 5.4
 *
 * @category  PHP
 * @package   timeago
 * @author    MUHCLAREN
 * @copyright 2015 (c) MOP
 * @license   GNU General Public License v2
 */

namespace mop\timeago\core;

/**
 * Class timeago_functions
 *
 * @package mop\timeago\core
 */
class timeago_functions
{

	/** @var \phpbb\config\config */
	public $config;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/**
	 * Constructor
	 *
	 * @param \phpbb\config\config              $config
	 * @param \phpbb\db\driver\driver_interface $db
	 * @param \phpbb\template\template          $template
	 * @param \phpbb\user                       $user
	 *
	 * @access public
	 */
	public function __construct(\phpbb\config\config $config, \phpbb\db\driver\driver_interface $db, \phpbb\template\template $template, \phpbb\user $user)
	{
		$this->config   = $config;
		$this->db       = $db;
		$this->template = $template;
		$this->user     = $user;
	}

	/**
	 * Timeago - Function
	 *
	 * Use PHP to generate the time ago string from Unix Epoch timestamp.
	 * Adapted from https://css-tricks.com/snippets/php/time-ago-function/
	 *
	 * @param integer $tm
	 * @param integer $rcs
	 *
	 * @return string
	 */
	public function time_ago($tm, $rcs = 0)
	{
		$this->user->add_lang_ext('mop/timeago', 'timeago_acp');

		$cur_tm = time();
		$dif    = ($cur_tm - $tm);
		$pds    = [$this->user->lang('TA_SECOND'), $this->user->lang('TA_MINUTE'), $this->user->lang('TA_HOUR'), $this->user->lang('TA_DAY'), $this->user->lang('TA_WEEK'), $this->user->lang('TA_MONTH'), $this->user->lang('TA_YEAR'), $this->user->lang('TA_DECADE')];
		$lngh   = [1, 60, 3600, 86400, 604800, 2630880, 31570560, 315705600];

		for ($v = (count($lngh) - 1); ($v >= 0) && (($no = $dif / $lngh[$v]) <= 1); $v--);

			if ($v < 0)
			{
				$v = 0;
			}

			$_tm = ($cur_tm - ($dif % $lngh[$v]));

			$no = floor($no);

			if ($no <> 1)
			{
				$pds[$v] .= 's';
			}

			$x = sprintf('%d %s ', $no, $pds[$v]);

			if (($rcs > 1) && ($v >= 1) && (($cur_tm - $_tm) > 0))
			{
				$x .= $this->time_ago($_tm, --$rcs);
			}

			return $x;
	}

	/**
	 * Assign TimeAgo timestamps into viewtopic.php template variables
	 *
	 * @param array $row   Row data
	 * @param array $block Template vars array
	 *
	 * @return array Template vars array
	 * @access public
	 */
	public function set_cat_timeago($row, $block)
	{
		// set the detail level to display, 0 is Off, 1 is Short, 2 is Medium, 3 is Full.
		$detail = !empty($this->config['ta_cat']) ? $this->config['ta_cat'] : '';

		// set the extended display option, 0 is Off, 1 On. When On, this appends the timeago string with the native phpBB timestamp
		$extend = !empty($this->config['ta_cat_extended']) ? ' ('.$this->user->format_date($row['forum_last_post_time']).')' : '';

		$block = array_merge(
			$block,
			[
				// set enabled flag
				'TIMEAGO'             => (!empty($this->config['ta_active'])) ? TRUE : FALSE,
				// native phpbb timestamp value assigned to a new template var, used with tooltip
				'LAST_POST_TIME_ORIG' => $this->user->format_date($row['forum_last_post_time']),
				// overwrite the the native phpBB timestamp with timeago timestamps
				'LAST_POST_TIME'      => (!empty($this->config['ta_cat'])) ? $this->time_ago($row['forum_last_post_time'], $detail).' ago'.$extend : $this->user->format_date($row['forum_last_post_time']),
			]
		);

		return $block;
	}

	/**
	 * Assign TimeAgo timestamps into viewforum.php template variables
	 *
	 * @param array $row   Row data
	 * @param array $block Template vars array
	 *
	 * @return array Template vars array
	 * @access public
	 */
	public function set_topics_timeago($row, $block)
	{
		// set the detail level to display, 0 is Off, 1 is Short, 2 is Medium, 3 is Full.
		$detail = !empty($this->config['ta_viewforum']) ? $this->config['ta_viewforum'] : '';

		// set the extended display option, 0 is Off, 1 On. When On, this appends the timeago string with the native phpBB timestamp
		$fp_extend = !empty($this->config['ta_viewforum_extended']) ? ' ('.$this->user->format_date($row['topic_time']).')' : '';
		$lp_extend = !empty($this->config['ta_viewforum_extended']) ? ' ('.$this->user->format_date($row['topic_last_post_time']).')' : '';

		$block = array_merge(
			$block,
			[
				// set enabled flag
				'TIMEAGO'              => (!empty($this->config['ta_active'])) ? TRUE : FALSE,
				// native phpbb topic timestamp values assigned to a new template var, used with tooltip
				'FIRST_POST_TIME_ORIG' => $this->user->format_date($row['topic_time']),
				'LAST_POST_TIME_ORIG'  => $this->user->format_date($row['topic_last_post_time']),
				// overwrite the the native phpBB timestamp with timeago timestamps
				'FIRST_POST_TIME'      => (!empty($this->config['ta_viewforum'])) ? $this->time_ago($row['topic_time'], $detail).' ago'.$fp_extend : $this->user->format_date($row['topic_time']),
				'LAST_POST_TIME'       => (!empty($this->config['ta_viewforum'])) ? $this->time_ago($row['topic_last_post_time'], $detail).' ago'.$lp_extend : $this->user->format_date($row['topic_last_post_time']),

			]
		);

		return $block;
	}

	/**
	 * Assign TimeAgo timestamps into viewtopic.php template variables
	 *
	 * @param array $row   Row data
	 * @param array $block Template vars array
	 *
	 * @return array Template vars array
	 * @access public
	 */
	public function set_posts_timeago($row, $block)
	{
		// set the detail level to display, 0 is Off, 1 is Short, 2 is Medium, 3 is Full.
		$detail = !empty($this->config['ta_viewtopic']) ? $this->config['ta_viewtopic'] : '';

		// set the extended display option, 0 is Off, 1 On. When On, this appends the timeago string with the native phpBB timestamp
		$extend = !empty($this->config['ta_viewtopic_extended']) ? ' ('.$this->user->format_date($row['post_time']).')' : '';

		$block = array_merge(
			$block,
			[
				// set enabled flag
				'TIMEAGO'        => (!empty($this->config['ta_active'])) ? TRUE : FALSE,
				// native phpbb post timestamp value assigned to a new template var, used with tooltip
				'POST_DATE_ORIG' => $this->user->format_date($row['post_time']),
				// overwrite the the native phpBB timestamp variable with timeago
				'POST_DATE'      => (!empty($this->config['ta_viewtopic'])) ? $this->time_ago($row['post_time'], $detail).' ago'.$extend : $this->user->format_date($row['post_time']),
			]
		);

		return $block;
	}

}
