<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Framework\View\Element\UiComponent;

/**
 * Class ConfigInterface
 */
interface ConfigInterface
{
    /**
     * Get configuration data
     *
     * @param string|null $key
     * @return mixed
     */
    public function getData($key = null);

    /**
     * Add configuration data
     *
     * @param string $key
     * @param mixed $data
     * @return mixed
     */
    public function addData($key, $data);

    /**
     * Update configuration data
     *
     * @param string $key
     * @param mixed $data
     * @return mixed
     */
    public function updateData($key, $data);

    /**
     * Get owner name
     *
     * @return string
     */
    public function getName();

    /**
     * Get owner parent name
     *
     * @return string
     */
    public function getParentName();
}
