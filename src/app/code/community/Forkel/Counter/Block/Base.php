<?php
/**
 * Forkel Counter
 *
 * @category    Forkel
 * @package     Forkel_Counter
 * @copyright   Copyright (c) 2016 Tobias Forkel (http://www.tobiasforkel.de)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

class Forkel_Counter_Block_Base extends Mage_Core_Block_Template
{
    /**
     * Array with filter options
     * @var array
     */
    protected $_filter = [];

    /**
     * Get the numeric for the counter
     * or explode the string with all options, like  "collection:catalog/product;from:-14days;to:yesterday".
     *
     * @return mixed
     */
    protected function getFilter($key)
    {
        $to = trim($this->getData('to'));

        if (strpos($to, ':'))
        {
            $to = explode(',', $to);

            foreach ($to as $value)
            {
                $filter = explode(':', $value);
                $this->_filter[$filter[0]] = trim($filter[1]);
            }
        }

        return (array_key_exists($key, $this->_filter) ? $this->_filter[$key] : false);
    }

    /**
     * Return the name of a collection.
     *
     * @return mixed
     */
    public function getCollectionName()
    {
        $name = $this->getFilter('collection');

        $collection = array('sales/order', 'catalog/product', 'customer/customer', 'customer/session');

        return (in_array($name, $collection) ? $name : false);
    }

    /**
     * Return an condition array, depending on the collection.
     *
     * @return mixed
     */
    public function getFieldToFilter()
    {
        $name = $this->getFilter('collection');

        $settings = [
            'sales/order' => [
                'field' => 'created_at',
            ],
            'catalog/product' => [
                'field' => 'created_at',
            ],
            'customer/customer' => [
                'field' => 'created_at',
            ],
            'customer/session' => [
                'field' => 'login_at',
            ]
        ];

        $from = ($this->getFilter('from') ? $this->getFilter('from') : Forkel_Counter_Helper_Data::COLLECTION_FILTER_DATETIME_FROM);
        $to = ($this->getFilter('to') ? $this->getFilter('to') : Forkel_Counter_Helper_Data::COLLECTION_FILTER_DATETIME_TO);

        $condition = ['from' => date('Y-m-d H:i:s', strtotime($from)), 'to' => date('Y-m-d H:i:s', strtotime($to))];

        $settings[$name]['condition'] = $condition;

        return (array_key_exists($name, $settings) ? $settings[$name] : false);
    }
}
