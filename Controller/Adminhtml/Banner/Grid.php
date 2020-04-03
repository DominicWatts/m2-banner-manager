<?php

namespace Xigen\Bannermanager\Controller\Adminhtml\Banner;

/**
 * Grid Xigen Bannermanager class
 */
class Grid extends \Xigen\Bannermanager\Controller\Adminhtml\Banner
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
        $resultLayout = $this->_resultLayoutFactory->create();
        return $resultLayout;
    }
}
