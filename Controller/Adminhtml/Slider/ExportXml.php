<?php

/**
 * Xigen
 */

namespace Xigen\Bannermanager\Controller\Adminhtml\Slider;

use Magento\Framework\App\Filesystem\DirectoryList;

/**
 * ExportXml class
 */
class ExportXml extends \Xigen\Bannermanager\Controller\Adminhtml\Slider
{
    /**
     * execute method
     * @return type
     * @access public
     */
    public function execute()
    {
        $fileName = 'sliders.xml';

        /** @var \\Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $content = $resultPage->getLayout()
            ->createBlock(\Xigen\Bannermanager\Block\Adminhtml\Slider\Grid::class)
            ->getXml();

        return $this->_fileFactory->create($fileName, $content, DirectoryList::VAR_DIR);
    }
}
