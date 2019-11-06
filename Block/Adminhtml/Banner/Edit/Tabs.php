<?php

/**
 * Xigen
 */

namespace Xigen\Bannermanager\Block\Adminhtml\Banner\Edit;

/**
 * Tabs class
 */
class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    /**
     * constructor
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('banner_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Banner Information'));
    }
}
