<?php

	/**
	 * TimeAgo - Class to generate fuzzy timestamps from epoch time.
	 *
	 * Inject into the native phpbb timestamp template variables the
	 * TimeAgo string.
	 *
	 * PHP Version 5.4
	 *
	 * @category  PHP
	 *
	 * @author    MUHCLAREN
	 * @copyright 2015 (c) MOP
	 * @license   GNU General Public License v2
	 */
	namespace mop\timeago\core;

	/**
	 * Class timeago_functions.
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
		 * Constructor.
		 *
		 * @param \phpbb\config\config              $config
		 * @param \phpbb\db\driver\driver_interface $db
		 * @param \phpbb\template\template          $template
		 * @param \phpbb\user                       $user
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
		 * Timeago - Function.
		 *
		 * Use PHP to generate the time ago string from Unix Epoch timestamp.
		 *
		 * @param int $timestamp
		 * @param int $recursion
		 *
		 * @return string
		 */
		private function time_ago($timestamp, $recursion = 0)
		{
			// current server epoch time
			$current_time = time();
			// our working value available to 'spend' on period types
			$difference = ($current_time - $timestamp);
			// 'price' of each period type from seconds to decades
			$length = [1, 60, 3600, 86400, 604800, 2630880, 31570560, 315705600];
			// define units
			$units = 0;

			for ($position = sizeof($length) - 1; ($position >= 0) && (($units = $difference / $length[$position]) <= 1); $position--)
			{

			};

			if ($position < 0)
			{
				$position = 0;
			}

			$_tm = $current_time - ($difference % $length[$position]);

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
		 * TimeAgo Timer.
		 *
		 * Function returns true / false used to determine if TimeAgo should revert
		 * to normal phpBB date-time format, based on admin-configurable timer setting
		 *
		 * @param int $then epoch time value from post_time
		 *
		 * @return bool $deactivate true or false
		 */
		private function ta_timer($then)
		{
			if (!empty($this->config['ta_timer']))
			{
				$timer_value = ((int) $then + (86400 * (int) $this->config['ta_timer']));
				$deactivate  = (bool) (time() > $timer_value);
			}
			else
			{
				$deactivate = false;
			}

			return $deactivate;
		}

		/**
		 * Build the output string layout based on user language.
		 *
		 * @param string $timeago
		 * @param string $extend
		 *
		 * @return string $output
		 */
		private function build_ta_output($timeago, $extend)
		{
			$language = $this->user->data['user_lang'];
			$ago      = $this->user->lang('TA_AGO');

			switch ($language)
			{
				// Czech
				case 'cs':
					// German
				case 'de':
					// Español
				case 'es':
					$output = !empty($timeago) ? $ago.' '.$timeago.' '.$extend : null;
					break;
				default:
					$output = !empty($timeago) ? $timeago.' '.$ago.' '.$extend : null;
					break;
			}//end switch

			return $output;
		}

		/**
		 * Inject TimeAgo timestamps into template variables.
		 *
		 * @param string $mode  cat, viewforum, or viewtopic
		 * @param array  $row   Row data
		 * @param array  $block Template vars array
		 *
		 * @return array Template vars array
		 */
		public function inject_timeago($mode, $row, $block)
		{
			$first_post_time = '';
			$last_post_time  = '';
			$native_fp_time  = '';
			$native_lp_time  = '';

			if ($mode === 'cat')
			{
				$last_post_time = $row['forum_last_post_time'];
				$native_lp_time = $this->native_lastpost_time($last_post_time);

			}
			else if ($mode === 'viewforum')
			{
				$first_post_time = $row['topic_time'];
				$last_post_time  = $row['topic_last_post_time'];
				$native_fp_time  = $this->user->format_date($first_post_time);
				$native_lp_time  = $this->native_lastpost_time($last_post_time);
			}
			else if ($mode === 'viewtopic')
			{
				$last_post_time = $row['post_time'];
				$native_lp_time = $this->native_lastpost_time($last_post_time);
			}

			$detail       = !empty($this->config['ta_'.$mode]) ? $this->config['ta_'.$mode] : '';
			$fp_extend    = $this->firstpost_extend($mode, $native_fp_time);
			$lp_extend    = $this->lastpost_extend($mode, $native_lp_time);
			$fp_ta_output = $this->firstpost_ta_output($detail, $first_post_time, $fp_extend, $native_fp_time);
			$lp_ta_output = $this->lastpost_ta_output($detail, $last_post_time, $lp_extend, $native_lp_time);

			switch ($mode)
			{
				case 'cat':
					// if posts exist
					if (!empty($last_post_time))
					{
						$block = array_merge(
							$block,
							[
								'LAST_POST_TIME' => $this->ta_timer($last_post_time) === true ? $native_lp_time : $lp_ta_output,
							]
						);
					}
					break;
				case 'viewforum':
					$block = array_merge(
						$block,
						[
							'FIRST_POST_TIME' => $this->ta_timer($first_post_time) === true ? $native_fp_time : $fp_ta_output,
							'LAST_POST_TIME'  => $this->ta_timer($last_post_time) === true ? $native_lp_time : $lp_ta_output,
						]
					);
					break;
				case 'viewtopic':
					$block = array_merge(
						$block,
						[
							'POST_DATE' => $this->ta_timer($last_post_time) === true ? $native_lp_time : $lp_ta_output,
						]
					);
					break;
				default:
					// obligatory default comment
					break;
			}//end switch

			return $block;
		}

		/**
		 * @param $detail
		 * @param $last_post_time
		 * @param $lp_extend
		 * @param $native_lp_time
		 *
		 * @return string
		 */
		public function lastpost_ta_output($detail, $last_post_time, $lp_extend, $native_lp_time)
		{
			$lp_ta_output = !empty($detail) ? $this->build_ta_output($this->time_ago($last_post_time, $detail), $lp_extend) : $native_lp_time;

			return $lp_ta_output;
		}

		/**
		 * @param $detail
		 * @param $first_post_time
		 * @param $fp_extend
		 * @param $native_fp_time
		 *
		 * @return string
		 */
		public function firstpost_ta_output($detail, $first_post_time, $fp_extend, $native_fp_time)
		{
			$fp_ta_output = !empty($detail) ? $this->build_ta_output($this->time_ago($first_post_time, $detail), $fp_extend) : $native_fp_time;

			return $fp_ta_output;
		}

		/**
		 * @param $mode
		 * @param $native_lp_time
		 *
		 * @return string
		 */
		public function lastpost_extend($mode, $native_lp_time)
		{
			$lp_extend = !empty($this->config['ta_'.$mode.'_extended']) ? ' ('.$native_lp_time.')' : '';

			return $lp_extend;
		}

		/**
		 * @param $mode
		 * @param $native_fp_time
		 *
		 * @return string
		 */
		public function firstpost_extend($mode, $native_fp_time)
		{
			$fp_extend = !empty($this->config['ta_'.$mode.'_extended']) ? ' ('.$native_fp_time.')' : '';

			return $fp_extend;
		}

		/**
		 * @param $last_post_time
		 *
		 * @return mixed
		 */
		public function native_lastpost_time($last_post_time)
		{
			$native_lp_time = $this->user->format_date($last_post_time);

			return $native_lp_time;
		}

	}
