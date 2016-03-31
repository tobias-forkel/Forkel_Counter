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
     * Merge array and override values with the same keys
     *
     * @param array Array with original values
     * @param array Array with values
     *
     * @return array Numeric
     */
    public function mergeArray($array, $merge)
    {

        // Return original array if there is nothing to merge
        if (!is_array($merge))
        {

            return $array;
        }

        // Override values of the original array
        foreach($merge as $key => $value)
        {
            $array[$key] = $value;
        }

        return $array;
    }

    /**
     * Return the number from where the counter should start.
     *
     * @return number Numeric
     */
    public function getTo()
    {
        if ($name = $this->getCollectionName())
        {
            $collection = Mage::getModel($name)->getCollection();

            $filter = $this->getFieldToFilter();
            $collection->addFieldToFilter($filter['field'], $filter['condition']);

            return $collection->getSize();
        }

        return str_replace(array(',', '.'), array('',''), $this->getData('to'));
    }

    /**
     * Define the number where the counter should starting from.
     *
     * @return number Return a number or 0
     */
    public function getFrom()
    {
        return ($this->getData('from')) ? $this->getData('from') : 0;
    }

    /**
     * Display icon before the counter. Using Fonts Awesome.
     *
     * @return mixed String|Boolean
     */
    public function getIcon()
    {

        return ($this->getData('icon')) ? $this->getData('icon') : false;
    }

    /**
     * Display any kind of prefix in text format.
     *
     * @return mixed String|Boolean
     */
    public function getPrefix()
    {

        return ($this->getData('prefix')) ? $this->getData('prefix') : false;
    }

    /**
     * Display any kind of suffix in text format.
     *
     * @return mixed String|Boolean
     */
    public function getSuffix()
    {

        return ($this->getData('suffix')) ? $this->getData('suffix') : false;
    }

    /**
     * Get how many decimals should display after counter
     *
     * @return string
     */
    public function getDecimals()
    {

        return ($this->getData('decimals')) ? $this->getData('decimals') : 0;
    }

    /**
     * Get how long the counter should run
     *
     * @return string
     */
    public function getDuration()
    {

        return ($this->getData('duration')) ? $this->getData('duration') : 0;
    }

    /**
     * Return options for countUp plugin
     *
     * @return string
     */
    public function getOptions()
    {
        $defaults = Mage::getStoreConfig('forkel_counter/general/options');

        return json_encode($this->mergeArray(json_decode($defaults, true), json_decode($this->getData('options'), true)));
    }

}
