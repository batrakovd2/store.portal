<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortalCompany extends Model
{
    use HasFactory;
    protected $table = 'companies';
    protected $connection = "mysql-portal";

    protected $fillable = ['title', 'domain', 'address', 'phone', 'email', 'city_id', 'work_time'];

    public function getCompany(Company $company)
    {
        if ($company) {
            return PortalCompany::where([
                ["title", $company->title],
                ["email", $company->email],
                ["domain", $company->domain]
            ])->first();
        }
    }

}
