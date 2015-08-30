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
		$this->user->add_lang_ext('mop/timeago', 'timeago_acp');

	}

	/**
	 * Timeago - Function
	 *
	 * Use PHP to generate the time ago string from Unix Epoch timestamp.
	 *
	 * @param integer $timestamp
	 * @param integer $recursion
	 *
	 * @return string
	 */
	public function time_ago($timestamp, $recursion = 0)
	{
		// total count for each period type, per iteration
		$units = 0;
		// current server epoch time
		$current_time = time();
		// our working value available to 'spend' on period types
		$difference = ($current_time - $timestamp);
		// 'price' of each period type from seconds to decades
		$length = [1, 60, 3600, 86400, 604800, 2630880, 31570560, 315705600];

		/**
		 * Let's get our TimeAgo values using a loop.
		 *
		 * Expression 1: Set the initial pointer to ensure we start in the proper place. For
		 * example, we don't want to begin the loop by calculating how many years we have until we
		 * know how many decades we have first, and adjust our remaining working time accordingly.
		 *
		 * Expression 2: Check to make sure that we still have period types that can be 'bought',
		 * and that we have enough working time to 'buy' more units for said period type.
		 *
		 * Expression 3: At the end of each loop iteration, we must decrement our pointer position by one
		 * period type to ensure the next pass begins in the proper position. We did this with expression 1
		 * but remember that the first expression is a once-only evaluation which occurs at the start of the
		 * loop. So we use expression 3 to continue that required job.
		 *
		 */
		for ($position = (count($length) - 1); ($position >= 0) && (($units = $difference / $length[$position]) <= 1); $position--);

		// check position
		if ($position < 0)
		{
			$position = 0;
		}

		// determine if we have enough working time to 'buy' more of this period type
		$_tm = ($current_time - ($difference % $length[$position]));

		// clean up the float
		$units = floor($units);

		// period types
		$periods = [
			$this->user->lang('TA_SECOND', $units),
			$this->user->lang('TA_MINUTE', $units),
			$this->user->lang('TA_HOUR', $units),
			$this->user->lang('TA_DAY', $units),
			$this->user->lang('TA_WEEK', $units),
			$this->user->lang('TA_MONTH', $units),
			$this->user->lang('TA_YEAR', $units),
			$this->user->lang('TA_DECADE', $units),
		];

		// build the timeago output
		$timeago = sprintf('%d %s ', $units, $periods[$position]);

		// are there still more levels of recursion available? are there more period types left? do we have enough remaining working time to 'buy' more units? If true, repeat loop.
		if (($recursion > 1) && ($position >= 1) && (($current_time - $_tm) > 0))
		{
			$timeago .= $this->time_ago($_tm, --$recursion);
		}

		return $timeago;
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
		/**
		 * Set our internal vars
		 *
		 * @var integer $detail  small int to determine our detail level for the output string
		 * @var string  $extend  optional string containing native phpBB (date-time) to append to the timeago output
		 * @var string  $timeago the meat and potatoes - the processed timeago substring ready for output build
		 */
		$detail    = !empty($this->config['ta_cat']) ? $this->config['ta_cat'] : '';
		$extend    = !empty($this->config['ta_cat_extended']) ? ' ('.$this->user->format_date($row['forum_last_post_time']).')' : '';
		$timeago   = !empty($this->config['ta_cat']) ? $this->time_ago($row['forum_last_post_time'], $detail) : '';
		$ta_output = !empty($timeago) ? $this->build_ta_output($timeago, $extend) : $this->user->format_date($row['forum_last_post_time']);

		$block = array_merge(
			$block,
			[
				'TIMEAGO'             => !empty($this->config['ta_active']) ? TRUE : FALSE,
				'LAST_POST_TIME_ORIG' => $this->user->format_date($row['forum_last_post_time']),
				// if ta_timer == true deactivate timeago, otherwise use timeago
				'LAST_POST_TIME'      => $this->ta_timer($row['forum_last_post_time']) == TRUE ? $this->user->format_date($row['forum_last_post_time']) : $ta_output,
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
		$detail       = !empty($this->config['ta_viewforum']) ? $this->config['ta_viewforum'] : '';
		$fp_extend    = !empty($this->config['ta_viewforum_extended']) ? ' ('.$this->user->format_date($row['topic_time']).')' : '';
		$lp_extend    = !empty($this->config['ta_viewforum_extended']) ? ' ('.$this->user->format_date($row['topic_last_post_time']).')' : '';
		$fp_timeago   = !empty($this->config['ta_viewforum']) ? $this->time_ago($row['topic_time'], $detail) : '';
		$lp_timeago   = !empty($this->config['ta_viewforum']) ? $this->time_ago($row['topic_last_post_time'], $detail) : '';
		$ta_output_fp = !empty($fp_timeago) ? $this->build_ta_output($fp_timeago, $fp_extend) : $this->user->format_date($row['topic_time']);
		$ta_output_lp = !empty($lp_timeago) ? $this->build_ta_output($lp_timeago, $lp_extend) : $this->user->format_date($row['topic_last_post_time']);

		$block = array_merge(
			$block,
			[
				'TIMEAGO'              => !empty($this->config['ta_active']) ? TRUE : FALSE,
				'FIRST_POST_TIME_ORIG' => $this->user->format_date($row['topic_time']),
				'LAST_POST_TIME_ORIG'  => $this->user->format_date($row['topic_last_post_time']),
				'FIRST_POST_TIME'      => $this->ta_timer($row['topic_time']) == TRUE ? $this->user->format_date($row['topic_time']) : $ta_output_fp,
				'LAST_POST_TIME'       => $this->ta_timer($row['topic_last_post_time']) == TRUE ? $this->user->format_date($row['topic_last_post_time']) : $ta_output_lp,
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
		$detail    = !empty($this->config['ta_viewtopic']) ? $this->config['ta_viewtopic'] : '';
		$extend    = !empty($this->config['ta_viewtopic_extended']) ? ' ('.$this->user->format_date($row['post_time']).')' : '';
		$timeago   = !empty($this->config['ta_viewtopic']) ? $this->time_ago($row['post_time'], $detail) : '';
		$ta_output = !empty($timeago) ? $this->build_ta_output($timeago, $extend) : $this->user->format_date($row['post_time']);

		$block = array_merge(
			$block,
			[
				'TIMEAGO'        => !empty($this->config['ta_active']) ? TRUE : FALSE,
				'POST_DATE_ORIG' => $this->user->format_date($row['post_time']),
				'POST_DATE'      => $this->ta_timer($row['post_time']) == TRUE ? $this->user->format_date($row['post_time']) : $ta_output,
			]
		);

		return $block;
	}

	/**
	 * Build the output string layout based on user language
	 *
	 * @param string $timeago
	 * @param string $extend
	 *
	 * @return string $output
	 */
	public function build_ta_output($timeago, $extend)
	{
		$language = $this->user->data['user_lang'];
		$ago      = $this->user->lang('TA_AGO');

		switch ($language)
		{
			// German
			case 'de':
			// Español
			case 'es':
				$output = !empty($timeago) ? $ago.' '.$timeago.' '.$extend : NULL;
				break;

			// English - fallthrough
			default:
				$output = !empty($timeago) ? $timeago.' '.$ago.' '.$extend : NULL;
				break;
		}

		return $output;

	}

	/**
	 * TimeAgo Timer
	 *
	 * Function returns true / false used to determine if TimeAgo should revert
	 * to normal phpBB date-time format, based on admin-configurable timer setting
	 *
	 * @param integer $then epoch time value from post_time
	 *
	 * @return bool $deactivate true or false
	 */
	public function ta_timer($then)
	{
		if (!empty($this->config['ta_timer']))
		{
			$timer_value = ((int)$then + (86400 * (int)$this->config['ta_timer']));
			$deactivate  = (bool)(time() > $timer_value);
		}
		else
		{
			$deactivate = FALSE;
		}

		return $deactivate;
	}
}
