<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model

{

    use HasFactory;
    use SoftDeletes;
    public $timestamps = false;
    protected $guarded=[];

    public function books(): HasManyThrough
    {
        return $this->hasManyThrough
        (Book::class, Order::class, secondKey: 'id', secondLocalKey: 'book_id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany
        (Orders::class);
    }

};