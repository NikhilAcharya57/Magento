<?php

/**  
* @category: PHP
* @package: Visionet/CustomerNotification
* @copyright: Visionet Systems Limited. All rights reserved.
* @license: Visionet Systems Limited
* @author: Nikhil A <nikhil.a@visionetsystems.com>
* @keywords: Module Visionet_CustomerNotification
*/

namespace Visionet\CustomerNotification\Controller\Index;

use Visionet\CustomerNotification\Model\Customer;
use Visionet\CustomerNotification\Block\Index;
use Visionet\CustomerNotification\Model\ResourceModel\Customer as CustResourceModel;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Save extends Action
{
    /**
     * @var Customer
     */
    private $customer;
    /**
     * @var CustResourceModel
     */
    private $custResourceModel;
    private $customerId;
    private $customerName;
    private $customerData=[];
    protected $customerFactory;

    /**
     * Add constructor.
     * @param Context $context
     * @param Customer $customer
     * @param CustResourceModel $custResourceModel
     * @param array @customerData
     * 
     */
    public function __construct(
        Context $context,
        Customer $customer,
        CustResourceModel $custResourceModel,
        \Magento\Framework\ObjectManagerInterface $objectManager,
        \Magento\Customer\Model\Session $customerSession,
        \Visionet\CustomerNotification\Model\CustomerFactory $customerFactory
    ) {
        $this->customer = $customer;
        $this->custResourceModel = $custResourceModel;
        $this->customerSession=$customerSession;
        $this->customerFactory = $customerFactory;
        parent::__construct($context);
    }

    public function execute()
    {
       $customerId = $this->customerSession->getCustomer()->getId();
       $customerName = $this->customerSession->getCustomer()->getName();
       $customerData = ['customer_id' => $customerId,'customer_name'=>$customerName];
       $model = $this->customerFactory->create();
       $model->addData($customerData);
      
       try {   
            $model->save();
            $message="Welcome to Store ".$this->customerSession->getCustomer()->getName()." :)";
            $this->messageManager->addSuccessMessage($message);
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__("Something went wrong..."));
        }
        /* Redirect back to customer display page */
        $redirect = $this->resultRedirectFactory->create();
        $redirect->setPath('customernotification');
        return $redirect;
    }
}
        
