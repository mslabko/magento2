<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Webapi\Model\Config;

/**
 * Test for class reflector.
 */
class ClassReflectorTest extends \PHPUnit_Framework_TestCase
{
    /** @var \Magento\Framework\Reflection\TypeProcessor|\PHPUnit_Framework_MockObject_MockObject */
    protected $_typeProcessor;

    /** @var \Magento\Webapi\Model\Config\ClassReflector */
    protected $_classReflector;

    /**
     * Set up helper.
     */
    protected function setUp()
    {
        $this->_typeProcessor = $this->getMock(
            '\Magento\Framework\Reflection\TypeProcessor',
            ['process'],
            [],
            '',
            false
        );
        $this->_typeProcessor->expects(
            $this->any()
        )->method(
            'process'
        )->will(
            $this->returnValueMap([['string', 'str'], ['int', 'int']])
        );
        $this->_classReflector = new \Magento\Webapi\Model\Config\ClassReflector($this->_typeProcessor);
    }

    public function testReflectClassMethods()
    {
        $data = $this->_classReflector->reflectClassMethods(
            '\\Magento\\Webapi\\Model\\Config\\TestServiceForClassReflector',
            ['generateRandomString' => ['method' => 'generateRandomString']]
        );
        $this->assertEquals(['generateRandomString' => $this->_getSampleReflectionData()], $data);
    }

    public function testExtractMethodData()
    {
        $classReflection = new \Zend\Server\Reflection\ReflectionClass(
            new \ReflectionClass('\\Magento\\Webapi\\Model\\Config\\TestServiceForClassReflector')
        );
        /** @var $methodReflection ReflectionMethod */
        $methodReflection = $classReflection->getMethods()[0];
        $methodData = $this->_classReflector->extractMethodData($methodReflection);
        $expectedResponse = $this->_getSampleReflectionData();
        $this->assertEquals($expectedResponse, $methodData);
    }

    /**
     * Expected reflection data for TestServiceForClassReflector generateRandomString method
     *
     * @return array
     */
    protected function _getSampleReflectionData()
    {
        return [
            'documentation' =>
                'Basic random string generator. This line is short description '.
                'This line is long description. This is still the long description.',
            'interface' => [
                'in' => [
                    'parameters' => [
                        'length' => [
                            'type' => 'int',
                            'required' => true,
                            'documentation' => 'length of the random string',
                        ],
                    ],
                ],
                'out' => [
                    'parameters' => [
                        'result' => ['type' => 'str', 'documentation' => 'random string', 'required' => true],
                    ],
                ],
            ]
        ];
    }
}
