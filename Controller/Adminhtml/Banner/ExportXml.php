<?php

namespace Xigen\Bannermanager\Controller\Adminhtml\Banner;

use Magento\Framework\App\Filesystem\DirectoryList;

/**
 * ExportXml Xigen Bannermanager class
 */
class ExportXml extends \Xigen\Bannermanager\Controller\Adminhtml\Banner
{
    /**
     * execute method
     * @return type
     * @access public
     */
    public function execute()
    {
        $fileName = 'banners.xml';

        /** @var \\Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $content = $resultPage->getLayout()
            ->createBlock(\Xigen\Bannermanager\Block\Adminhtml\Banner\Grid::class)
            ->getXml();

        return $this->_fileFactory->create($fileName, $content, DirectoryList::VAR_DIR);
    }
}
