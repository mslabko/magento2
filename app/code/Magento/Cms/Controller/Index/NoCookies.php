<?php
/**
 *
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Cms\Controller\Index;

class NoCookies extends \Magento\Framework\App\Action\Action
{
    /**
     * Render Disable cookies page
     *
     * @return void
     */
    public function execute()
    {
        $pageId = $this->_objectManager->get(
            'Magento\Framework\App\Config\ScopeConfigInterface',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        )->getValue(
            \Magento\Cms\Helper\Page::XML_PATH_NO_COOKIES_PAGE,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
        if (!$this->_objectManager->get('Magento\Cms\Helper\Page')->renderPage($this, $pageId)) {
            $this->_forward('defaultNoCookies');
        }
    }
}
