<?php

namespace PhpPageObjects\Proxy;

/**
 * Interface PageDocumentElementProxyInterface
 *
 * @package PhpPageObjects\Proxy
 */
interface PageDocumentElementProxyInterface {

  /**
   * Checks whether element with specified selector exists inside the current element.
   *
   * @param string       $selector selector engine name
   * @param string|array $locator  selector locator
   *
   * @return Boolean
   *
   * @see ElementInterface::findAll for the supported selectors
   */
  public function has($selector, $locator);

  /**
   * Finds first element with specified selector inside the current element.
   *
   * @param string       $selector selector engine name
   * @param string|array $locator  selector locator
   *
   * @return \Behat\Mink\Element\NodeElement|null
   *
   * @see ElementInterface::findAll for the supported selectors
   */
  public function find($selector, $locator);

  /**
   * Finds all elements with specified selector inside the current element.
   *
   * Valid selector engines are named, xpath, css, named_partial and named_exact.
   *
   * 'named' is a pseudo selector engine which prefers an exact match but
   * will return a partial match if no exact match is found.
   * 'xpath' is a pseudo selector engine supported by SelectorsHandler.
   *
   * More selector engines can be registered in the SelectorsHandler.
   *
   * @param string       $selector selector engine name
   * @param string|array $locator  selector locator
   *
   * @return \Behat\Mink\Element\NodeElement[]
   *
   * @see NamedSelector for the locators supported by the named selectors
   */
  public function findAll($selector, $locator);

}
