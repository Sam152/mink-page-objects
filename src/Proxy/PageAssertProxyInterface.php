<?php

namespace PhpPageObjects\Proxy;

interface PageAssertProxyInterface {

//  /**
//   * Checks that current session address is equals to provided one.
//   *
//   * @param string $page
//   *
//   * @throws \Behat\Mink\Exception\\Behat\Mink\Exception\ExpectationException
//   */
//  public function addressEquals($page);
//
//  /**
//   * Checks that current session address is not equals to provided one.
//   *
//   * @param string $page
//   *
//   * @throws \Behat\Mink\Exception\ExpectationException
//   */
//  public function addressNotEquals($page);
//  /**
//   * Checks that current session address matches regex.
//   *
//   * @param string $regex
//   *
//   * @throws \Behat\Mink\Exception\ExpectationException
//   */
//  public function addressMatches($regex);
//  /**
//   * Checks that specified cookie exists and its value equals to a given one.
//   *
//   * @param string $name  cookie name
//   * @param string $value cookie value
//   *
//   * @throws \Behat\Mink\Exception\ExpectationException
//   */
//  public function cookieEquals($name, $value);
//  /**
//   * Checks that specified cookie exists.
//   *
//   * @param string $name cookie name
//   *
//   * @throws \Behat\Mink\Exception\ExpectationException
//   */
//  public function cookieExists($name);
//
//  /**
//   * Checks that current response code equals to provided one.
//   *
//   * @param int $code
//   *
//   * @throws \Behat\Mink\Exception\ExpectationException
//   */
//  public function statusCodeEquals($code);
//  /**
//   * Checks that current response code not equals to provided one.
//   *
//   * @param int $code
//   *
//   * @throws \Behat\Mink\Exception\ExpectationException
//   */
//  public function statusCodeNotEquals($code);
//  /**
//   * Checks that current response header equals value.
//   *
//   * @param string $name
//   * @param string $value
//   *
//   * @throws \Behat\Mink\Exception\ExpectationException
//   */
//  public function responseHeaderEquals($name, $value);
//  /**
//   * Checks that current response header does not equal value.
//   *
//   * @param string $name
//   * @param string $value
//   *
//   * @throws \Behat\Mink\Exception\ExpectationException
//   */
//  public function responseHeaderNotEquals($name, $value);
//
//  /**
//   * Checks that current response header contains value.
//   *
//   * @param string $name
//   * @param string $value
//   *
//   * @throws \Behat\Mink\Exception\ExpectationException
//   */
//  public function responseHeaderContains($name, $value);
//  /**
//   * Checks that current response header does not contain value.
//   *
//   * @param string $name
//   * @param string $value
//   *
//   * @throws \Behat\Mink\Exception\ExpectationException
//   */
//  public function responseHeaderNotContains($name, $value);
//
//  /**
//   * Checks that current response header matches regex.
//   *
//   * @param string $name
//   * @param string $regex
//   *
//   * @throws \Behat\Mink\Exception\ExpectationException
//   */
//  public function responseHeaderMatches($name, $regex);
//  /**
//   * Checks that current response header does not match regex.
//   *
//   * @param string $name
//   * @param string $regex
//   *
//   * @throws \Behat\Mink\Exception\ExpectationException
//   */
//  public function responseHeaderNotMatches($name, $regex);
//  /**
//   * Checks that current page contains text.
//   *
//   * @param string $text
//   *
//   * @throws \Behat\Mink\Exception\ResponseTextException
//   */
//  public function pageTextContains($text);
//  /**
//   * Checks that current page does not contains text.
//   *
//   * @param string $text
//   *
//   * @throws \Behat\Mink\Exception\ResponseTextException
//   */
//  public function pageTextNotContains($text);
//
//  /**
//   * Checks that current page text matches regex.
//   *
//   * @param string $regex
//   *
//   * @throws \Behat\Mink\Exception\ResponseTextException
//   */
//  public function pageTextMatches($regex);
//  /**
//   * Checks that current page text does not matches regex.
//   *
//   * @param string $regex
//   *
//   * @throws \Behat\Mink\Exception\ResponseTextException
//   */
//  public function pageTextNotMatches($regex);
//  /**
//   * Checks that page HTML (response content) contains text.
//   *
//   * @param string $text
//   *
//   * @throws \Behat\Mink\Exception\ExpectationException
//   */
//  public function responseContains($text);
//
//  /**
//   * Checks that page HTML (response content) does not contains text.
//   *
//   * @param string $text
//   *
//   * @throws \Behat\Mink\Exception\ExpectationException
//   */
//  public function responseNotContains($text);
//
//  /**
//   * Checks that page HTML (response content) matches regex.
//   *
//   * @param string $regex
//   *
//   * @throws \Behat\Mink\Exception\ExpectationException
//   */
//  public function responseMatches($regex);
//
//  /**
//   * Checks that page HTML (response content) does not matches regex.
//   *
//   * @param $regex
//   *
//   * @throws \Behat\Mink\Exception\ExpectationException
//   */
//  public function responseNotMatches($regex);
//
//  /**
//   * Checks that there is specified number of specific elements on the page.
//   *
//   * @param string           $selectorType element selector type (css, xpath)
//   * @param string|array     $selector     element selector
//   * @param int              $count        expected count
//   * @param \Behat\Mink\Element\ElementInterface $container    document to check against
//   *
//   * @throws \Behat\Mink\Exception\ExpectationException
//   */
//  public function elementsCount($selectorType, $selector, $count, ElementInterface $container = null);
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
//  /**
//   * Checks that specific field have provided value.
//   *
//   * @param string             $field     field id|name|label|value
//   * @param string             $value     field value
//   * @param \Behat\Mink\Element\TraversableElement $container document to check against
//   *
//   * @throws \Behat\Mink\Exception\ExpectationException
//   */
//  public function fieldValueEquals($field, $value, TraversableElement $container = null);
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

