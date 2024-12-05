<?php

/**  
* Create button and set required functionality to button in admin grid 
* @category: PHP
* @package: Visionet/CustomerNotification
* @copyright: Visionet Systems Limited. All rights reserved.
* @license: Visionet Systems Limited
* @author: Nikhil A <nikhil.a@visionetsystems.com>
* @keywords: Module Visionet_CustomerNotification
*/

namespace Visionet\CustomerNotification\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class StoreExecutive extends Column
{
    /** Url path */
    
    /** @var UrlInterface */
    protected $_urlBuilder;
   
    /**
     * @param ContextInterface   $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface       $urlBuilder
     * @param array              $components
     * @param array              $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = []   
    ) {
        $this->_urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source.
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) { 
               $url = $this->_urlBuilder->getUrl('customernotification/customer/index',['id'=>$item['id']]);
               $custName=$item['customer_name'];
               if($item['flag']==0)
               {
                $item['action'] = html_entity_decode("<a href='{$url}'><button>Approve</button></a>");
               }
               else{
                $item['action'] = html_entity_decode("<button disabled>Approved</button>");  
               }
            }   
        }
        return $dataSource;
    }
}
