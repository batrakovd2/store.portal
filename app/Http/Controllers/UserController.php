<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\PortalCompany;
use App\Models\PortalCompanyUser;
use App\Models\User;
use Illuminate\Http\Request;

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
}
