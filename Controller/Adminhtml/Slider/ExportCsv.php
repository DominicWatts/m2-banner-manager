<?php

/**
 * Xigen
 */

namespace Xigen\Bannermanager\Controller\Adminhtml\Slider;

use Magento\Framework\App\Filesystem\DirectoryList;

/**
 * ExportCsv class
 */
class ExportCsv extends \Xigen\Bannermanager\Controller\Adminhtml\Slider
{
    /**
     * execute method
     * @return type
     * @access public
     */
    public function execute()
    {
        $fileName = 'sliders.csv';

        /** @var \\Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $content = $resultPage->getLayout()
            ->createBlock(Xigen\Bannermanager\Block\Adminhtml\Slider\Grid::class)
            ->getCsv();

        return $this->_fileFactory->create($fileName, $content, DirectoryList::VAR_DIR);
    }
}
