<?php
/**
 * @category    Monkeyseemonkeydo
 * @package     Monkeyseemonkeydo_Healthchecks
 */

class Monkeyseemonkeydo_Healthchecks_Model_Cron
{
    /**
     * Check if config is valid and send request to ping url.
     *
     * @param Varien_Event_Observer $observer
     */
    public function sendPing($observer)
    {
        $pingEnabled = Mage::getStoreConfig('system/cron/healthcheck_enabled');
        $pingUrl = Mage::getStoreConfig('system/cron/healthcheck_ping_url');
        if ($pingEnabled) {
            if ($pingEnabled && Zend_Uri::check($pingUrl)) {
                try {
                    $client = new Varien_Http_Client($pingUrl, array(
                        'timeout' => 5
                    ));
                    $client->request();
                } catch (Exception $e) {
                    Mage::log('Failed to ping URL: ' . $e->getMessage());
                }
            }
        }
    }
}
