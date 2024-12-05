<?php

/**  
* To get and store the staff details
* @category: PHP
* @package: Visionet/CustomerNotification
* @copyright: Visionet Systems Limited. All rights reserved.
* @license: Visionet Systems Limited
* @author: Nikhil A <nikhil.a@visionetsystems.com>
* @keywords: Module Visionet_CustomerNotification
*/

namespace Visionet\CustomerNotification\Controller\Adminhtml\Customer;

use Magento\Backend\Model\Auth\Session;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;
use Visionet\CustomerNotification\Ui\Component\Listing\Column\StoreAssistance;

class Index extends \Magento\Backend\App\Action
{
	protected $resultPageFactory = false;
	protected $authSession;
	protected $request;
    protected $messageManager;
    protected $resource;
    protected $customerName;

	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		Session $authSession,
		
        \Magento\Framework\App\Request\Http $request,
        \Magento\Framework\App\ResourceConnection $resource,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory,
		\Magento\Framework\Message\ManagerInterface $messageManager,
		\Visionet\CustomerNotification\Model\CustomerFactory $customerFactory
	)
	{
		parent::__construct($context);
		$this->request = $request;
        $this->authSession=$authSession;
        $this->resource = $resource;
		$this->resultPageFactory = $resultPageFactory;
		$this->messageManager=$messageManager;
		$this->customerFactory=$customerFactory;
	}
	
	public function execute()
	{
		$resultPage = $this->resultPageFactory->create();
		$resultPage->getConfig()->getTitle()->prepend((__('Customer List')));

		$this->request->getParams(); // all params
        $id=$this->request->getParam('id');  //get id value from the URl
		$staffName=$this->authSession->getUser()->getUsername();
        $connection  = $this->resource->getConnection();
        $staff = ["store_executive"=>$staffName];   // Key_Value Pair
        $flag=["flag"=>'1'];
        $where = ['id = ?' => (int)$id];
        $tableName = $connection->getTableName("customer_notification_table");
		try{
			$connection->update($tableName, $staff, $where);
			$connection->update($tableName, $flag, $where);
			$this->messageManager->addSuccessMessage("Customer approved successfully...!");
		}
		catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__("Something went wrong :("));
        }
	
		return $resultPage;	
	}
} 
