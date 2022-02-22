<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $connection = "mysql-auth";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUserByEmail($email){
        if($email) {
            return User::where('email', $email)->first();
        }
    }

    public function company($id) {
        $companyIds = PortalCompanyUser::where('user_id', $id)->select('company_id')->get();
        $compArr = [];
        if($companyIds) {
            foreach ($companyIds as $cids) {
                $compArr[] = $cids->company_id;
            }
            return PortalCompany::whereIn('id', $compArr)->get();
        }
    }

}
