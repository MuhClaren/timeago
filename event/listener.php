<?php

	/**
	 * TimeAgo - Event Listener.
	 *
	 * PHP Version 5.4
	 *
	 * @category  PHP
	 *
	 * @author    MuhClaren
	 * @copyright 2015 (c) MOP
	 * @license   GNU General Public License v2
	 */
	namespace mop\timeago\event;

	use Symfony\Component\EventDispatcher\EventSubscriberInterface;

	/**
	 * Event listener.
	 */
	class listener implements EventSubscriberInterface
	{
		/** @var \mop\timeago\core\timeago_functions */
		protected $timeago_functions;

		/**
		 * Constructor.
		 *
		 * @param \mop\timeago\core\timeago_functions $timeago_functions functions
		 */
		public function __construct(\mop\timeago\core\timeago_functions $timeago_functions)
		{
			$this->timeago_functions = $timeago_functions;
		}

		/**
		 * Bind functions to event listeners.
		 *
		 * @return array
		 * @static
		 */
		public static function getSubscribedEvents()
		{
			return [
				'core.viewforum_modify_topicrow'           => 'modify_topicrow',
				'core.viewtopic_modify_post_row'           => 'modify_post_row',
				'core.display_forums_modify_template_vars' => 'modify_forum_row',
				'paybas.recenttopics.modify_tpl_ary'       => 'modify_topicrow',
			];
		}

		/**
		 * Modify category template vars to replace native timestamp with custom TimeAgo timestamp.
		 *
		 * @param object $event The event object
		 */
		public function modify_forum_row($event)
		{
			$mode          = 'cat';
			$block         = $event['forum_row'] ? 'forum_row' : 'tpl_ary';
			$event[$block] = $this->timeago_functions->inject_timeago($mode, $event['row'], $event[$block]);
		}

		/**
		 * Modify topicrow template vars to replace native timestamp with custom TimeAgo timestamp.
		 *
		 * @param object $event The event object
		 */
		public function modify_topicrow($event)
		{
			$mode          = 'viewforum';
			$block         = $event['topic_row'] ? 'topic_row' : 'tpl_ary';
			$event[$block] = $this->timeago_functions->inject_timeago($mode, $event['row'], $event[$block]);
		}

		/**
		 * Modify postrow template vars to replace native timestamp with custom TimeAgo timestamp.
		 *
		 * @param object $event The event object
		 */
		public function modify_post_row($event)
		{
			$mode          = 'viewtopic';
			$block         = $event['post_row'] ? 'post_row' : 'tpl_ary';
			$event[$block] = $this->timeago_functions->inject_timeago($mode, $event['row'], $event[$block]);
		}
	}
