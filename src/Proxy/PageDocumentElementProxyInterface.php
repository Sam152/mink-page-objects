<?php

namespace PhpPageObjects\Proxy;

/**
 *
 */
interface PageDocumentElementProxyInterface {

  /**
   *
   */
  public function has($pageElement);

  /**
   *
   */
  public function find($pageElement);

  /**
   *
   */
  public function findAll($pageElement);

}
