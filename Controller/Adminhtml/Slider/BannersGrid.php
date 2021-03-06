<?php

/**
 * Xigen
 */

namespace Xigen\Bannermanager\Controller\Adminhtml\Slider;

/**
 * BannersGrid Xigen Bannermanager class
 */
class BannersGrid extends \Xigen\Bannermanager\Controller\Adminhtml\Slider
{
    /**
     * execute method
     * @return type
     * @access public
     */
    public function execute()
    {
        $resultLayout = $this->_resultLayoutFactory->create();
        $resultLayout->getLayout()
            ->getBlock('bannermanager.slider.edit.tab.banners')
            ->setInBanner($this->getRequest()->getPost('banner', null));

        return $resultLayout;
    }
}
