<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EligibilityApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'industry',
        'qualification',
        'experience_years',
        'has_formal_qualification',
        'state',
        'terms_accepted',
    ];

    protected $casts = [
        'has_formal_qualification' => 'boolean',
        'terms_accepted' => 'boolean',
        'experience_years' => 'integer',
    ];

    // Helper for full name
    public function getNameAttribute(): string
    {
        return trim("{$this->first_name} {$this->last_name}");
    }
 
    public const STATES = [
        'NSW' => 'New South Wales',
        'VIC' => 'Victoria',
        'QLD' => 'Queensland',
        'WA'  => 'Western Australia',
        'SA'  => 'South Australia',
        'TAS' => 'Tasmania',
        'ACT' => 'Australian Capital Territory',
        'NT'  => 'Northern Territory',
    ];
}