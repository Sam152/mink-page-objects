<?php

namespace MinkPageObjects\Tests\Pages;

use MinkPageObjects\PageObjectBase;

/**
 * A simple example of a page object for an about page.
 *
 * The associated markup for this page is in the tests fixtures folder.
 */
class AboutUsPage extends PageObjectBase {

  /**
   * {@inheritdoc}
   */
  public function getUrl() {
    return 'about-us.html';
  }

  /**
   * {@inheritdoc}
   */
  protected function getElements() {
    return [
      'pageTitle' => 'h1',
      'staffMembers' => '.staff-members',
      'staffMember' => '.staff-member',
      'sam' => '.staff-member--sam',
      'james' => '.staff-member--james',
      'samProfileLink' => [
        'named',
        ['link', 'Visit profile'],
      ],
      'searchElement' => ['named', ['field', 'edit-staff-search']],
    ];
  }

  /**
   * {@inheritdoc}
   */
  protected function getNamedFieldElements() {
    return [
      'search' => 'edit-staff-search',
      'invalidField' => 'foo-bar',
      'checkbox' => 'test-checkbox',
      'checkboxOff' => 'test-checkbox-off',
    ];
  }

}
