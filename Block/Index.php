<?php

/**  
* @category: PHP
* @package: Visionet/CustomerNotification
* @copyright: Visionet Systems Limited. All rights reserved.
* @license: Visionet Systems Limited
* @author: Nikhil A <nikhil.a@visionetsystems.com>
* @keywords: Module Visionet_CustomerNotification
*/

namespace Visionet\CustomerNotification\Block;

use Visionet\CustomerNotification\Model\ResourceModel\Customer\Collection;
use Magento\Framework\View\Element\Template;
use Visionet\CustomerNotification\Model\CustomerFactory;

class Index extends \Magento\Framework\View\Element\Template 
{
    /**
     * @var Collection
     */
    protected $collection;
    protected $customerFactory;

    /**
     * Display constructor.
     * @param Template\Context $context
     * @param Collection $collection
     */
    public function __construct(
        Template\Context $context,
        Collection $collection,
        CustomerFactory $customerFactory
               
    ) {
        $this->collection = $collection;
        $this->customerFactory = $customerFactory;
        parent::__construct($context);   
    }


    /**
     * @return string
     */
    public function getPostUrlFunction()   //called in button.phtml
    {   
      return $this->getUrl('customernotification/index/save');
    }


  
   
}
