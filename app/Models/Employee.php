<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['first_name', 'last_name', 'company_id', 'email', 'phone_numbers', 'dietary_preference_id'];

    protected $casts = [
        'phone_numbers' => 'json',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function dietaryPreference()
    {
        return $this->belongsTo(DietaryPreference::class);
    }
}
