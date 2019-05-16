<?php

namespace MinkPageObjects\Tests;

use MinkPageObjects\ElementResolver;
use PHPUnit\Framework\TestCase;

/**
 * Test the element resolver.
 *
 * @coversDefaultClass \MinkPageObjects\ElementResolver
 */
class ElementResolverTest extends TestCase {
  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();
  }

  /**
   * @dataProvider elementResolverTestCases
   */
  public function testElementResolver($elementMap, $namedElementMap, $lookupKey, $expectedSelectorType, $expectedSelector) {
    $resolver = new ElementResolver($elementMap, $namedElementMap);
    $this->assertEquals($expectedSelectorType, $resolver->resolveSelectorType($lookupKey));
    $this->assertEquals($expectedSelector, $resolver->resolveSelector($lookupKey));
  }

  /**
   * Test cases for ::testElementResolver.
   */
  public function elementResolverTestCases() {
    return [
      'Default css selector' => [
        ['footer' => '.footer'],
        [],
        'footer',
        'css',
        '.footer',
      ],
      'Named selector' => [
        [],
        ['submitButton' => 'edit-submit'],
        'submitButton',
        'named',
        ['field', 'edit-submit'],
      ],
      'Element map containing xpath lookup' => [
        ['footer' => ['xpath', '//footer']],
        [],
        'footer',
        'xpath',
        '//footer',
      ],
      'Prefixed lookup key' => [
        ['footer' => ['xpath', '//footer']],
        [],
        '@footer',
        'xpath',
        '//footer',
      ],
    ];
  }

  /**
   * @dataProvider namedElementResolverTestCases
   */
  public function testNamedElementResolver($elementMap, $namedElementMap, $lookupKey, $expectedNamedSelector) {
    $resolver = new ElementResolver($elementMap, $namedElementMap);
    $this->assertEquals($expectedNamedSelector, $resolver->resolveNamedFieldElement($lookupKey));
  }

  public function namedElementResolverTestCases() {
    return [
      'Named element from named map' => [
        [],
        ['submitButton' => 'edit-submit'],
        'submitButton',
        'edit-submit',
      ],
      'Named element from element map' => [
        ['submitButton' => ['named', ['field', 'edit-submit']]],
        [],
        'submitButton',
        'edit-submit',
      ],
    ];
  }

  public function testNamedSelectorNotFound() {
    $resolver = new ElementResolver([
      'footer' => '.footer',
    ], []);
    $this->expectExceptionMessage('Unable to resolve the "footer" element into a named selector.');
    $resolver->resolveNamedFieldElement('footer');
  }

  public function testElementNotFound() {
    $resolver = new ElementResolver([], []);
    $this->expectExceptionMessage('Could not find an element matching the key "foo".');
    $resolver->resolveSelector('foo');
  }

  public function testNamedNonFieldElementResolver() {
    $resolver = new ElementResolver(['submitButton' => ['named', ['foo', 'foo']]], []);
    $this->expectExceptionMessage('Unable to resolve the element to named field selector.');
    $resolver->resolveNamedFieldElement('submitButton');
  }

}
