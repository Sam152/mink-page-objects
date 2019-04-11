<?php

namespace PhpPageObjects;

use Behat\Mink\Session;
use Behat\Mink\WebAssert;

abstract class PageObjectBase implements PageObjectInterface {

  /**
   * The page element map.
   *
   * @var array
   */
  protected $elementMap = [];

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

  /**
   * {@inheritdoc}
   */
  public function visit() {
    $this->getSession()->visit($this->getUrl());
  }

  /**
   * {@inheritdoc}
   */
  public function getUrl() {
    return $this->pageUrl;
  }

  /**
   * Get the session associated with the given page.
   *
   * @return \Behat\Mink\Session
   */
  protected function getSession() {
    return $this->session;
  }

  /**
   * Get the web assertion.
   *
   * @return \Behat\Mink\WebAssert
   *   The web assertion.
   */
  protected function assertSession() {
    return $this->assert;
  }

  /**
   * Get the document of the current page.
   *
   * @return \Behat\Mink\Element\DocumentElement
   *   The document.
   */
  protected function getDocument() {
    return $this->getSession()->getPage();
  }

  /**
   * Get the map of elements created for this page.
   *
   * @return array
   *   The map of elements created for this page.
   */
  protected function getElementMap() {
    return $this->elementMap;
  }

  /**
   * Resolve an element into a selector.
   *
   * @param string $element
   *   The page element.
   *
   * @return string
   *   The associated selector.
   */
  protected function resolveElementSelector($element) {
    if (substr($element, 0, 1) === '@') {
      $element_map = $this->getElementMap();
      $map_key = substr($element, 1);
      if (!isset($element_map[$map_key])) {
        throw new \InvalidArgumentException(sprintf('Could not find the locator "%s" in the element map.', $locator));
      }
      return $element_map[$map_key];
    }
    return $element;
  }

  /**
   * Resolve an element into a locator.
   *
   * @param string $element
   *   The page element.
   *
   * @return string
   *   The associated locator.
   */
  protected function resolveElementLocator($element) {
    return 'css';
  }

  /**
   * {@inheritdoc}
   */
  public function has($selector, $locator) {
    return $this->getDocument()->has($selector, $locator);
  }

  /**
   * {@inheritdoc}
   */
  public function isValid() {
    return $this->getDocument()->isValid();
  }

  /**
   * {@inheritdoc}
   */
  public function waitFor($timeout, $callback) {
    return $this->getDocument()->waitFor($timeout, $callback);
  }

  /**
   * {@inheritdoc}
   */
  public function find($selector, $locator) {
    return $this->getDocument()->find($selector, $locator);
  }

  /**
   * {@inheritdoc}
   */
  public function findAll($selector, $locator) {
    return $this->getDocument()->findAll($selector, $locator);
  }

  /**
   * {@inheritdoc}
   */
  public function getText() {
    return $this->getDocument()->getText();
  }

  /**
   * {@inheritdoc}
   */
  public function getHtml() {
    return $this->getDocument()->getHtml();
  }

  /**
   * {@inheritdoc}
   */
  public function elementContains($pageElement, $html) {
    $this->assert->elementContains(
      $this->resolveElementLocator($pageElement),
      $this->resolveElementSelector($pageElement),
      $html
    );
    return $this;
  }

}
