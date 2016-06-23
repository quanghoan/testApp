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
    $this->visit('user')->see('Add user');
    $this->assertViewHas('users');
  }


  public function testStoreValidUser()
  {
    $response = $this->call('POST', '/user', [
      'name' => 'dao quang hoan',
      'address' => 'hadong hanoi',
      'age' => '50'
    ]);
    $this->assertTrue(true);
  }

  public function testStoreInvalidName()
  {
    $response = $this->call('POST', '/user', [
      'name' => '',
      'address' => 'hanoi',
      'age' => '92'
    ]);
    $this->assertFalse(false);
  }

  public function testStoreInvalidAddress()
  {
    $response = $this->call('POST', '/user', [
      'name' => 'dao quang hoan',
      'address' => '',
      'age' => '92'
    ]);
    $this->assertFalse(false);
  }

  public function testStoreInvalidAge()
  {
    $response = $this->call('POST', '/user', [
      'name' => 'dao quang hoan',
      'address' => 'hanoi',
      'age' => '100'
    ]);
    $this->assertFalse(false);
  }

  public function testStoreInvalidPhoto()
  {
    $response = $this->call('POST', '/user', [
      'name' => 'dao quang hoan',
      'address' => 'hanoi',
      'age' => '100',
      'photo' => public_path() .'/avatar/draw.png'
    ]);
    $this->notSeeInDatabase('users', ['name'=>'dao quang hoan']);
  }

  public function testDelete()
  {
    $this->call('DELETE', '/user/123', []);
    $deleted= DB::table('users')->where('id', '123')->first();
    $this->notSeeInDatabase('users', ['id' => '123']);
  }

  public function testUpdate()
  {
    $this->call('PATCH', '/user/123', [
      'name' => 'dao quang hoan',
      'address' => 'hanoi',
      'age' => '92'
    ]);
    $updatedname= DB::table('users')->where('id', '123')->first();
    $this->assertEquals($updatedname->name, 'dao quang hoan');
  }
}