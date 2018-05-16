<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function submitForm(Request $request)
    {
        $rules = [
            'bda-file' => 'mimes:json,csv,txt',
            'visualization' => 'required'
        ];

        $messages = [
            'mimes' => 'The uploaded file must be in JSON or CSV formats.',
            'required' => 'The :attribute field is required.'
        ];

        Validator::make($request->all(), $rules, $messages)->validate();

        switch ($request->input('example-file')) {
            case 'example1':
                $fileName = 'data.json';
                break;
            case 'example2':
                $fileName = 'imports.json';
                break;
            case 'example3':
                $fileName = 'data.csv';
                break;
        }

        if ($request->file('bda-file')) {
            $file = $request->file('bda-file');
            $fileName = $file->getClientOriginalName();
            $fileExtension = $file->getClientOriginalExtension();

            $file->storePubliclyAs('/', $fileName);
        }

        $visualizationType = $request->input('visualization');

        return view('visualization', [/*'extension' => $fileExtension,*/ 'name' => $fileName, 'visType' => $visualizationType]);
    }
}
