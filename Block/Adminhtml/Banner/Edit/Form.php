<?php

/**
 * Xigen
 */

namespace Xigen\Bannermanager\Block\Adminhtml\Banner\Edit;

/**
 * Form Xigen Bannermanager class
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    /**
     * _prepareForm method
     * @return type
     * @access protected
     */
    protected function _prepareForm()
    {
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create(
            [
                'data' => [
                    'id' => 'edit_form',
                    'action' => $this->getUrl('*/*/save', ['store' => $this->getRequest()->getParam('store')]),
                    'method' => 'post',
                    'enctype' => 'multipart/form-data',
                ],
            ]
        );
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
