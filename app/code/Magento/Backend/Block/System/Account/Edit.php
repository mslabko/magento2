<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Backend\Block\System\Account;

/**
 * Adminhtml edit admin user account
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Edit extends \Magento\Backend\Block\Widget\Form\Container
{
    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();

        $this->_blockGroup = 'Magento_Backend';
        $this->_controller = 'system_account';
        $this->buttonList->update('save', 'label', __('Save Account'));
        $this->buttonList->remove('delete');
        $this->buttonList->remove('back');
    }

    /**
     * @return string
     */
    public function getHeaderText()
    {
        return __('My Account');
    }
}
