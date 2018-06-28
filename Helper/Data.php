<?php

namespace Augustash\Jreject\Helper;

use Augustash\Logger\Helper\Data as AshLogger;
use Magento\Framework\Component\ComponentRegistrar;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    const XML_PATH_ENABLED = 'augustash_jreject/general/enabled';
    const XML_PATH_ALLOW_CLOSE = 'augustash_jreject/general/close';
    const XML_PATH_ALLOW_CLOSE_WITH_ESC = 'augustash_jreject/general/close_esc';
    const XML_PATH_HEADER = 'augustash_jreject/general/header';
    const XML_PATH_PARAGRAPH1 = 'augustash_jreject/general/paragraph1';
    const XML_PATH_PARAGRAPH2 = 'augustash_jreject/general/paragraph2';
    const XML_PATH_CLOSE_MESSAGE = 'augustash_jreject/general/close_message';
    const XML_PATH_CLOSE_LINK = 'augustash_jreject/general/close_link';
    const XML_PATH_CLOSE_URL = 'augustash_jreject/general/close_url';
    const XML_PATH_IE_VERSION = 'augustash_jreject/general/ie_version';

    /**
     * @var AshLogger
     */
    protected $logger;

    /**
     * @var \Magento\Framework\Component\ComponentRegistrar
     */
    protected $path;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;

    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        ComponentRegistrar $path,
        AshLogger $logger
    ) {
        $this->storeManager = $storeManager;
        $this->logger = $logger;
        $this->path = $path;
        parent::__construct($context);
    }

    /**
     * Returns a boolean value if this module is enabled/disabled
     * within the Stores > Configuration
     *
     * @param  null|integer  $storeId   # Magento store ID
     * @return boolean
     */
    public function isEnabled($storeId = null)
    {
        return (bool)$this->getConfig(self::XML_PATH_ENABLED, $storeId);
    }

    /**
     * Check if modal can be closed.
     *
     * @return boolean
     */
    public function allowModalClose($storeId = null)
    {
        return (bool)$this->getConfig(self::XML_PATH_ALLOW_CLOSE, $storeId);
    }

    /**
     * Check if modal can be closed by Esc.
     *
     * @return boolean
     */
    public function allowModalCloseByEsc($storeId = null)
    {
        return (bool)$this->getConfig(self::XML_PATH_ALLOW_CLOSE_WITH_ESC, $storeId);
    }

    public function getCustomHeader($storeId = null)
    {
        if (!$this->isEnabled($storeId)) {
            return '';
        }

        return $this->getConfig(self::XML_PATH_HEADER, $storeId);
    }

    public function getParagraphOne($storeId = null)
    {
        if (!$this->isEnabled($storeId)) {
            return '';
        }

        return $this->getConfig(self::XML_PATH_PARAGRAPH1, $storeId);
    }

    public function getParagraphTwo($storeId = null)
    {
        if (!$this->isEnabled($storeId)) {
            return '';
        }

        return $this->getConfig(self::XML_PATH_PARAGRAPH2, $storeId);
    }

    public function getCloseMessage($storeId = null)
    {
        if (!$this->isEnabled($storeId)) {
            return '';
        }

        return $this->getConfig(self::XML_PATH_CLOSE_MESSAGE, $storeId);
    }

    public function getCloseLink($storeId = null)
    {
        if (!$this->isEnabled($storeId)) {
            return '';
        }

        return $this->getConfig(self::XML_PATH_CLOSE_LINK, $storeId);
    }

    public function getCloseUrl($storeId = null)
    {
        if (!$this->isEnabled($storeId)) {
            return '';
        }

        return $this->getConfig(self::XML_PATH_CLOSE_URL, $storeId);
    }

    public function getIeVersion($storeId = null)
    {
        if (!$this->isEnabled($storeId)) {
            return '';
        }

        return $this->getConfig(self::XML_PATH_IE_VERSION, $storeId);
    }

    public function getJrejectImages()
    {
        $path = $this->path->getPath(ComponentRegistrar::MODULE, 'Augustash_Jreject');

        return $path;
    }

    /**
     * Returns the ID of the current store
     *
     * @return int
     */
    public function getCurrentStoreId()
    {
        return $this->storeManager->getStore()->getStoreId();
    }

    /**
     * Utility function to ease fetching of values from the Stores > Configuration
     *
     * @param  string           $field      # see the etc/adminhtml/system.xml for field names
     * @param  null|integer     $storeId    # Magento store ID
     * @return mixed
     */
    protected function getConfig($field, $storeId = null)
    {
        $storeId = (!is_null($storeId)) ? $storeId : $this->getCurrentStoreId();
        return $this->scopeConfig->getValue(
            $field,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }
}
