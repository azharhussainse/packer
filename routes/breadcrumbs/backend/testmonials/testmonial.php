<?php

Breadcrumbs::for('admin.testmonials.index', function ($trail) {
    $trail->push('Testmonials List', route('admin.testmonials.index'));
});

Breadcrumbs::for('admin.testmonials.create', function ($trail) {
    $trail->parent('admin.testmonials.index');
    $trail->push('Testmonials Management', route('admin.testmonials.create'));
});

Breadcrumbs::for('admin.testmonials.edit', function ($trail, $id) {
    $trail->parent('admin.testmonials.index');
    $trail->push('Testmonials Management', route('admin.testmonials.edit', $id));
});
