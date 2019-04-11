<?php

namespace PhpPageObjects;

use PhpPageObjects\Proxy\PageAssertProxyInterface;
use PhpPageObjects\Proxy\PageDocumentElementProxyInterface;

interface PageObjectInterface extends PageAssertProxyInterface, PageDocumentElementProxyInterface {

  /**
   * @return $this
   */
  public function visit();

  /**
   * @return $this
   */
  public function getUrl();

}
