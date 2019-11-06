<?php

/**
 * Xigen
 */

namespace Xigen\Bannermanager\Block\Adminhtml\Slider\Edit;

/**
 * Tabs class
 */
class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    /**
     * _construct method
     * @access protected
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('slider_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Group Information'));
    }
}
