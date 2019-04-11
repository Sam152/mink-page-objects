<?php

namespace PhpPageObjects;

use PhpPageObjects\Proxy\PageAssertProxyInterface;
use PhpPageObjects\Proxy\PageDriverProxyInterface;
use PhpPageObjects\Proxy\PageSessionProxyInterface;

/**
 *
 */
interface PageObjectInterface extends PageAssertProxyInterface, PageDriverProxyInterface, PageSessionProxyInterface {

  public function visit();

}
