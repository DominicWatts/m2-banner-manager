<?php

/**
 * Xigen
 */

namespace Xigen\Bannermanager\Controller\Adminhtml\Banner;

use Magento\Framework\App\Filesystem\DirectoryList;

/**
 * ExportExcel Xigen Bannermanager class
 */
class ExportExcel extends \Xigen\Bannermanager\Controller\Adminhtml\Banner
{
    /**
     * execute method
     * @return type
     * @access public
     */
    public function execute()
    {
        $fileName = 'banners.xls';

        /** @var \\Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $content = $resultPage->getLayout()
            ->createBlock(\Xigen\Bannermanager\Block\Adminhtml\Banner\Grid::class)
            ->getExcel();

        return $this->_fileFactory->create($fileName, $content, DirectoryList::VAR_DIR);
    }
}
