<?php

/**
 * Xigen
 */

namespace Xigen\Bannermanager\Model\ResourceModel;

/**
 * Slider Xigen Bannermanager class
 */
class Slider extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * construct
     * @return void
     */
    protected function _construct()
    {
        $this->_init('xigen_bannermanager_slider', 'slider_id');
    }
}
