<?php
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Trang Chủ', route('home'));
    $trail->push('Phim', route('movies.index'));
});
Breadcrumbs::for('now-showing', function ($trail) {
    $trail->push('Trang Chủ', route('home'));
    $trail->push('Phim đang chiếu', route('now-showing'));
});
Breadcrumbs::for('coming-soon', function ($trail) {
    $trail->push('Trang Chủ', route('home'));
    $trail->push('Phim đang chiếu', route('coming-soon'));
});

//// Định nghĩa breadcrumbs cho trang chi tiết phim
//Breadcrumbs::for('movies.show', function ($trail, $movie) {
//    $trail->parent('movies.index');
//    $trail->push($movie->title, route('movies.show', $movie->id));
//});
