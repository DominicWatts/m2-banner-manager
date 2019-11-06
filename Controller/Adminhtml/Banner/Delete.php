<?php

/**
 * Xigen
 */

namespace Xigen\Bannermanager\Controller\Adminhtml\Banner;

/**
 * Delete class
 */
class Delete extends \Xigen\Bannermanager\Controller\Adminhtml\Banner
{
    /**
     * execute method
     * @return type
     * @access public
     */
    public function execute()
    {
        $bannerId = $this->getRequest()->getParam(static::PARAM_CRUD_ID);
        try {
            $banner = $this->_bannerFactory->create()->setId($bannerId);
            $banner->delete();
            $this->messageManager->addSuccess(
                __('Delete successfully !')
            );
        } catch (\Exception $e) {
            $this->messageManager->addError($e->getMessage());
        }

        $resultRedirect = $this->resultRedirectFactory->create();

        return $resultRedirect->setPath('*/*/');
    }
}
