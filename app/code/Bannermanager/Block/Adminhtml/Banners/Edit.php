<?php
namespace Xigen\Bannermanager\Block\Adminhtml\Banners;

class Edit extends \Magento\Backend\Block\Widget\Form\Container
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {

        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);

    }//_construct

    /**
     * Initialize blog post edit block
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_objectId = 'id';
        $this->_blockGroup = 'Xigen_Bannermanager';
        $this->_controller = 'adminhtml_banners';//This is also used to determine the block path to the form

        parent::_construct();

        if ($this->_isAllowedAction('Xigen_Bannermanager::save')) {
            $this->buttonList->update('save', 'label', __('Save Banner'));
            $this->buttonList->add(
                'saveandcontinue',
                [
                    'label' => __('Save and Continue Edit'),
                    'class' => 'save',
                    'data_attribute' => [
                        'mage-init' => [
                            'button' => ['event' => 'saveAndContinueEdit', 'target' => '#edit_form'],
                        ],
                    ]
                ],
                -100
            );
        } else {
            $this->buttonList->remove('save');
        }

        if ($this->_isAllowedAction('Xigen_Bannermanager::banners_delete')) {
            $this->buttonList->update('delete', 'label', __('Delete Banner'));
        } else {
            $this->buttonList->remove('delete');
        }
    }

    /**
     * Retrieve text for header element depending on loaded post
     *
     * @return \Magento\Framework\Phrase
     */
    public function getHeaderText()
    {
        if ($this->_coreRegistry->registry('banner')->getId()) {
            return __("Edit Banner '%1'", $this->escapeHtml($this->_coreRegistry->registry('banner')->getTitle()));
        } else {
            return __('New Banner');
        }
    }

    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }

    /**
     * Getter of url for "Save and Continue" button
     * tab_id will be replaced by desired by JS later
     *
     * @return string
     */
    protected function _getSaveAndContinueUrl()
    {
        return $this->getUrl('banners/*/save', ['_current' => true, 'back' => 'edit', 'active_tab' => '']);
    }
}
