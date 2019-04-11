<?php

namespace PhpPageObjects\Tests;

use PhpPageObjects\PageObjectBase;

class SiteSearch extends PageObjectBase {

  /**
   * {@inheritdoc}
   */
  protected $url = '/search';

  /**
   * {@inheritdoc}
   */
  protected $elementMap = [
    'input' => '.site-search-input',
    'submitButton' => '.submit-button',
    'results' => '.search-results',
  ];

  /**
   * Login to the user form.
   */
  public function executeSearch($term) {
    $this
      ->visit()
      ->setValue('@input', $term)
      ->click('@submitButton');
    return $this;
  }

  public function searchResultsContain($value) {
    $this->elementContains('@results', $value);
    return $this;
  }

}
