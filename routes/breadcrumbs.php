<?php

// Home
use Diglactic\Breadcrumbs\Breadcrumbs;

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});
// Home > Admin > Departments (manage)
Breadcrumbs::for('departments.index', function($trail){
 $trail -> parent('home');
 $trail->push('departments', route('departments.index'));
});

// Home > Admin > Users (manage)
Breadcrumbs::for('users.index', function($trail){
 $trail -> parent('home');
 $trail->push('users', route('users.index'));
});

// Home > Admin > Departments (create)
Breadcrumbs::for('departments.create', function($trail){
 $trail -> parent('departments.index');
 $trail->push('create', route('users.index'));
});

// Home > Admin > Users (create)
Breadcrumbs::for('users.create', function($trail){
 $trail -> parent('users.index');
 $trail->push('create', route('users.index'));
});

// Profile
Breadcrumbs::for('profile', function($trail){
 $trail->push('Profile', route('users.profile.edit'));
});
