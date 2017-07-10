<?php
/**
 * @category  Fishpig
 * @package  Fishpig_ContactsUrl
 * @license    http://fishpig.co.uk/license.txt
 * @author     Ben Tideswell <help@fishpig.co.uk>
 */

class Fishpig_ContactsUrl_Model_Observer
{
	/**
	 * Initialise the contacts route
	 *
	 * @param Varien_Event_Observer $observer
	 */
	public function initRoute(Varien_Event_Observer $observer)
	{
		if ($this->isEnabled() && ($uri = trim($this->getUri())) !== '') {
			Mage::app()->getConfig()->setNode('frontend/routers/contacts/args/frontName', $uri, true);
		}
	}
	
	/**
	 * Retrieve the URI for the contacts page URL
	 *
	 * @return string
	 */
	public function getUri()
	{
		return Mage::getStoreConfig('contacts/custom_url/uri');
	}
	
	/**
	 * Determine whether the extension has been enabled
	 *
	 * @return bool
	 */
	public function isEnabled()
	{
		return Mage::getStoreConfigFlag('contacts/custom_url/enabled');
	}
}
