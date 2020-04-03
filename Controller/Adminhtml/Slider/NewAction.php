<?php

/**
 * Xigen
 */

namespace Xigen\Bannermanager\Controller\Adminhtml\Slider;

/**
 * NewAction Xigen Bannermanager class
 */
class NewAction extends \Xigen\Bannermanager\Controller\Adminhtml\Slider
{
    /**
     * execute method
     * @return type
     * @access public
     */
    public function execute()
    {
        $resultForward = $this->_resultForwardFactory->create();
        return $resultForward->forward('edit');
    }
}
