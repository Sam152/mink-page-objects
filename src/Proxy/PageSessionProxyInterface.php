<?php

namespace PhpPageObjects\Proxy;

interface PageSessionProxyInterface {

  /**
   * Checks whether session (driver) was started.
   *
   * @return Boolean
   */
  public function isStarted();

  /**
   * Starts session driver.
   *
   * Calling any action before visiting a page is an undefined behavior.
   * The only supported method calls on a fresh driver are
   * - visit()
   * - setRequestHeader()
   * - setBasicAuth()
   * - reset()
   * - stop()
   */
  public function start();

  /**
   * Stops session driver.
   */
  public function stop();

  /**
   * Restart session driver.
   */
  public function restart();

  /**
   * Reset session driver state.
   *
   * Calling any action before visiting a page is an undefined behavior.
   * The only supported method calls on a fresh driver are
   * - visit()
   * - setRequestHeader()
   * - setBasicAuth()
   * - reset()
   * - stop()
   */
  public function reset();

  /**
   * Returns session driver.
   *
   * @return \Behat\Mink\Driver\DriverInterface
   */
  public function getDriver();

  /**
   * Returns page element.
   *
   * @return \Behat\Mink\Element\DocumentElement
   */
  public function getPage();

  /**
   * Returns selectors handler.
   *
   * @return \Behat\Mink\Selector\SelectorsHandler
   */
  public function getSelectorsHandler();

  /**
   * Sets HTTP Basic authentication parameters.
   *
   * @param string|Boolean $user     user name or false to disable authentication
   * @param string         $password password
   */
  public function setBasicAuth($user, $password = '');

  /**
   * Sets specific request header.
   *
   * @param string $name
   * @param string $value
   */
  public function setRequestHeader($name, $value);

  /**
   * Returns all response headers.
   *
   * @return array
   */
  public function getResponseHeaders();

  /**
   * Returns specific response header.
   *
   * @param string $name
   *
   * @return string|null
   */
  public function getResponseHeader($name);

  /**
   * Sets cookie.
   *
   * @param string $name
   * @param string $value
   */
  public function setCookie($name, $value = null);

  /**
   * Returns cookie by name.
   *
   * @param string $name
   *
   * @return string|null
   */
  public function getCookie($name);

  /**
   * Returns response status code.
   *
   * @return int
   */
  public function getStatusCode();

  /**
   * Returns current URL address.
   *
   * @return string
   */
  public function getCurrentUrl();

  /**
   * Capture a screenshot of the current window.
   *
   * @return string screenshot of MIME type image/* depending
   *                on driver (e.g., image/png, image/jpeg)
   */
  public function getScreenshot();

  /**
   * Return the names of all open windows.
   *
   * @return array Array of all open window's names.
   */
  public function getWindowNames();

  /**
   * Return the name of the currently active window.
   *
   * @return string The name of the current window.
   */
  public function getWindowName();

  /**
   * Reloads current session page.
   */
  public function reload();

  /**
   * Moves backward 1 page in history.
   */
  public function back();

  /**
   * Moves forward 1 page in history.
   */
  public function forward();

  /**
   * Switches to specific browser window.
   *
   * @param string $name window name (null for switching back to main window)
   */
  public function switchToWindow($name = null);

  /**
   * Switches to specific iFrame.
   *
   * @param string $name iframe name (null for switching back)
   */
  public function switchToIFrame($name = null);

  /**
   * Execute JS in browser.
   *
   * @param string $script javascript
   */
  public function executeScript($script);

  /**
   * Execute JS in browser and return it's response.
   *
   * @param string $script javascript
   *
   * @return string
   */
  public function evaluateScript($script);

  /**
   * Waits some time or until JS condition turns true.
   *
   * @param int    $time      time in milliseconds
   * @param string $condition JS condition
   *
   * @return bool
   */
  public function wait($time, $condition = 'false');

  /**
   * Set the dimensions of the window.
   *
   * @param int    $width  set the window width, measured in pixels
   * @param int    $height set the window height, measured in pixels
   * @param string $name   window name (null for the main window)
   */
  public function resizeWindow($width, $height, $name = null);

  /**
   * Maximize the window if it is not maximized already.
   *
   * @param string $name window name (null for the main window)
   */
  public function maximizeWindow($name = null);

}
