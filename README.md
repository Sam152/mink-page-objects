Mink Page Objects
====

[![CircleCI](https://circleci.com/gh/Sam152/mink-page-objects.svg?style=svg)](https://circleci.com/gh/Sam152/mink-page-objects)

An implementation of page objects, using the Mink API. This library is a thin
layer on top of the existing Mink API, but encapsulated into page objects. A
page object may contain a list of selectors, form fields and methods for
performing common testing related actions.

This library is designed to be lightweight and introduce as little new API
surface on top of the existing Mink API as possible. The selector and form
field list is inspired by 
[nightwatch.js](https://nightwatchjs.org/guide#working-with-page-objects).

By implementing page objects:

  * You create tests that are easier to read and maintain.
  * You reduce coupling between test cases and markup.
  * You encourage thorough testing by making the whole process easier.

Further reading on the benefits of page objects can be found on [Martin
Fowler's blog post](https://martinfowler.com/bliki/PageObject.html) on
the subject.

Here is an example of a page object you might define with this library for
a login page:

```
<?php

/**
 * The login page object.
 */
class LoginPage extends MinkPageObjects\PageObjectBase {

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
    ];
  }

  /**
   * Login as a given user.
   *
   * @param string $username
   *   The username.
   * @param string $password
   *   The password.
   */
  public function loginAs($username, $password) {
    $this->find('@name')->setValue($username);
    $this->find('@password')->setValue($password);
    $this->find('@submit')->click();
    return $this;
  }

  /**
   * Assert the user was logged in successfully.
   */
  public function assertLoginSuccess() {
    $this->elementContains('@messages', 'You were logged in successfully.');
    return $this;
  }
  
  /**
   * Assert the user was logged in successfully.
   */
  public function assertLoginFail() {
    $this->elementContains('@messages', 'You failed to login.');
    return $this;
  }

}
```

Utilizing a page object in a test may look something like:

```
<?php

/**
 * The login page test case.
 */
class LoginPageTest extends PHPUnit\Framework\TestCase {

  /**
   * Test the login page.
   */
  public function testLoginPage() {
    $login = new LoginPage($this->session, $this->assert);
    $login->visit()
        ->loginAs('test-user', 'test-password')
        ->assertLoginSuccess();
  }

}
```

Methods on page objects may return other page objects in cases where a user is
navigating between two interfaces represented by different page objects:

```
<?php

/**
 * The article list page object.
 */
class ArticleListPage extends MinkPageObjects\PageObjectBase {

  /**
   * {@inheritdoc}
   */
  public function getUrl() {
    return '/articles';
  }

  /**
   * {@inheritdoc}
   */
  protected function getElements() {
    return [
      'articles' => '.articles article',
      'first-article-link' => '.articles article:first-child h2 a',
    ];
  }

  /**
   * Login as a given user.
   *
   * @param string $username
   *   The username.
   * @param string $password
   *   The password.
   */
  public function visitFirstArticle() {
    $this->find('@first-article-link')->click();
    return new ArticlePage($this->getSession(), $this->assertSession());
  }
  
  public function assertArticleCount($total) {
    $this->elementsCount('@articles', $total);
    return $this;
  }

}
```

Then a test method may seamless transition between methods on multiple
different page objects:

```
<?php
$article_list
    ->assertArticleCount(5)
    ->visitFirstArticle()
    ->assertAuthor('Sam');
```
