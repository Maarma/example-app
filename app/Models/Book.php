<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model

{

    use HasFactory;
    use SoftDeletes;
    public $timestamps = false;
    protected $guarded=[];

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class, 'book_authors');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'client_id');
    }
    protected function price(): Attribute
    {
        return Attribute::make (
        get: fn (float $value) => round($value, 2),
        );
}

};
