<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > Business
Breadcrumbs::for('business', function ($trail) {
    $trail->parent('home');
    $trail->push('List Business', route('business'));
});