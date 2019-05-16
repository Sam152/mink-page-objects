<?php

namespace MinkPageObjects\Proxy;

use Behat\Mink\Element\ElementInterface;
use Behat\Mink\Element\TraversableElement;

interface PageAssertProxyInterface {

  /**
   * Checks that specific element contains HTML.
   *
   * @param string $pageElement
   *   The page element to assert.
   * @param string $html
   *   The HTML to assert.
   *
   * @see \Behat\Mink\WebAssert::elementContains()
   *
   * @throws \Behat\Mink\Exception\ElementHtmlException
   */
  public function elementsCount($pageElement, $count, ElementInterface $container = null);

  /**
   *
   */
  public function elementExists($pageElement, ElementInterface $container = null);

  /**
   *
   */
  public function elementNotExists($pageElement, ElementInterface $container = null);

  /**
   *
   */
  public function elementTextContains($pageElement, $text);

  /**
   *
   */
  public function elementTextNotContains($pageElement, $text);

  /**
   * Checks that specific element contains HTML.
   *
   * @param string $pageElement
   *   The page element to assert.
   * @param string $html
   *   The HTML to assert.
   *
   * @see \Behat\Mink\WebAssert::elementContains()
   *
   * @throws \Behat\Mink\Exception\ElementHtmlException
   */
  public function elementContains($pageElement, $html);

  /**
   *
   */
  public function elementNotContains($pageElement, $html);


  /**
   *
   */
  public function elementAttributeExists($pageElement, $attribute);

  /**
   *
   */
  public function elementAttributeContains($pageElement, $attribute, $text);

  /**
   *
   */
  public function elementAttributeNotContains($pageElement, $attribute, $text);

  /**
   *
   */
  public function fieldExists($fieldElement, TraversableElement $container = null);

  /**
   *
   */
  public function fieldNotExists($fieldElement, TraversableElement $container = null);


  /**
   *
   */
  public function fieldValueEquals($fieldElement, $value, TraversableElement $container = null);

  /**
   *
   */
  public function fieldValueNotEquals($fieldElement, $value, TraversableElement $container = null);


  /**
   *
   */
  public function checkboxChecked($fieldElement, TraversableElement $container = null);

  /**
   *
   */
  public function checkboxNotChecked($fieldElement, TraversableElement $container = null);

}

