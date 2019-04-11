<?php

namespace PhpPageObjects\Tests;

use Behat\Mink\Session;
use Goez\PageObjects\Context;
use Google\Home;
use PhpPageObjects\PageObjectDriverInterface;
use PhpPageObjects\PageObjectFactoryTrait;

class ExampleUsage {

  use PageObjectFactoryTrait;

  /**
   * @var \Behat\Mink\Driver\DriverInterface
   */
  protected $minkDriver;

  function getDriver() {
    $this->minkDriver;
  }

  /**
   * Test the login page.
   */
  public function testFoo() {
    $this->getPage(SiteSearch::class)
      ->executeSearch('Ponies')
      ->searchResultsContain('Annual pony convention');
  }

  public function testSearchWithKeyword()
  {
    $driver = new Selenium2Driver('phantomjs');

    $session = new Session($driver);
    $session->start();

    $context = new Context($session, [
      'baseUrl' => 'https://www.google.com',
    ]);

    $context->createPage(Home::class)
      ->open()
      ->search('example')
      ->shouldContainText('Example Domain');
  }


}
