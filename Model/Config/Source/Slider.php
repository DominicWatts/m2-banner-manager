<?php

/**
 * Xigen
 */

namespace Xigen\Bannermanager\Model\Config\Source;

/**
 * Slider class
 */
class Slider implements \Magento\Framework\Option\ArrayInterface
{
    protected $sliderFactory;

    /**
     * __construct method
     * @param SliderFactory $sliderFactory
     * @access public
     */
    public function __construct(
        \Xigen\Bannermanager\Model\SliderFactory $sliderFactory
    ) {
        $this->sliderFactory = $sliderFactory;
    }

    /**
     * getSliders method
     * @return type
     * @access public
     */
    public function getSliders()
    {
        $sliderModel = $this->sliderFactory->create();
        return $sliderModel->getCollection()->getData();
    }

    /**
     * toOptionArray method
     * @return type
     * @access public
     */
    public function toOptionArray()
    {
        $sliders = [];
        foreach ($this->getSliders() as $slider) {
            array_push($sliders, [
                'value' => $slider['slider_id'],
                'label' => $slider['title']
            ]);
        }
        return $sliders;
    }
}
