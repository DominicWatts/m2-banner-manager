<?php

/**
 * Xigen
 */
// phpcs:disable Magento2.Files.LineLength.MaxExceeded

namespace Xigen\Bannermanager\Controller\Adminhtml\Slider;

use Magento\Framework\Controller\ResultFactory;

use Xigen\Bannermanager\Model\ResourceModel\Banner\Grid\StatusesArray;

/**
 * MassEnable class
 */
class MassEnable extends \Xigen\Bannermanager\Controller\Adminhtml\AbstractAction
{

    /**
     * Execute action
     * @return \Magento\Backend\Model\View\Result\Redirect
     * @throws \Magento\Framework\Exception\LocalizedException|\Exception
     */
    public function execute()
    {
        $sliderCollection = $this->_objectManager->create(\Xigen\Bannermanager\Model\ResourceModel\Slider\Collection::class);
        $collection = $this->_massActionFilter->getCollection($sliderCollection);
        $collectionSize = $collection->getSize();
        foreach ($collection as $item) {
            $item->setStatus(StatusesArray::STATUS_ENABLED);
            try {
                $item->save();
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
        }

        $this->messageManager->addSuccess(__('A total of %1 record(s) have been disabled.', $collectionSize));

        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);

        return $resultRedirect->setPath('*/*/');
    }
}
