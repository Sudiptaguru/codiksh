<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'company_email',
        'logo',
        'website',
    ];
    public function employee()
    {
        return $this->hasOne('App\Models\Employee');
    }
}
