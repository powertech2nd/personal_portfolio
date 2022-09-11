<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use App\Models\Education;
use App\Models\TechStackType;
// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


/* EDUCATION */
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
/* end EDUCATION */

/* WORKPLACE */
Breadcrumbs::for('workplaces.index', function (BreadcrumbTrail $trail) {
    $trail->push('Workplaces', route('workplaces.index'));
});
/* end EDUCATION */


/* TECHSTACK TYPE */
Breadcrumbs::for('techStackTypes.index', function (BreadcrumbTrail $trail) {
    $trail->push('Tech Stack Type', route('techStackTypes.index'));
});

Breadcrumbs::for('techStackTypes.create', function (BreadcrumbTrail $trail) {
    $trail->parent('techStackTypes.index');
    $trail->push('Create', route('techStackTypes.create'));
});

Breadcrumbs::for('techStackTypes.edit', function (BreadcrumbTrail $trail, TechStackType $techStackType) {
    $trail->parent('techStackTypes.index');
    $trail->push('Edit', route('techStackTypes.edit', $techStackType));
});
/* end TECHSTACK TYPE */
