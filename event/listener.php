<?php
/**
 * TimeAgo - Event Listener
 *
 * PHP Version 5.4
 *
 * @category  PHP
 * @package   timeago
 * @author    MuhClaren
 * @copyright 2015 (c) MOP
 * @license   GNU General Public License v2
 */

namespace mop\timeago\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Event listener
 */
class listener implements EventSubscriberInterface
{

	/** @var \mop\timeago\core\timeago_functions */
	protected $timeago_functions;

	/**
	 * Constructor
	 *
	 * @param \mop\timeago\core\timeago_functions $timeago_functions functions
	 *
	 * @access public
	 */
	public function __construct(\mop\timeago\core\timeago_functions $timeago_functions)
	{
		$this->timeago_functions = $timeago_functions;
	}

	/**
	 * Bind functions to event listeners
	 *
	 * @return array
	 * @static
	 * @access public
	 */
	static public function getSubscribedEvents()
	{
		return [
			// viewforum.php events
			'core.viewforum_modify_topicrow'           => 'modify_topicrow',
			'core.viewtopic_modify_post_row'           => 'modify_post_row',
			'core.display_forums_modify_template_vars' => 'modify_forum_row',
		];
	}

	/**
	 * Modify category template vars to replace native timestamp with custom TimeAgo timestamp
	 *
	 * @param object $event The event object
	 *
	 * @return void
	 * @access public
	 */
	public function modify_forum_row($event)
	{
		$block         = $event['forum_row'] ? 'forum_row' : 'tpl_ary';
		$event[$block] = $this->timeago_functions->set_cat_timeago($event['row'], $event[$block]);
	}

	/**
	 * Modify topicrow template vars to replace native timestamp with custom TimeAgo timestamp
	 *
	 * @param object $event The event object
	 *
	 * @return void
	 * @access public
	 */
	public function modify_topicrow($event)
	{
		$block         = $event['topic_row'] ? 'topic_row' : 'tpl_ary';
		$event[$block] = $this->timeago_functions->set_topics_timeago($event['row'], $event[$block]);
	}

	/**
	 * Modify postrow template vars to replace native timestamp with custom TimeAgo timestamp
	 *
	 * @param object $event The event object
	 *
	 * @return void
	 * @access public
	 */
	public function modify_post_row($event)
	{
		$block         = $event['post_row'] ? 'post_row' : 'tpl_ary';
		$event[$block] = $this->timeago_functions->set_posts_timeago($event['row'], $event[$block]);
	}

}
