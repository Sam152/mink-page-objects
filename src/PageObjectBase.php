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

  /**
   * The element resolver.
   *
   * @var \PhpPageObjects\ElementResolver
   */
  protected $elementResolver;

  public function __construct(Session $session, WebAssert $assert) {
    $this->session = $session;
    $this->assert = $assert;
    $this->elementResolver = new ElementResolver($this->getElements(), $this->getNamedFieldElements());
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
  protected function getElements() {
    return [];
  }

  /**
   * Get a field element map for the current page.
   *
   * @return array
   *   A field element map.
   */
  protected function getNamedFieldElements() {
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
   * {@inheritdoc}
   */
  public function has($pageElement) {
    return $this->getDocument()->has(
      $this->elementResolver->resolveSelectorType($pageElement),
      $this->elementResolver->resolveSelector($pageElement)
    );
  }

  /**
   * {@inheritdoc}
   */
  public function find($pageElement) {
    return $this->getDocument()->find(
      $this->elementResolver->resolveSelectorType($pageElement),
      $this->elementResolver->resolveSelector($pageElement)
    );
  }

  /**
   * {@inheritdoc}
   */
  public function findAll($pageElement) {
    return $this->getDocument()->findAll(
      $this->elementResolver->resolveSelectorType($pageElement),
      $this->elementResolver->resolveSelector($pageElement)
    );
  }

  /**
   * {@inheritdoc}
   */
  public function elementContains($pageElement, $html) {
    $this->assertSession()->elementContains(
      $this->elementResolver->resolveSelectorType($pageElement),
      $this->elementResolver->resolveSelector($pageElement),
      $html
    );
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function elementsCount($pageElement, $count, ElementInterface $container = NULL) {
    $this->assertSession()->elementsCount(
      $this->elementResolver->resolveSelectorType($pageElement),
      $this->elementResolver->resolveSelector($pageElement),
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
      $this->elementResolver->resolveNamedFieldElement($fieldElement),
      $value,
      $container
    );
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function fieldValueNotEquals($fieldElement, $value, TraversableElement $container = NULL) {
    $this->assertSession()->fieldValueNotEquals(
      $this->elementResolver->resolveNamedFieldElement($fieldElement),
      $value,
      $container
    );
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function elementExists($pageElement, ElementInterface $container = NULL) {
    $this->assertSession()->elementExists(
      $this->elementResolver->resolveSelectorType($pageElement),
      $this->elementResolver->resolveSelector($pageElement),
      $container
    );
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function elementNotExists($pageElement, ElementInterface $container = NULL) {
    $this->assertSession()->elementNotExists(
      $this->elementResolver->resolveSelectorType($pageElement),
      $this->elementResolver->resolveSelector($pageElement),
      $container
    );
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function elementTextContains($pageElement, $text) {
    $this->assertSession()->elementTextContains(
      $this->elementResolver->resolveSelectorType($pageElement),
      $this->elementResolver->resolveSelector($pageElement),
      $text
    );
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function elementTextNotContains($pageElement, $text) {
    $this->assertSession()->elementTextNotContains(
      $this->elementResolver->resolveSelectorType($pageElement),
      $this->elementResolver->resolveSelector($pageElement),
      $text
    );
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function elementNotContains($pageElement, $html) {
    $this->assertSession()->elementNotContains(
      $this->elementResolver->resolveSelectorType($pageElement),
      $this->elementResolver->resolveSelector($pageElement),
      $html
    );
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function elementAttributeExists($pageElement, $attribute) {
    return $this->assertSession()->elementAttributeExists(
      $this->elementResolver->resolveSelectorType($pageElement),
      $this->elementResolver->resolveSelector($pageElement),
      $attribute
    );
  }

  /**
   * {@inheritdoc}
   */
  public function elementAttributeContains($pageElement, $attribute, $text) {
    $this->assertSession()->elementAttributeContains(
      $this->elementResolver->resolveSelectorType($pageElement),
      $this->elementResolver->resolveSelector($pageElement),
      $attribute,
      $text
    );
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function elementAttributeNotContains($pageElement, $attribute, $text) {
    $this->assertSession()->elementAttributeNotContains(
      $this->elementResolver->resolveSelectorType($pageElement),
      $this->elementResolver->resolveSelector($pageElement),
      $attribute,
      $text
    );
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function fieldExists($fieldElement, TraversableElement $container = NULL) {
    $this->assertSession()->fieldExists(
      $this->elementResolver->resolveNamedFieldElement($fieldElement),
      $container
    );
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function fieldNotExists($fieldElement, TraversableElement $container = NULL) {
    $this->assertSession()->fieldNotExists(
      $this->elementResolver->resolveNamedFieldElement($fieldElement),
      $container
    );
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function checkboxChecked($fieldElement, TraversableElement $container = NULL) {
    $this->assertSession()->checkboxChecked(
      $this->elementResolver->resolveNamedFieldElement($fieldElement),
      $container
    );
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function checkboxNotChecked($fieldElement, TraversableElement $container = NULL) {
    $this->assertSession()->checkboxNotChecked(
      $this->elementResolver->resolveNamedFieldElement($fieldElement),
      $container
    );
    return $this;
  }

}
