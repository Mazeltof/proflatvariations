<?php
/**
 *
 * @package phpBB Extension - Translation modification
 * @copyright (c) 2023 cabot
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */
namespace mazeltof\proflatplus\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Event listener
 */
class listener implements EventSubscriberInterface
{
	
	protected $user;
	protected $template;

	public function __construct(\phpbb\user $user, \phpbb\template\template $template)
	{
		$this->user = $user;
		$this->template = $template;
	}

	public function custom_vars()
	{
		$this->template->assign_vars([
			'BODY_CLASS'	=> $this->user->style['style_path'],
		]);
	}

	public static function getSubscribedEvents()
	{
		return [
			'core.page_header_after'	=> 'custom_vars',
			'core.user_setup'	=> 'load_language_on_setup',
		];
	}

	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = [
			'ext_name'	=> 'mazeltof/proflatplus',
			'lang_set'	=> 'translation',
		];
		$event['lang_set_ext'] = $lang_set_ext;
	}
}
