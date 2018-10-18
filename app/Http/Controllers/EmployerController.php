<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Employer;
use App\Company;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employers = Employer::where('company_id', $request->id)->get();

        $company = Company::find($request->id);

        return view('employers')->with([
            'employers' => $employers,
            'company' => $company,
            ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('create_employer')->with('company_id', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $company_id)
    {

        $validator = Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required| email:unique',
            'phone' => 'required',
        ]);
        if($validator->fails()) {
            return redirect('/company/'.$company_id.'/employers/create')
                ->withErrors($validator)
                ->withInput();
        }
        $employer = new Employer;

        $employer->first_name = $request->fname;
        $employer->last_name = $request->lname;
        $employer->company_id = $company_id;
        $employer->email = $request->email;
        $employer->phone = $request->phone;

        $employer->save();

        return redirect('/company/'.$company_id.'/employers');

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
    public function edit($company_id, $id_employer)
    {
        $employer = Employer::find($id_employer);


        return view('edit_employer')->with([
            'company_id' => $company_id,
            'fname' => $employer->first_name,
            'lname' => $employer->last_name,
            'email' => $employer->email,
            'phone' => $employer->phone,
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $id_employer)
    {
        $employer = Employer::findOrFail($id_employer);

        $employer->delete();

        return redirect("company/".$id."/employers");
    }
}
