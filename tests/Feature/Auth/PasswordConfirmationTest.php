<?php

use App\Models\User;
use Livewire\Volt\Volt;

test('confirm password screen can be rendered', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('password.confirm'));

    $response->assertStatus(200);
});

test('password can be confirmed', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $response = Volt::test('auth.confirm-password')
        ->set('password', 'password')
        ->call('confirmPassword');

    $response
        ->assertHasNoErrors()
        ->assertRedirect(route('dashboard', absolute: false));
});

test('password is not confirmed with invalid password', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $response = Volt::test('auth.confirm-password')
        ->set('password', 'wrong-password')
        ->call('confirmPassword');

    $response->assertHasErrors(['password']);
});