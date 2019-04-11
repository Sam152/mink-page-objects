<?php

namespace PhpPageObjects\Proxy;

interface PageDriverProxyInterface {

  /**
   * Returns current URL address.
   *
   * @return string
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function getCurrentUrl();

  /**
   * Reloads current page.
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function reload();

  /**
   * Moves browser forward 1 page.
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function forward();

  /**
   * Moves browser backward 1 page.
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function back();

  /**
   * Sets HTTP Basic authentication parameters.
   *
   * @param string|Boolean $user     user name or false to disable authentication
   * @param string         $password password
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function setBasicAuth($user, $password);

  /**
   * Switches to specific browser window.
   *
   * @param string $name window name (null for switching back to main window)
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function switchToWindow($name = null);

  /**
   * Switches to specific iFrame.
   *
   * @param string $name iframe name (null for switching back)
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function switchToIFrame($name = null);

  /**
   * Sets specific request header on client.
   *
   * @param string $name
   * @param string $value
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function setRequestHeader($name, $value);

  /**
   * Returns last response headers.
   *
   * @return array
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function getResponseHeaders();

  /**
   * Sets cookie.
   *
   * @param string $name
   * @param string $value
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function setCookie($name, $value = null);

  /**
   * Returns cookie by name.
   *
   * @param string $name
   *
   * @return string|null
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function getCookie($name);

  /**
   * Returns last response status code.
   *
   * @return int
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function getStatusCode();

  /**
   * Returns last response content.
   *
   * @return string
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function getContent();

  /**
   * Capture a screenshot of the current window.
   *
   * @return string screenshot of MIME type image/* depending
   *                on driver (e.g., image/png, image/jpeg)
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function getScreenshot();

  /**
   * Return the names of all open windows.
   *
   * @return array array of all open windows
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function getWindowNames();

  /**
   * Return the name of the currently active window.
   *
   * @return string the name of the current window
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function getWindowName();

  /**
   * Finds elements with specified XPath query.
   *
   * @param string $xpath
   *
   * @return \Behat\Mink\Element\NodeElement[]
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function find($xpath);

  /**
   * Returns element's tag name by it's XPath query.
   *
   * @param string $xpath
   *
   * @return string
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function getTagName($xpath);

  /**
   * Returns element's text by it's XPath query.
   *
   * @param string $xpath
   *
   * @return string
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function getText($xpath);

  /**
   * Returns element's inner html by it's XPath query.
   *
   * @param string $xpath
   *
   * @return string
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function getHtml($xpath);

  /**
   * Returns element's outer html by it's XPath query.
   *
   * @param string $xpath
   *
   * @return string
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function getOuterHtml($xpath);

  /**
   * Returns element's attribute by it's XPath query.
   *
   * @param string $xpath
   * @param string $name
   *
   * @return string|null
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function getAttribute($xpath, $name);

  /**
   * Returns element's value by it's XPath query.
   *
   * @param string $xpath
   *
   * @return string|bool|array
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   *
   * @see \Behat\Mink\Element\NodeElement::getValue
   */
  public function getValue($xpath);

  /**
   * Sets element's value by it's XPath query.
   *
   * @param string            $xpath
   * @param string|bool|array $value
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   *
   * @see \Behat\Mink\Element\NodeElement::setValue
   */
  public function setValue($xpath, $value);

  /**
   * Checks checkbox by it's XPath query.
   *
   * @param string $xpath
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   *
   * @see \Behat\Mink\Element\NodeElement::check
   */
  public function check($xpath);

  /**
   * Unchecks checkbox by it's XPath query.
   *
   * @param string $xpath
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   *
   * @see \Behat\Mink\Element\NodeElement::uncheck
   */
  public function uncheck($xpath);

  /**
   * Checks whether checkbox or radio button located by it's XPath query is checked.
   *
   * @param string $xpath
   *
   * @return Boolean
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   *
   * @see \Behat\Mink\Element\NodeElement::isChecked
   */
  public function isChecked($xpath);

