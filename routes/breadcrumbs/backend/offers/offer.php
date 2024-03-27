<?php

Breadcrumbs::for('admin.offers.index', function ($trail) {
    $trail->push('Offers Management', route('admin.offers.index'));
});

Breadcrumbs::for('admin.offers.create', function ($trail) {
    $trail->parent('admin.offers.index');
    $trail->push('Create Offer', route('admin.offers.create'));
});

Breadcrumbs::for('admin.offers.edit', function ($trail, $id) {
    $trail->parent('admin.offers.index');
    $trail->push('Edit Offer', route('admin.offers.edit', $id));
});
