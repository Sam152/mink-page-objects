<?php

namespace PhpPageObjects;

trait PageObjectFactoryTrait {

  abstract function getDriver();
  abstract function getWebAssert();

  protected function getPage($page_class) {
    return new $page_class($this->getDriver(), $this->getWebAssert());
  }

}
