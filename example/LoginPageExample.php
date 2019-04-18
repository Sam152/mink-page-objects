<?php

namespace ExampleSite;

use PhpPageObjects\PageObjectBase;
use PHPUnit\Framework\TestCase;

/**
 * The LoginPage class.
 */
class LoginPage extends PageObjectBase {

  /**
   * {@inheritdoc}
   */
  public function getUrl() {
    return '/user/login';
  }

  /**
   * {@inheritdoc}
   */
  protected function getElements() {
    return [
      'resetPassword' => ['named', ['link', 'Reset password']],
      'passwordDescription' => '.edit-pass-description',
      'messages' => '.messages',
    ];
  }

  /**
   * {@inheritdoc}
   */
  protected function getNamedFieldElements() {
    return [
      'name' => 'edit-name',
      'password' => 'edit-password',
      'submit' => 'edit-submit',
      'rememberMe' => 'edit-remember-me',
    ];
  }

  /**
   * An action to login as a user.
   *
   * @param string $username
   *   The username.
   * @param string $password
   *   The password.
   */
  public function loginAs($username, $password) {
    $this
      ->fieldExists('@name')
      ->fieldExists('@password')
      ->checkboxChecked('@rememberMe')
      ->elementContains('@passwordDescription', 'Enter the password that accompanies your username.');
    $this->find('@name')->setValue($username);
    $this->find('@password')->setValue($password);
    $this->find('@submit')->click();
  }

  /**
   * Assert the user was logged in successfully.
   */
  public function assertLoginSuccess() {
    $this->elementContains('@messages', 'You were logged in successfully.');
  }

}

/**
 * The LoginPageTest class.
 */
class LoginPageTest extends TestCase {

  /**
   * @var \Behat\Mink\Session
   */
  protected $session;

  /**
   * @var \Behat\Mink\WebAssert
   */
  protected $assert;

  /**
   * Test the login page.
   */
  public function testLoginPage() {
    $loginPage = new LoginPage($this->session, $this->assert);
    $loginPage->visit()->loginAs('test-user', 'test-password');
    $loginPage->assertLoginSuccess();
  }

}
