<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Vehicle extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'plate',
        'model',
        'brand',
        'description',
        'photo',
        'rental_cost',
        'category_id',
        'year'
    ];

    protected $appends = ['active_rental'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['brand', 'model'])
            ->saveSlugsTo('slug');
    }

    public function category()
    {
        return $this->belongsTo(VehicleCategory::class);
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    public function getActiveRentalAttribute()
    {
        return $this->rentals()->where('status', 'Ativa')->first();
    }

    public function getPhotoAttribute($value)
    {
        if ($value) $value = url("/storage/{$value}");

        return $value;
    }

    /* public function getReservedAttribute()
    {
        return $this->activeRental() ? true : false;
    } */

    /* public function userHasRental(User $user)
    {
        return $this->rentals()->where('user_id', $user->id)->where('status', 'Ativa')->first();
    } */
}
