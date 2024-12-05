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

namespace Visionet\CustomerNotification\Controller\Adminhtml;
 
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Visionet\CustomerNotification\Model\CustomerFactory;
 
class Customer extends Action
{
    protected $_coreRegistry;
    protected $_resultPageFactory;
    protected $_customerFactory;
 
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        PageFactory $resultPageFactory,
        CustomerFactory $customerFactory
    ) {
        parent::__construct($context);
        $this->_coreRegistry = $coreRegistry;
        $this->_resultPageFactory = $resultPageFactory;
        $this->_customerFactory = $customerFactory;
 
    }
    public function execute()
    {
 
    }
 
    protected function _isAllowed()
    {
        return true;
    }
}
