<?php

/**  
* @category: PHP
* @package: Visionet/CustomerNotification
* @copyright: Visionet Systems Limited. All rights reserved.
* @license: Visionet Systems Limited
* @author: Nikhil A <nikhil.a@visionetsystems.com>
* @keywords: Module Visionet_CustomerNotification
*/

namespace Visionet\CustomerNotification\Model\ResourceModel\Customer;

use Visionet\CustomerNotification\Model\Customer;
use Visionet\CustomerNotification\Model\ResourceModel\Customer as CustResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Customer::class, CustResourceModel::class);    
    }

  
}
