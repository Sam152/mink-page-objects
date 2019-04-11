<?php

namespace PhpPageObjects\Proxy;

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

//
//  /**
//   * Checks that specific element exists on the current page.
//   *
//   * @param string           $selectorType element selector type (css, xpath)
//   * @param string|array     $selector     element selector
//   * @param \Behat\Mink\Element\ElementInterface $container    document to check against
//   *
//   * @return \Behat\Mink\Element\NodeElement
//   *
//   * @throws \Behat\Mink\Exception\ElementNotFoundException
//   */
//  public function elementExists($selectorType, $selector, ElementInterface $container = null);
//
//  /**
//   * Checks that specific element does not exists on the current page.
//   *
//   * @param string           $selectorType element selector type (css, xpath)
//   * @param string|array     $selector     element selector
//   * @param \Behat\Mink\Element\ElementInterface $container    document to check against
//   *
//   * @throws \Behat\Mink\Exception\ExpectationException
//   */
//  public function elementNotExists($selectorType, $selector, ElementInterface $container = null);
//
//  /**
//   * Checks that specific element contains text.
//   *
//   * @param string       $selectorType element selector type (css, xpath)
//   * @param string|array $selector     element selector
//   * @param string       $text         expected text
//   *
//   * @throws \Behat\Mink\Exception\ElementTextException
//   */
//  public function elementTextContains($selectorType, $selector, $text);
//  /**
//   * Checks that specific element does not contains text.
//   *
//   * @param string       $selectorType element selector type (css, xpath)
//   * @param string|array $selector     element selector
//   * @param string       $text         expected text
//   *
//     * @throws \Behat\Mink\Exception\ElementTextException
//   */
//  public function elementTextNotContains($selectorType, $selector, $text);

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

//  /**
//   * Checks that specific element does not contains HTML.
//   *
//   * @param string       $selectorType element selector type (css, xpath)
//   * @param string|array $selector     element selector
//   * @param string       $html         expected text
//   *
//   * @throws \Behat\Mink\Exception\ElementHtmlException
//   */
//  public function elementNotContains($selectorType, $selector, $html);
//
//  /**
//   * Checks that an attribute exists in an element.
//   *
//   * @param string       $selectorType
//   * @param string|array $selector
//   * @param string       $attribute
//   *
//   * @return \Behat\Mink\Element\NodeElement
//   *
//   * @throws \Behat\Mink\Exception\ElementHtmlException
//   */
//  public function elementAttributeExists($selectorType, $selector, $attribute);
//
//  /**
//   * Checks that an attribute of a specific elements contains text.
//   *
//   * @param string       $selectorType
//   * @param string|array $selector
//   * @param string       $attribute
//   * @param string       $text
//   *
//   * @throws \Behat\Mink\Exception\ElementHtmlException
//   */
//  public function elementAttributeContains($selectorType, $selector, $attribute, $text);
//
//  /**
//   * Checks that an attribute of a specific elements does not contain text.
//   *
//   * @param string       $selectorType
//   * @param string|array $selector
//   * @param string       $attribute
//   * @param string       $text
//   *
//   * @throws \Behat\Mink\Exception\ElementHtmlException
//   */
//  public function elementAttributeNotContains($selectorType, $selector, $attribute, $text);
//
//  /**
//   * Checks that specific field exists on the current page.
//   *
//   * @param string             $field     field id|name|label|value
//   * @param \Behat\Mink\Element\TraversableElement $container document to check against
//   *
//   * @return \Behat\Mink\Element\NodeElement
//   *
//   * @throws \Behat\Mink\Exception\ElementNotFoundException
//   */
//  public function fieldExists($field, TraversableElement $container = null);
//
//  /**
//   * Checks that specific field does not exists on the current page.
//   *
//   * @param string             $field     field id|name|label|value
//   * @param \Behat\Mink\Element\TraversableElement $container document to check against
//   *
//   * @throws \Behat\Mink\Exception\ExpectationException
//   */
//  public function fieldNotExists($field, TraversableElement $container = null);
//

  /**
   * Checks that specific field have provided value.
   *
   * @param string             $field     field id|name|label|value
   * @param string             $value     field value
   * @param \Behat\Mink\Element\TraversableElement $container document to check against
   *
   * @throws \Behat\Mink\Exception\ExpectationException
   */
  public function fieldValueEquals($field, $value, TraversableElement $container = null);

//  /**
//   * Checks that specific field have provided value.
//   *
//   * @param string             $field     field id|name|label|value
//   * @param string             $value     field value
//   * @param \Behat\Mink\Element\TraversableElement $container document to check against
//   *
//   * @throws \Behat\Mink\Exception\ExpectationException
//   */
//  public function fieldValueNotEquals($field, $value, TraversableElement $container = null);
//
//  /**
//   * Checks that specific checkbox is checked.
//   *
//   * @param string             $field     field id|name|label|value
//   * @param \Behat\Mink\Element\TraversableElement $container document to check against
//   *
//   * @throws \Behat\Mink\Exception\ExpectationException
//   */
//  public function checkboxChecked($field, TraversableElement $container = null);
//
//  /**
//   * Checks that specific checkbox is unchecked.
//   *
//   * @param string             $field     field id|name|label|value
//   * @param \Behat\Mink\Element\TraversableElement $container document to check against
//   *
//   * @throws \Behat\Mink\Exception\ExpectationException
//   */
//  public function checkboxNotChecked($field, TraversableElement $container = null);

}

