<?php

namespace PhpPageObjects\Tests\Pages;

use PhpPageObjects\PageObjectBase;

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
  protected function getElementMap() {
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
    ];
  }

  /**
   * {@inheritdoc}
   */
  protected function getFieldElementMap() {
    return [
      'search' => 'edit-staff-search',
    ];
  }

}
