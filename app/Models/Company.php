<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Company extends Model
{
    public $table = 'companies';
    public $fillable = [
        'name',
        'code',
        'address',
        'city',
        'country'
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'company_id');
    }
}
