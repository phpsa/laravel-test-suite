<?php
use Phpsa\LaravelPostman\Helper;

$helper = new Helper();

test('laravelpostman', function () {
    assertTrue(true);
});

it('removes trailing slash', function () use ($helper) {
    $after = "/hello/";
    $before ="/hello";
    assertEquals($helper->addTrailingSlash($before), $after);
});

it('replaces route vars with postman vars', function () use ($helper) {
    $route = '/user/{user_id}';
    $postman = '/user/:user_id';
    assertEquals($helper->replaceGetParameters($route), $postman);
});
