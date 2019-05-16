<?php

namespace MinkPageObjects;

use MinkPageObjects\Proxy\PageAssertProxyInterface;
use MinkPageObjects\Proxy\PageDocumentElementProxyInterface;

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
