<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(5);

        return view('companies')->with('companies', $companies);
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
        $validator = Validator::make($request->all(), [
            'image' => 'image | dimensions:min_width=300,min_height=200',
            'name' => 'required',
            'email' => 'required| email:unique',
            'website' => 'required',
        ]);
        if($validator->fails()) {
            return redirect('/create')
                ->withErrors($validator)
                ->withInput();
        }

        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/logo');
        $image->move($destinationPath, $input['imagename']);

        $company = new Company;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->logo = $input['imagename'];
        $company->website = $request->website;

        $company->save();

        return redirect('/companies')->with('success', ['company added']);


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
        $company = Company::find($id);

        return view('edit_company')->with([
            "id" => $id,
            "name" => $company->name,
            "website" => $company->website,
            "email" => $company->email,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company = Company::find($id);

        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;

        $company->save();

        return redirect('/companies')->with('success', ['company edit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);

        $company->delete();

        return redirect('/companies');

    }
}