  /**
   * Selects option from select field or value in radio group located by it's XPath query.
   *
   * @param string  $xpath
   * @param string  $value
   * @param Boolean $multiple
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   *
   * @see \Behat\Mink\Element\NodeElement::selectOption
   */
  public function selectOption($xpath, $value, $multiple = false);

  /**
   * Checks whether select option, located by it's XPath query, is selected.
   *
   * @param string $xpath
   *
   * @return Boolean
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   *
   * @see \Behat\Mink\Element\NodeElement::isSelected
   */
  public function isSelected($xpath);

  /**
   * Clicks button or link located by it's XPath query.
   *
   * @param string $xpath
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function click($xpath);

  /**
   * Double-clicks button or link located by it's XPath query.
   *
   * @param string $xpath
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function doubleClick($xpath);

  /**
   * Right-clicks button or link located by it's XPath query.
   *
   * @param string $xpath
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function rightClick($xpath);

  /**
   * Attaches file path to file field located by it's XPath query.
   *
   * @param string $xpath
   * @param string $path
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   *
   * @see \Behat\Mink\Element\NodeElement::attachFile
   */
  public function attachFile($xpath, $path);

  /**
   * Checks whether element visible located by it's XPath query.
   *
   * @param string $xpath
   *
   * @return Boolean
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function isVisible($xpath);

  /**
   * Simulates a mouse over on the element.
   *
   * @param string $xpath
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function mouseOver($xpath);

  /**
   * Brings focus to element.
   *
   * @param string $xpath
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function focus($xpath);

  /**
   * Removes focus from element.
   *
   * @param string $xpath
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function blur($xpath);

  /**
   * Presses specific keyboard key.
   *
   * @param string     $xpath
   * @param string|int $char     could be either char ('b') or char-code (98)
   * @param string     $modifier keyboard modifier (could be 'ctrl', 'alt', 'shift' or 'meta')
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function keyPress($xpath, $char, $modifier = null);

  /**
   * Pressed down specific keyboard key.
   *
   * @param string     $xpath
   * @param string|int $char     could be either char ('b') or char-code (98)
   * @param string     $modifier keyboard modifier (could be 'ctrl', 'alt', 'shift' or 'meta')
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function keyDown($xpath, $char, $modifier = null);

  /**
   * Pressed up specific keyboard key.
   *
   * @param string     $xpath
   * @param string|int $char     could be either char ('b') or char-code (98)
   * @param string     $modifier keyboard modifier (could be 'ctrl', 'alt', 'shift' or 'meta')
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function keyUp($xpath, $char, $modifier = null);

  /**
   * Drag one element onto another.
   *
   * @param string $sourceXpath
   * @param string $destinationXpath
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function dragTo($sourceXpath, $destinationXpath);

  /**
   * Executes JS script.
   *
   * @param string $script
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function executeScript($script);

  /**
   * Evaluates JS script.
   *
   * The "return" keyword is optional in the script passed as argument. Driver implementations
   * must accept the expression both with and without the keyword.
   *
   * @param string $script
   *
   * @return mixed
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function evaluateScript($script);

  /**
   * Waits some time or until JS condition turns true.
   *
   * @param int    $timeout   timeout in milliseconds
   * @param string $condition JS condition
   *
   * @return bool
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function wait($timeout, $condition);

  /**
   * Set the dimensions of the window.
   *
   * @param int    $width  set the window width, measured in pixels
   * @param int    $height set the window height, measured in pixels
   * @param string $name   window name (null for the main window)
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function resizeWindow($width, $height, $name = null);

  /**
   * Maximizes the window if it is not maximized already.
   *
   * @param string $name window name (null for the main window)
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   */
  public function maximizeWindow($name = null);

  /**
   * Submits the form.
   *
   * @param string $xpath Xpath.
   *
   * @throws \Behat\Mink\Exception\UnsupportedDriverActionException When operation not supported by the driver
   * @throws \Behat\Mink\Exception\DriverException                  When the operation cannot be done
   *
   * @see \Behat\Mink\Element\NodeElement::submitForm
   */
  public function submitForm($xpath);

}
