<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
  public function testExample()
  {
    $this->assertTrue(true);
  }

  public function testIndex()
  {
    $this->call('GET', 'user');
    $this->visit('user')->see('Add new user');
    $this->assertViewHas('users');
  }


  public function valid_user()
  {
    $response = $this->call('POST', '/user', [
      'name' => 'dao quang hoan',
      'address' => 'hadong hanoi',
      'age' => '50'
    ]);
    $this->assertRedirectedToAction('userController@store');
  }

  public function invalid_name()
  {
    $response = $this->call('POST', '/user', [
      'name' => '',
      'address' => 'hanoi',
      'age' => '92'
    ]);
    $this->assertFalse(false);
  }

  public function invalid_address()
  {
    $response = $this->call('POST', '/user', [
      'name' => 'dao quang hoan',
      'address' => '',
      'age' => '92'
    ]);
    $this->assertFalse(false);
  }

  public function invalid_age()
  {
    $response = $this->call('POST', '/user', [
      'name' => 'dao quang hoan',
      'address' => 'hanoi',
      'age' => '100'
    ]);
    $this->assertFalse(false);
  }

  public function delete()
  {
    $response = $this->call('DELETE', '/user/123', []);
    $deleted= DB::table('users')->where('id', '123')->first();
    $this->assertRedirectedToAction('UserController@destroy');
  }

  public function edit()
  {
    $response = $this->call('PATCH', '/user/123', [
      'name' => 'dao quang hoan',
      'address' => 'hanoi',
      'age' => '92'
    ]);
    $updatedname= DB::table('users')->where('id', '123')->first();
    $this->assertEquals($updatedname->name, 'dao quang hoan');
  }
}