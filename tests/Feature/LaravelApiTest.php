<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('Can access Users list', function () {


    $response = $this->getJSON('/api/user');
    $response->assertStatus(200);
});

it('Can access Single User', function () {
    $user = factory(User::class)->create();
    $response = $this->getJSON('/api/user/' . $user->id);
    $response->assertStatus(200)
        ->assertJsonPath('data.id', $user->id);
});

it('Can create Single User', function () {
    $user = [
        'name'     => 'John Smith',
        'email'    => 'john@smith.com',
        'password' => 'password'
    ];

    $response = $this->postJSON('/api/user', $user);
    $response->assertStatus(201)
       ->assertJsonPath('data.id', 1)
       ->assertJsonPath('data.name', 'John Smith');
});

it('Can create Update User', function () {
    $user = factory(User::class)->create();
    $update = [
        'name'     => 'John Smith',
    ];

    $response = $this->putJSON('/api/user/1', $update);
    $response->assertStatus(200)
       ->assertJsonPath('data.id', 1)
       ->assertJsonPath('data.name', 'John Smith')
       ->assertJsonPath('data.email', $user->email);
});
