<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Employee extends Model
{
    public $table = 'employees';
    public $fillable = [
        'name',
        'last_name',
        'birth_date',
        'company_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
