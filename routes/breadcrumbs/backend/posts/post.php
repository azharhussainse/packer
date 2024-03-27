<?php

Breadcrumbs::for('admin.posts.index', function ($trail) {
    $trail->push(__('labels.backend.access.posts.management'), route('admin.posts.index'));
});

Breadcrumbs::for('admin.posts.create', function ($trail) {
    $trail->parent('admin.posts.index');
    $trail->push(__('labels.backend.access.posts.management'), route('admin.posts.create'));
});

Breadcrumbs::for('admin.posts.edit', function ($trail, $id) {
    $trail->parent('admin.posts.index');
    $trail->push(__('labels.backend.access.posts.management'), route('admin.posts.edit', $id));
});
