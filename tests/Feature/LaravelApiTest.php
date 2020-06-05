<?php

use App\Models\User;
use App\Models\Profile;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('denies access via policy for user list', function () {
    $response = $this->getJSON('/api/user');
    $response->assertStatus(403);
})->group('api-controller', 'user-policy');

it('Can access Users list if authed via policy', function () {
    $user = factory(User::class)->create();
    actingAs($user);
    $response = $this->getJSON('/api/user');
    $response->assertStatus(200);
})->group('api-controller', 'user-policy');

it('Can access own user record User via policy', function () {
    $user = factory(User::class)->create();
    actingAs($user);
    $response = $this->getJSON('/api/user/' . $user->id);
    $response->assertStatus(200)
        ->assertJsonPath('data.id', $user->id);
})->group('api-controller', 'user-policy');

it('Can\'t access another user record User via policy', function () {
    $user = factory(User::class)->create();
    $user2 = factory(User::class)->create();
    actingAs($user);
    $response = $this->getJSON('/api/user/' . $user2->id);
    $response->assertStatus(403)->assertJsonPath('message', 'This action is unauthorized.');
})->group('api-controller', 'user-policy');

it('Can create Single User', function () {
    $post = [
        'name'     => 'John Smith',
        'email'    => 'john@smith.com',
        'password' => 'password'
    ];

    $user = factory(User::class)->create();
    actingAs($user);
    $response = $this->postJSON('/api/user', $post);
    $response->assertStatus(201)
        ->assertJsonPath('data.id', 2)
        ->assertJsonPath('data.name', 'John Smith');
})->group('api-controller', 'user-policy');

it('Can create Update User', function () {
    $user = factory(User::class)->create();
    actingAs($user);
    $update = [
        'name'     => 'John Smith',
    ];

    $response = $this->putJSON('/api/user/1', $update);
    $response->assertStatus(200)
        ->assertJsonPath('data.id', 1)
        ->assertJsonPath('data.name', 'John Smith')
        ->assertJsonPath('data.email', $user->email);
})->group('api-controller', 'user-policy');

it('Can\'t create Update other User', function () {
    $user = factory(User::class)->create();
    actingAs($user);
    $user2 = factory(User::class)->create();
    $update = [
        'name'     => 'John Smith',
    ];

    $response = $this->putJSON('/api/user/2', $update);
    $response->assertStatus(403);
})->group('api-controller', 'user-policy');

it('can\'t delete itself', function () {
    $user = factory(User::class)->create();
    actingAs($user);
    $response = $this->deleteJSON('/api/user/1');
    $response->assertStatus(403);
})->group('api-controller', 'user-policy');

it('can delete others', function () {
    $user = factory(User::class)->create();
    $user2 = factory(User::class)->create();
    actingAs($user);
    $response = $this->deleteJSON('/api/user/2');
    $response->assertStatus(204);
})->group('api-controller', 'user-policy');

it('denies access via policy for profile list', function () {
    $response = $this->getJSON('/api/profiles');
    $response->assertStatus(403);
})->group('api-controller', 'profile-policy');

it('Can only get own profile', function () {

    factory(User::class, 10)->create()->each(function ($user) {
            $user->profile()->save(factory(Profile::class)->make());
    });


    $user = factory(User::class)->create();
    $user->profile()->save(factory(Profile::class)->make());
    actingAs($user);

      factory(User::class, 10)->create()->each(function ($user) {
            $user->profile()->save(factory(Profile::class)->make());
      });

    $response = $this->getJSON('/api/profiles');
    $response->assertStatus(200)
    ->assertJsonPath('data.0.user_id', $user->id)
    ->assertJsonPath('meta.total', 1);
})->group('api-controller', 'user-policy');
