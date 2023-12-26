<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformationController extends Controller
{
    public function application()
    {
        return view('welcome');
    }
    public function index()
    {
        $data = DB::table('information')->get();
        return view('index', compact('data'));
    }
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|max:255|min:2',
            'email'   => 'required|email|regex:/(.+)@(.+)\.(.+)/i',
            'phone'   => 'required|nullable',
            'gender'  => 'required',
            'faculty' => 'required',
            'status'  => 'nullable|boolean',
            'detail'  => 'max:255|nullable'
        ]);

        $model = new Information;
        $model->name = $request->name;
        $model->email = $request->email;
        $model->phone = $request->phone;
        $model->gender = $request->gender;
        $model->faculty = $request->faculty;
        $model->status = $request->status ? true : false;
        $model->detail = $request->detail;
        $success = $model->save();

        if ($success) {
            $model = Information::all();
            return redirect()->route('application.index')->with('success', 'New information added successfully.');
        } else {
            return view('index');
        }
    }

    public function edit($id)
    {
        $model = new Information;
        $data = $model->findOrFail($id);
        return view('edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'    => 'required|max:255|min:2',
            'email'   => 'required|email|regex:/(.+)@(.+)\.(.+)/i',
            'phone'   => 'required|nullable',
            'gender'  => 'required',
            'faculty' => 'required',
            'status'  => 'nullable|boolean',
            'detail'  => 'max:255|nullable'
        ]);

        $data = Information::findOrFail($id);
        $data->name    = $request->name;
        $data->email   = $request->email;
        $data->phone   = $request->phone;
        $data->gender  = $request->gender;
        $data->faculty = $request->faculty;
        $data->status  = $request->status ? true : false;
        $data->detail  = $request->detail;
        $success       = $data->save();

        if ($success) {
            $data = Information::all();
            return redirect()->route('application.index')->with('update_success', 'Information updated successfully.');
        } else {
            return view('index');
        }
    }

    public function view()
    {
        return view('view');
    }

    public function delete($id)
    {
        $model = new Information;
        $data = $model->findOrFail($id);
        $success = $data->delete();
        if ($success) {
            return redirect(route('application.index'))->with('delete_success', 'Information deleted successfully.');
        } else {
            return view('index');
        }
    }
}
