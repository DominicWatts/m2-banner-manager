<?php

/**
 * Xigen
 */

namespace Xigen\Bannermanager\Controller\Adminhtml\Slider;

use Magento\Framework\App\Filesystem\DirectoryList;

/**
 * ExportExcel class
 */
class ExportExcel extends \Xigen\Bannermanager\Controller\Adminhtml\Slider
{
    /**
     * execute method
     * @return type
     * @access public
     */
    public function execute()
    {
        $fileName = 'sliders.xls';

        /** @var \\Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $content = $resultPage->getLayout()
            ->createBlock(Xigen\Bannermanager\Block\Adminhtml\Slider\Grid::class)
            ->getExcel();

        return $this->_fileFactory->create($fileName, $content, DirectoryList::VAR_DIR);
    }
}
