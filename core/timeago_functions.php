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
			// our working value available to 'spend' on period types
			$difference = (time() - $timestamp);
			// 'price' of each period type from seconds to decades
			$length = [1, 60, 3600, 86400, 604800, 2630880, 31570560, 315705600];
			// units
			$units = 0;

			for ($position = sizeof($length) - 1; ($position >= 0) && (($units = $difference / $length[$position]) <= 1); $position--)
			{
				if ($position < 0)
				{
					$position = 0;
				}
			};

			$_tm = time() - ($difference % $length[$position]);

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

			// are there still more levels of recursion available? If true, repeat loop.
			if (($recursion > 1) && ($position >= 1) && ((time() - $_tm) > 0))
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
				$timer_value = ($then + (86400 * (int) $this->config['ta_timer']));
				$deactivate  = (bool) (time() > $timer_value);
			} else
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
		 * @param string $mode   cat, viewforum, or viewtopic
		 * @param string $prefix forum, topic, or post
		 * @param array  $row    Row data
		 * @param array  $block  Template vars array
		 * @return array Template vars array
		 */
		public function inject_timeago($mode, $prefix, $row, $block)
		{

			// detail level 0: off 3: full
			$detail = (int) $this->config['ta_'.$mode];

			// raw timestamp of first post time
			$raw_fpt = (int) $row[$prefix.'_time'];

			// raw timestamp of first post time
			$raw_lpt = (int) $row[$prefix.'_last_post_time'];

			// formatted native timestamp of first post time
			$native_fpt = (string) $this->user->format_date($raw_fpt);

			// formatted native timestamp of last post time
			$native_lpt = (string) $this->user->format_date($raw_lpt);

			// timeago processed first post time
			$ta_fpt = (string) $this->time_ago($raw_fpt, $detail);

			// timeago processed last post time
			$ta_lpt = (string) $this->time_ago($raw_lpt, $detail);

			// extended string first post time
			$fp_extend = !empty($this->config['ta_'.$mode.'_extended']) ? (string) ' ('.$native_fpt.')' : '';

			// extended string last post time
			$lp_extend = !empty($this->config['ta_'.$mode.'_extended']) ? (string) ' ('.$native_lpt.')' : '';

			// timeago output first post time
			$ta_fpt_out = (string) $this->build_ta_output($ta_fpt, $fp_extend);

			// timeago output last post time
			$ta_lpt_out = (string) $this->build_ta_output($ta_lpt, $lp_extend);

			// assembled string ready for injection first post time
			$first_post_time = $this->ta_timer($raw_fpt) === true || $detail === 0 ? $native_fpt : $ta_fpt_out;

			// assembled string ready for injection last post time
			$last_post_time = $this->ta_timer($raw_lpt) === true || $detail === 0 ? $native_lpt : $ta_lpt_out;

			switch ($mode)
			{
				case 'cat':
					// if posts exist
					if (!empty($raw_lpt))
					{
						$block = array_merge(
							$block,
							[
								'LAST_POST_TIME' => $last_post_time,
							]
						);
					}
					break;
				case 'viewforum':
					$block = array_merge(
						$block,
						[
							'FIRST_POST_TIME' => $first_post_time,
							'LAST_POST_TIME'  => $last_post_time,
						]
					);
					break;
				case 'viewtopic':
					$block = array_merge(
						$block,
						[
							'POST_DATE' => $first_post_time,
						]
					);
					break;
				default:
					// obligatory default comment
					break;
			}//end switch

			return $block;
		}
	}
