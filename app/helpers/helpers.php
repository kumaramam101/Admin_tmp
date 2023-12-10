<?php
use Illuminate\Support\Str;

function create_slug($value)
{
    $slug = Str::slug($value);
    return $slug;
}
