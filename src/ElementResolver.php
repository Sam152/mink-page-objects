<?php

namespace PhpPageObjects;

/**
 * The ElementResolver class.
 */
class ElementResolver {

  /**
   * The default selector type.
   */
  const DEFAULT_SELECTOR_TYPE = 'css';

  /**
   * An array of elements.
   *
   * @var array
   */
  protected $elements;

  public function __construct($elements, $namedElements) {
    $this->normalizeElementMaps($elements, $namedElements);
  }

  private function normalizeElementMaps($elements, $namedElements) {
    foreach ($elements as $key => $element) {
      if (is_array($element)) {
        $this->elements[$key] = $element;
      }
      else {
        $this->elements[$key] = [static::DEFAULT_SELECTOR_TYPE, $element];
      }
    }
    foreach ($namedElements as $key => $namedElement) {
      $this->elements[$key] = ['named', ['field', $namedElement]];
    }
  }

  private function normalizeKey($key) {
    if (substr($key, 0, 1) === '@') {
      return substr($key, 1);
    }
    return $key;
  }

  private function resolveElement($key) {
    $key = $this->normalizeKey($key);
    if (!isset($this->elements[$key])) {
      throw new \Exception(sprintf('Could not find an element matching the key "%s".', $key));
    }
    return $this->elements[$key];
  }

  public function resolveSelectorType($key) {
    return $this->resolveElement($key)[0];
  }

  public function resolveSelector($key) {
    return $this->resolveElement($key)[1];
  }

  public function resolveNamedFieldElement($element) {
    if ($this->resolveSelectorType($element) !== 'named') {
      throw new \Exception(sprintf('Unable to resolve the "%s" element into a named selector.', $element));
    }
    $selector = $this->resolveSelector($element);
    if (!is_array($selector) || count($selector) !== 2 || $selector[0] !== 'field') {
      throw new \Exception('Unable to resolve the element to named field selector.');
    }
    return $selector[1];
  }

}
