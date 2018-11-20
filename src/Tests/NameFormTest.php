<?php

namespace Drupal\name_form\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Provide some basic tests for our NameForm form.
 *
 * @group name_form
 */
class NameFormTest extends WebTestBase {

  /**
   * Modules to install.
   *
   * @var array
   */
  public static $modules = ['node', 'name_form'];

  /**
   * Tests that 'name/form' returns a 200.
   */
  public function testNameFormRouterURLIsAccessible() {
    $this->drupalGet('name/form');
    $this->assertResponse(200, 'URL is accessible to user.');
  }

  /**
   * Tests that the form has a submit button to use.
   */
  public function testNameFormSubmitButtonExists() {
    $this->drupalGet('name/form');
    $this->assertFieldById('edit-submit', 'Submit!', 'User can submit the form.');
  }

  /**
   * Test the submission of the form.
   *
   * @throws \Exception
   */
  public function testNameFormSubmit() {
    $this->drupalPostForm(
      'name/form',
      [
        'name' => 'Test Name',
      ],
      t('Submit!')
    );

    $this->assertText('Name: Test Name');
  }

}
