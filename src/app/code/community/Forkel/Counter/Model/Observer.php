<?php
/**
 * Maintenance Counter
 *
 * @category    Forkel
 * @package     Forkel_Counter
 * @copyright   Copyright (c) 2016 Tobias Forkel (http://www.tobiasforkel.de)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

class Forkel_Counter_Model_Observer {

    public function layoutLoadBefore(Varien_Event_Observer $observer)
    {
        $layout = $observer->getEvent()->getLayout();

        $layout->getUpdate()->addHandle('forkel_counter_js');
        $layout->getUpdate()->addHandle('forkel_counter_css');
        $layout->getUpdate()->addHandle('forkel_counter');
    }
}
