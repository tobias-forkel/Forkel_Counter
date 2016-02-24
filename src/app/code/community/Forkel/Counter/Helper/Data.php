<?php
/**
 * Maintenance Counter
 *
 * @category    Forkel
 * @package     Forkel_Counter
 * @copyright   Copyright (c) 2016 Tobias Forkel (http://www.tobiasforkel.de)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

class Forkel_Counter_Helper_Data extends Mage_Core_Helper_Abstract
{
    const MODULE_NAME                           = 'forkel_counter';
    const TEMPLATE_BLOCK_COUNTER                = 'forkel/counter/counter.phtml';
    const COLLECTION_FILTER_DATETIME_FROM       = '01/01/1970';
    const COLLECTION_FILTER_DATETIME_TO         = 'now';
}
