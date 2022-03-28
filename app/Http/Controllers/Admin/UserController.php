<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\PortalCompany;
use App\Models\PortalCompanyUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        $company = Company::first(); // объект компании магазина
        $company = PortalCompany::getCompany($company); //объект компании портала
        $users = PortalCompanyUser::getUsersByCompany($company);
        return view('admin.user.index', [
            'users' => $users
        ]);
    }

    public function add() {
        return view('admin.user.add');
    }

    public function bindUser(Request $request) {
        $email = $request->input('email');
        if($email) {
            $user = User::getUserByEmail($email);
            if($user) {
                $userId = $user->id;
                $authUserId = Auth::user()->id;
                if($userId != $authUserId){
                    $owncompany = User::company($authUserId);
                    $compuser = PortalCompanyUser::getUsersId($userId);
                    if($owncompany) {
                        $check = $this->linkCheck($compuser, $owncompany[0]->id);
                        if($check) {
                            try {
                                $this->attachUserToCompany($userId, $owncompany[0]->id);
                                $result = 'success';
                                $description = "Указанный аккаунт успешно привязан к магазину";
                                return array("status" => $result, "desc" => $description);
                            } catch (\Exception $e) {
                                $result = 'error';
                                $description = "Произошла ошибка при привязке пользователя";
                                return array("status" => $result, "desc" => $description);
                            }
                        } else {
                            $result = 'error';
                            $description = "Указанный аккаунт уже привязан к магазину";
                            return array("status" => $result, "desc" => $description);
                        }

                    }
                } else {
                    $result = 'error';
                    $description = "Ваш аккаунт уже привязан к магазину";
                    return array("status" => $result, "desc" => $description);
                }
            } else {
                $result = 'error';
                $description = "Пользователя с таким email не существует";
                return array("status" => $result, "desc" => $description);
            }
        }
    }

    public function detachUser(Request $request) {
        $userId = $request->input('id');
        $authUserId = Auth::user()->id;
        $owncompany = User::company($authUserId);
        $compuser = PortalCompanyUser::getUsersId($userId);
        if($owncompany && $compuser) {
            foreach ($compuser as $cpus) {
                if($cpus->company_id == $owncompany[0]->id){
                    try {
                        $cpus->delete();
                        $result = 'success';
                        $description = "Указанный аккаунт успешно отвязан от магазина";
                        return array("status" => $result, "desc" => $description);
                    } catch (\Exception $e) {
                        $result = 'error';
                        $description = "Произошла ошибка при отвязке пользователя";
                        return array("status" => $result, "desc" => $description);
                    }

                }
            }
        }
    }

    private function attachUserToCompany($userId, $companyId) {
        $compUserArr = [
            "user_id" => $userId,
            "company_id" => $companyId
        ];
        PortalCompanyUser::insert($compUserArr);
    }

    private function linkCheck($compuser, $companyId) {
        if($compuser) {
            foreach ($compuser as $cpus) {
                if ($cpus->company_id == $companyId) {
                    return false;
                }
            }
            return true;
        }
    }
}
