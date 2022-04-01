<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortalCompanyUser extends Model
{
    use HasFactory;

    protected $table = 'companies_users';
    protected $connection = "mysql-portal";

    public function getUsersByCompany($company) {
        if($company) {
            $users = [];

            $compusers = PortalCompanyUser::where("company_id", $company->id)->get();

            $userIdArr = [];
            if($compusers) {
                foreach ($compusers as $cus){
                    $userIdArr[] = $cus->user_id;
                }
                $users = $userIdArr ? User::whereIn("id", $userIdArr)->get() : [];
            }
        }
        return $users;
    }

    public function getUsersId($id) {
        return PortalCompanyUser::where('user_id', $id)->get();
    }

}
