<?php

/**
 * Xigen
 */

namespace Xigen\Bannermanager\Controller\Adminhtml\Banner;

/**
 * NewAction class
 */
class NewAction extends \Xigen\Bannermanager\Controller\Adminhtml\Banner
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
