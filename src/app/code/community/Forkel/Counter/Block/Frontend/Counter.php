<?php
/**
 * Forkel Counter
 *
 * @category    Forkel
 * @package     Forkel_Counter
 * @copyright   Copyright (c) 2016 Tobias Forkel (http://www.tobiasforkel.de)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

class Forkel_Counter_Block_Frontend_Counter extends Forkel_Counter_Block_Base
{
    protected function _construct()
    {
        $this->setTemplate(Forkel_Counter_Helper_Data::TEMPLATE_BLOCK_COUNTER);
    }

    /**
     * Return the number from where the counter should start.
     *
     * @return string Numeric
     */
    public function getNumeric()
    {
        if ($name = $this->getCollectionName())
        {
            $collection = Mage::getModel($name)->getCollection();

            $filter = $this->getFieldToFilter();
            $collection->addFieldToFilter($filter['field'], $filter['condition']);

            return $collection->getSize();
        }

        return $this->getData('to');
    }
}
