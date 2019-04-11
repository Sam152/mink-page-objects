<?php

namespace PhpPageObjects;

use Behat\Mink\Session;
use Behat\Mink\WebAssert;

class PageObjectBase implements PageObjectInterface {

  /**
   * The page element map.
   *
   * @var array
   */
  protected $elementMap;

  /**
   * The URL of the page.
   *
   * @var string
   */
  protected $pageUrl;

  /**
   * @var \Behat\Mink\Session
   */
  private $session;

  /**
   * @var \Behat\Mink\WebAssert
   */
  private $assert;

  public function __construct(Session $session, WebAssert $assert) {
    $this->session = $session;
    $this->assert = $assert;
  }

  protected function getSession() {
    return $this->session;
  }

  protected function assertSession() {
    return $this->assert;
  }

  /**
   * Transform a locator.
   *
   * @param string $locator
   *   The locator to transform.
   *
   * @return string
   *   A locator, resolved from the element map if applicable.
   */
//  public function locate(string $locator) {
//
//    if (substr($locator, 0, 1) === '@') {
//      $element_map = $this->getElementMap();
//      $map_key = substr($locator, 1);
//      if (!isset($element_map[$map_key])) {
//        throw new \InvalidArgumentException(sprintf('Could not find the locator "%s" in the element map.', $locator));
//      }
//      return $element_map[$map_key];
//    }
//    return $locator;
//  }

  public function getElementMap() {
    return $this->elementMap;
  }

  public function getUrl() {
    return $this->pageUrl;
  }

  /**
   * {@inheritdoc}
   * @return $this
   */
  public function visit($url = NULL) {
    $this->session->visit($url ? $url : $this->getUrl());
  }

}
