<?php defined('SYSPATH') or die('No direct access allowed.');

/**
 * SMSSync Data Providers
 *
 * @author     Ushahidi Team <team@ushahidi.com>
 * @package    DataProvider\SMSSync
 * @copyright  2013 Ushahidi
 * @license    http://www.gnu.org/copyleft/gpl.html GNU General Public License Version 3 (GPLv3)
 */

class DataProvider_Smssync extends DataProvider {

	/**
	 * Contact type user for this provider
	 */
	public $contact_type = Model_Contact::PHONE;

	/**
	 * Sets the FROM parameter for the provider
	 *
	 * @return int
	 */
	public function from()
	{
		// Get provider phone (FROM)
		// Replace non-numeric
		$this->_from = preg_replace('/\D+/', "", parent::from());

		return $this->_from;
	}

	/**
	 * @return mixed
	 */
	public function send($to, $message, $title = "")
	{
		// The SMSSync App on the phone will pick this SMS later for sending
		// For now just send back an autogenerated Tracking ID
		return array(Message_Status::PENDING_POLL, $this->tracking_id(Message_Type::SMS));
	}

}