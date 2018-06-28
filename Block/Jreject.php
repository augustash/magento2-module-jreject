<?php

namespace Augustash\Jreject\Block;

class Jreject extends \Magento\Framework\View\Element\Template
{
  /**
   * @var \Augustash\Jreject\Helper\Data
   */
  protected $helper;

  /**
   * class constructor
   *
   * @param \Magento\Framework\View\Element\Template\Context  $context
   * @param \Augustash\Jreject\Helper\Data $helper
   * @param array $data
   */
  public function __construct(
    \Magento\Framework\View\Element\Template\Context $context,
    \Augustash\Jreject\Helper\Data $helper,
    array $data = []
  ) {
    $this->helper = $helper;

    parent::__construct($context, $data);
  }

  /**
   * Check if it is enabled
   *
   * @return boolean
   */
  public function getIsJrejectEnabled()
  {
    return $this->helper->isEnabled();
  }

  public function getIsJrejectAllowedClose()
  {
    return $this->helper->allowModalClose();
  }

  public function getIsJrejectAllowedCloseByEsc()
  {
    return $this->helper->allowModalCloseByEsc();
  }

  public function getJrejectHeader()
  {
    return $this->helper->getCustomHeader();
  }

  public function getJrejectParagraphOne()
  {
    return $this->helper->getParagraphOne();
  }

  public function getJrejectParagraphTwo()
  {
    return $this->helper->getParagraphTwo();
  }

  public function getJrejectgetCloseMessage()
  {
    return $this->helper->getCloseMessage();
  }

  public function getJrejectgetCloseLink()
  {
    return $this->helper->getCloseLink();
  }

  public function getJrejectgetCloseUrl()
  {
    return $this->helper->getCloseUrl();
  }

  public function getJrejectIeVersion()
  {
    return $this->helper->getIeVersion();
  }

  public function getJrejectImages()
  {
    return $this->helper->getJrejectImages();
  }

  public function getLogger()
  {
    return $this->helper->getLogger();
  }
}
