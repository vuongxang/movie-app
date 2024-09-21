<?php

use App\Models\Movie;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Trang Chủ', route('home'));
    $trail->push('Phim', route('movies.index'));
});
Breadcrumbs::for('now-showing', function ($trail) {
    $trail->push('Trang Chủ', route('home'));
    $trail->push('Phim');
    $trail->push('Phim đang chiếu', route('now-showing'));
});
Breadcrumbs::for('coming-soon', function ($trail) {
    $trail->push('Trang Chủ', route('home'));
    $trail->push('Phim');
    $trail->push('Phim sắp chiếu', route('coming-soon'));
});
Breadcrumbs::for('movies.detail', function ($trail) {
    $trail->push('Trang Chủ', route('home'));
    $trail->push('Phim');
});

