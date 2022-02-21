<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $company = Company::getCompany();
        $cityId = $company && $company->city_id ? $company->city_id : 0;
        $prt = new PortalConnectionController();
        $city = $prt->getCitiesChain($cityId);
        return view('admin.company.index', [
            'cities' => $city,
            'company' => $company
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return array
     */
    public function update(Request $request, Company $company)
    {
        $validator = $this->validator($request->all());
        try {
            $validator->validate();
            $company = Company::find($company->id);
            $company->update($request->all());
            $result = 'success';
            $description = "Информация о компании изменена";
        } catch (\Exception $e) {
            $errors = $validator->errors();
            $result = 'error';
            $description = $errors ? $errors->all() : "Произошла ошибка при изменении информации о компании";
        }

        return array("status" => $result, "desc" => $description);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function validator($data) {
        return Validator::make($data, [
            'title' => ['required', 'max:250'],
            'domain' => ['required', 'max:250'],
            'phone' => ['max:250'],
            'email' => ['max:250'],
            'address' => ['max:250'],
            'work_time' => ['max:250'],
            'city_id' => ['digits_between:0,11'],
            'region_id' => ['digits_between:0,11'],
        ]);
    }

}
