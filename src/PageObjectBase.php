<?php

namespace PhpPageObjects;

use Behat\Mink\Element\ElementInterface;
use Behat\Mink\Element\TraversableElement;
use Behat\Mink\Session;
use Behat\Mink\WebAssert;

abstract class PageObjectBase implements PageObjectInterface {

  /**
   * The locator default.
   */
  const LOCATOR_DEFAULT = 'css';

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
  abstract public function getUrl();

  /**
   * Get an element map for the current page.
   *
   * @return array
   *   An element map.
   */
  protected function getElementMap() {
    return [];
  }

  /**
   * Get a field element map for the current page.
   *
   * @return array
   *   A field element map.
   */
  protected function getFieldElementMap() {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function visit() {
    $this->getSession()->visit($this->getUrl());
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
   * @param string $element
   *   The element to resolve.
   *
   * @return mixed
   *   The matching item from the element map.
   */
  private function getElementFromMap($element) {
    if (substr($element, 0, 1) === '@') {
      $element_map = $this->getElementMap();
      $map_key = substr($element, 1);
      if (!isset($element_map[$map_key])) {
        throw new \InvalidArgumentException(sprintf('Could not find the element "%s" in the element map.', $element));
      }
      return $element_map[$map_key];
    }
    throw new \InvalidArgumentException(sprintf('Could not find the element "%s" in the element map.', $element));
  }

  /**
   * Get a field element from the map.
   *
   * @param string $fieldElement
   *   The element to resolve.
   *
   * @return mixed
   *   The matching item from the element map.
   */
  private function getFieldElementFromMap($fieldElement) {
    if (substr($fieldElement, 0, 1) === '@') {
      $map = $this->getFieldElementMap();
      $map_key = substr($fieldElement, 1);
      if (!isset($map[$map_key])) {
        throw new \InvalidArgumentException(sprintf('Could not find the field element "%s" in the element map.', $fieldElement));
      }
      return $map[$map_key];
    }
    throw new \InvalidArgumentException(sprintf('Could not find the field element "%s" in the element map.', $fieldElement));
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
    $item = $this->getElementFromMap($element);
    return is_array($item) ? $item[1] : $item;
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
    $item = $this->getElementFromMap($element);
    return is_array($item) ? $item[0] : static::LOCATOR_DEFAULT;
  }

  /**
   * {@inheritdoc}
   */
  public function has($pageElement) {
    return $this->getDocument()->has(
      $this->resolveElementLocator($pageElement),
      $this->resolveElementSelector($pageElement)
    );
  }

  /**
   * {@inheritdoc}
   */
  public function find($pageElement) {
    return $this->getDocument()->find(
      $this->resolveElementLocator($pageElement),
      $this->resolveElementSelector($pageElement)
    );
  }

  /**
   * {@inheritdoc}
   */
  public function findAll($pageElement) {
    return $this->getDocument()->findAll(
      $this->resolveElementLocator($pageElement),
      $this->resolveElementSelector($pageElement)
    );
  }

  /**
   * {@inheritdoc}
   */
  public function elementContains($pageElement, $html) {
    $this->assertSession()->elementContains(
      $this->resolveElementLocator($pageElement),
      $this->resolveElementSelector($pageElement),
      $html
    );
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function elementsCount($pageElement, $count, ElementInterface $container = NULL) {
    $this->assertSession()->elementsCount(
      $this->resolveElementLocator($pageElement),
      $this->resolveElementSelector($pageElement),
      $count,
      $container
    );
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function fieldValueEquals($fieldElement, $value, TraversableElement $container = NULL) {
    $this->assertSession()->fieldValueEquals(
      $this->getFieldElementFromMap($fieldElement),
      $value,
      $container
    );
    return $this;
  }

}
