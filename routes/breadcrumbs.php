<?php

// Home
use Diglactic\Breadcrumbs\Breadcrumbs;

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});
// Home > Admin > Departments
Breadcrumbs::for('admin/departments', function($trail){
 $trail -> parent('home');
 $trail->push('admin / departments', route('departments.index'));
});
