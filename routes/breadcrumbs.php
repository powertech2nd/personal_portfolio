<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use App\Models\Education;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


Breadcrumbs::for('educations.index', function (BreadcrumbTrail $trail) {
    $trail->push('Educations', route('educations.index'));
});

Breadcrumbs::for('educations.create', function (BreadcrumbTrail $trail) {
    $trail->parent('educations.index');
    $trail->push('Create', route('educations.create'));
});

Breadcrumbs::for('educations.edit', function (BreadcrumbTrail $trail, Education $education) {
    $trail->parent('educations.index');
    $trail->push('Edit', route('educations.edit', $education));
});


Breadcrumbs::for('workplaces.index', function (BreadcrumbTrail $trail) {
    $trail->push('Workplaces', route('workplaces.index'));
});
