<?php

/**
 * Xigen
 */

namespace Xigen\Bannermanager\Block\Adminhtml\Slider;

class Edit extends \Magento\Backend\Block\Widget\Form\Container
{
    /**
     * Core registry.
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;

    /**
     * @param Context $context
     * @param array   $data
     */
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }
    
    protected function _construct()
    {
        $this->_objectId = 'slider_id';
        $this->_blockGroup = 'Xigen_Bannermanager';
        $this->_controller = 'adminhtml_slider';

        parent::_construct();

        $this->buttonList->update('save', 'label', __('Save Group'));
        $this->buttonList->update('delete', 'label', __('Delete'));

        if ($this->getSlider()->getId()) {
            $this->buttonList->add(
                'create_banner',
                [
                    'label' => __('Create Banner'),
                    'class' => 'add',
                    'onclick' => 'openBannerPopupWindow(\''.$this->getCreateBannerUrl().'\')',
                ],
                1
            );
        }

        $this->buttonList->add(
            'save_and_continue',
            [
                'label' => __('Save and Continue Edit'),
                'class' => 'save',
                'data_attribute' => [
                    'mage-init' => [
                        'button' => ['event' => 'saveAndContinueEdit', 'target' => '#edit_form'],
                    ],
                ],
            ],
            10
        );

        $this->_formScripts[] = "
            require(['jquery'], function($){
                window.openBannerPopupWindow = function (url) {
                    var left = ($(document).width()-1000)/2, height= $(document).height();
                    var create_banner_popupwindow = window.open(url, '_blank','width=1000,resizable=1,scrollbars=1,toolbar=1,'+'left='+left+',height='+height);
                    var windowFocusHandle = function(){
                        if (create_banner_popupwindow.closed) {
                            if (typeof bannerGridJsObject !== 'undefined' && create_banner_popupwindow.banner_id) {
                                bannerGridJsObject.reloadParams['banner[]'].push(create_banner_popupwindow.banner_id + '');
                                $(edit_form.slider_banner).val($(edit_form.slider_banner).val() + '&' + create_banner_popupwindow.banner_id + '=' + Base64.encode('order_banner_slider=0'));
                                   bannerGridJsObject.setPage(create_banner_popupwindow.banner_id);
                               }
                               $(window).off('focus',windowFocusHandle);
                        } else {
                            $(create_banner_popupwindow).trigger('focus');
                            create_banner_popupwindow.alert('".__('You have to save banner and close this window!')."');
                        }
                    }
                    $(window).focus(windowFocusHandle);
                }
            });
        ";
    }

    public function getSlider()
    {
        return $this->_coreRegistry->registry('slider');
    }

    /**
     * Retrieve the save and continue edit Url.
     *
     * @return string
     */
    protected function _getSaveAndContinueUrl()
    {
        return $this->getUrl(
            '*/*/save',
            ['_current' => true, 'back' => 'edit', 'tab' => '{{tab_id}}']
        );
    }

    /**
     * get create banner url.
     *
     * @return string
     */
    public function getCreateBannerUrl()
    {
        return $this->getUrl('*/banner/new', ['current_slider_id' => $this->getSlider()->getId()]);
    }
}
