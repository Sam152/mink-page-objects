<?php

namespace PhpPageObjects\Proxy;

/**
 * Interface PageDocumentElementProxyInterface
 *
 * @package PhpPageObjects\Proxy
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
