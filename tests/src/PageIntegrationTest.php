<?php

namespace PhpPageObjects\Tests;

use Behat\Mink\Driver\GoutteDriver;
use Behat\Mink\Exception\ElementHtmlException;
use Behat\Mink\Session;
use Behat\Mink\WebAssert;
use PhpPageObjects\Tests\Pages\AboutUsPage;
use PHPUnit\Framework\TestCase;

/**
 * Test the integration of page objects.
 *
 * @coversDefaultClass \PhpPageObjects\PageObjectBase
 */
class PageIntegrationTest extends TestCase {

  /**
   * @var \Behat\Mink\Driver\GoutteDriver
   */
  protected $driver;

  /**
   * @var \Behat\Mink\Session
   */
  protected $session;

  /**
   * @var \Behat\Mink\WebAssert
   */
  protected $assert;

  /**
   * The test about us page.
   *
   * @var \PhpPageObjects\Tests\Pages\AboutUsPage
   */
  protected $about;

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();
    $this->driver = new GoutteDriver();
    $this->session = new Session($this->driver);
    $this->assert = new WebAssert($this->session);
    $this->session->start();
    $this->assertTrue(TRUE);

    $this->about = new AboutUsPage($this->session, $this->assert);
    $this->about->visit();
  }

  /**
   * @covers ::elementContains()
   */
  public function testElementContains() {
    $this->about->elementContains('@pageTitle', 'About us!');
    $this->expectException(ElementHtmlException::class);
    $this->about->elementContains('@pageTitle', 'Invalid title');
  }

  /**
   * @covers ::getUrl()
   */
  public function testGetUrl() {
    $this->assertEquals('about-us.html', $this->about->getUrl());
  }

  /**
   * @covers ::visit()
   */
  public function testVisit() {
    $this->about->visit();

    $this->assertRegExp(sprintf('/%s$/', $this->about->getUrl()), $this->session->getCurrentUrl());
  }

}
