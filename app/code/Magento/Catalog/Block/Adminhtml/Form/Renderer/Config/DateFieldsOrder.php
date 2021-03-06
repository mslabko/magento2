<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

/**
 * Catalog Custom Options Config Renderer
 *
 * @author     Magento Core Team <core@magentocommerce.com>
 */
namespace Magento\Catalog\Block\Adminhtml\Form\Renderer\Config;

use Magento\Backend\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class DateFieldsOrder extends Field
{
    /**
     * @param AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        $_options = ['d' => __('Day'), 'm' => __('Month'), 'y' => __('Year')];

        $element->setValues($_options)->setClass('select-date')->setName($element->getName() . '[]');
        if ($element->getValue()) {
            $values = explode(',', $element->getValue());
        } else {
            $values = [];
        }

        $_parts = [];
        $_parts[] = $element->setValue(isset($values[0]) ? $values[0] : null)->getElementHtml();
        $_parts[] = $element->setValue(isset($values[1]) ? $values[1] : null)->getElementHtml();
        $_parts[] = $element->setValue(isset($values[2]) ? $values[2] : null)->getElementHtml();

        return implode(' <span>/</span> ', $_parts);
    }
}
