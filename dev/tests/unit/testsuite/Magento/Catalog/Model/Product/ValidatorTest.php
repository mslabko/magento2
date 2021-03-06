<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Catalog\Model\Product;

class ValidatorTest extends \PHPUnit_Framework_TestCase
{
    public function testValidator()
    {
        $validator = new \Magento\Catalog\Model\Product\Validator();
        $productMock = $this->getMock('Magento\Catalog\Model\Product', [], [], '', false);
        $requestMock = $this->getMock('Magento\Framework\App\RequestInterface');
        $responseMock = $this->getMock('Magento\Framework\Object');
        $productMock->expects($this->once())->method('validate')->will($this->returnValue(true));
        $this->assertEquals(true, $validator->validate($productMock, $requestMock, $responseMock));
    }
}
