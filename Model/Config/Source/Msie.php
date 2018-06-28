<?php

namespace Augustash\Jreject\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class Msie implements ArrayInterface
{
  /**
   * @return array
   */
  public function toOptionArray()
  {
    return [
      ['value' => '10', 'label' => __('IE 10')],
      ['value' => '11', 'label' => __('IE 11')],
    ];
  }

  /**
   * Get options in "key-value" format
   *
   * @return array
   */
  public function toArray()
  {
    return [
      '10' => __('IE 10'),
      '11' => __('IE 11'),
    ];
  }
}
