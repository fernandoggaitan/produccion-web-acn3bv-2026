<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;

    //protected $table = 'canciones';

    protected $fillable = [
        'title',
        'price',
        'description',
        'visible'
    ];

    public function price_format():string
    {
        return number_format($this->price, 2, ',', '.');
    }

    public function comments():HasMany
    {
        return $this->hasMany(Comment::class);
    }

}