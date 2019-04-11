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
  protected $pageUrl = 'about-us.html';

  /**
   * {@inheritdoc}
   */
  protected $elementMap = [
    'pageTitle' => 'h1',
    'staffMembers' => '.staff-members',
    'sam' => '.staff-member--sam',
  ];

}
