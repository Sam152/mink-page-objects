<?php

namespace PhpPageObjects\Tests;

use Behat\Mink\Driver\GoutteDriver;
use Behat\Mink\Exception\ElementHtmlException;
use Behat\Mink\Exception\ElementNotFoundException;
use Behat\Mink\Exception\ElementTextException;
use Behat\Mink\Exception\ExpectationException;
use Behat\Mink\Session;
use Behat\Mink\WebAssert;
use PhpPageObjects\Tests\Pages\AboutUsPage;
use PHPUnit\Framework\TestCase;

/**
 * Test the integration of page objects.
 *
 * @coversDefaultClass \PhpPageObjects\PageObjectBase
 */
class PageObjectsTest extends TestCase {

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

  /**
   * @covers ::elementContains()
   */
  public function testElementContains() {
    $this->about->elementContains('@pageTitle', 'About us!');
    $this->expectException(ElementHtmlException::class);
    $this->about->elementContains('@pageTitle', 'Invalid title');
  }

  /**
   * @covers ::elementsCount()
   */
  public function testElementsCount() {
    $this->about->elementsCount('@staffMember', 2);
    $this->about->elementsCount('@sam', 1);
    $this->expectException(ExpectationException::class);
    $this->about->elementsCount('@staffMember', 3);
  }

  /**
   * @covers ::getElements()
   * @covers ::find()
   */
  public function testFindComplexElementMap() {
    $this->about->find('@samProfileLink')->click();
    $this->assertRegExp('/profile.html$/', $this->session->getCurrentUrl());
  }

  /**
   * @covers ::has()
   * @covers ::elementExists()
   */
  public function testHasElementExists() {
    $this->assertTrue($this->about->has('@sam'));
    $this->assertFalse($this->about->has('@james'));

    $this->about->elementExists('@sam');
    $this->expectException(ElementNotFoundException::class);
    $this->about->elementExists('@james');
  }

  /**
   * @covers ::elementNotExists()
   */
  public function testElementNotExists() {
    $this->about->elementNotExists('@james');
    $this->expectException(ExpectationException::class);
    $this->about->elementNotExists('@sam');
  }

  /**
   * @covers ::findAll()
   */
  public function testFindAll() {
    $this->assertCount(2, $this->about->findAll('@staffMember'));
  }

  /**
   * @covers ::fieldValueEquals()
   */
  public function testFieldValueEquals() {
    $this->about->fieldValueEquals('@search', 'Search me');
    $this->expectException(ExpectationException::class);
    $this->about->fieldValueEquals('@search', 'Foo bar');
  }

  /**
   * @covers ::fieldValueEquals()
   */
  public function testFieldValueNotEquals() {
    $this->about->fieldValueNotEquals('@search', 'Foo bar');
    $this->expectException(ExpectationException::class);
    $this->about->fieldValueNotEquals('@search', 'Search me');
  }

  /**
   * @covers ::elementTextContains()
   */
  public function testElementContainsText() {
    $this->about->elementTextContains('@sam', 'Sam');
    $this->expectException(ElementTextException::class);
    $this->about->elementTextContains('@sam', 'Joe');
  }

  /**
   * @covers ::elementTextContains()
   */
  public function testElementTextNotContains() {
    $this->about->elementTextNotContains('@sam', 'Joe');
    $this->expectException(ElementTextException::class);
    $this->about->elementTextNotContains('@sam', 'Sam');
  }

  /**
   * @covers ::elementAttributeExists()
   */
  public function testElementAttributeExists() {
    $this->about->elementAttributeExists('@sam', 'data-real-name');
    $this->expectException(ElementHtmlException::class);
    $this->about->elementAttributeExists('@sam', 'data-foo');
  }

  /**
   * @covers ::elementAttributeExists()
   */
  public function testElementAttributeContains() {
    $this->about->elementAttributeContains('@sam', 'data-real-name', 'Sa');
    $this->expectException(ElementHtmlException::class);
    $this->about->elementAttributeContains('@sam', 'data-real-name', 'Foo');
  }

  /**
   * @covers ::elementAttributeExists()
   */
  public function testElementAttributeNotContains() {
    $this->about->elementAttributeNotContains('@sam', 'data-real-name', 'Foo');
    $this->expectException(ElementHtmlException::class);
    $this->about->elementAttributeNotContains('@sam', 'data-real-name', 'Sam');
  }

  /**
   * @covers ::fieldExists()
   */
  public function testFieldExists() {
    $this->about->fieldExists('@search');
    $this->expectException(ElementNotFoundException::class);
    $this->about->fieldExists('@invalidField');
  }

  /**
   * @covers ::fieldExists()
   */
  public function testFieldNotExists() {
    $this->about->fieldNotExists('@invalidField');
    $this->expectException(ExpectationException::class);
    $this->about->fieldNotExists('@search');
  }

  /**
   * @covers ::checkboxChecked()
   */
  public function testCheckboxChecked() {
    $this->about->checkboxChecked('@checkbox');
    $this->expectException(ExpectationException::class);
    $this->about->checkboxChecked('@checkboxOff');
  }

  /**
   * @covers ::checkboxNotChecked()
   */
  public function testCheckboxNotChecked() {
    $this->about->checkboxNotChecked('@checkboxOff');
    $this->expectException(ExpectationException::class);
    $this->about->checkboxNotChecked('@checkbox');
  }

  /**
   * Test you can use normal element method with items in the field map.
   */
  public function testFindWithItemFromFieldMap() {
    $element = $this->about->find('@checkbox');
    $this->assertNotNull($element);
  }

  /**
   * Test you warned correctly for using elements in field-specific methods.
   */
  public function testFieldValueWithItemFromElementMap() {
    // This element is not defined in the named element map, but is explicitly
    // declared as a named element so it can be used in field related methods.
    $this->about->fieldValueNotEquals('@searchElement', 'foo');
  }

}
