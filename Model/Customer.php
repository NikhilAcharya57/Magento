<?php
/**  
*
* @category: PHP
* @package: Visionet/CustomerNotification
* @copyright: Visionet Systems Limited. All rights reserved.
* @license: Visionet Systems Limited
* @author: Nikhil A <nikhil.a@visionetsystems.com>
* @keywords: Module Visionet_CustomerNotification
*/

namespace Visionet\CustomerNotification\Model;
use Magento\Framework\Model\AbstractModel;

class Customer extends AbstractModel
{   
    const CACHE_TAG = 'customer_notification_table';
	protected $_cacheTag = 'customer_notification_table';
	protected $_eventPrefix = 'customer_notification_table';

    protected function _construct()
    {
        $this->_init(ResourceModel\Customer::class);
    }
}
