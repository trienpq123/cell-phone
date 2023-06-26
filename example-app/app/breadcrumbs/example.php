<?php
use Llama\Breadcrumbs\Breadcrumbs;

Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Trang chủ', route('home'));
});

Breadcrumbs::register('category', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push($category->name, route('category', $category));
});

Breadcrumbs::register('product', function ($breadcrumbs, $product) {
    $breadcrumbs->parent('category', $product->category);
    $breadcrumbs->push($product->name, route('product', $product));
});
