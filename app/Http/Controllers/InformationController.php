<?php

namespace App\Http\Controllers;

use App\Models\Information;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class InformationController extends Controller
{

    protected $model;
    public function __construct()
    {
        $this->model = new Information();
    }
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
        $validator = $this->model->getRules($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $model          = $this->model;
        $model->name    = $request->name;
        $model->email   = $request->email;
        $model->phone   = $request->phone;
        $model->gender  = $request->gender;
        $model->faculty = $request->faculty;
        $model->status  = $request->status ? true : false;
        $model->detail  = $request->detail;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('public_path'('uploads'), $imageName);
        } else {
            $imageName = null;
        }
        $model->image   = $imageName;
        $success        = $model->save();

        if ($success) {
            return redirect()->route('application.index')->with('success', 'New information added successfully.');
        } else {
            return view('index');
        }
    }

    public function edit($id)
    {
        $data =  $this->model->findOrFail($id);
        return view('edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->model::findOrFail($id);

        $validator = $this->model->getRules($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data->name    = $request->name;
        $data->email   = $request->email;
        $data->phone   = $request->phone;
        $data->gender  = $request->gender;
        $data->faculty = $request->faculty;
        $data->status  = $request->status;
        $data->detail  = $request->detail;

        if ($request->hasFile('image')) {
            if ($data->image) {
                $image_path = public_path("uploads/{$data->image}");
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $data->image = $imageName;
        }

        $success = $data->save();

        if ($success) {
            return redirect()->route('application.index')->with('update_success', 'Information updated successfully.');
        } else {
            return view('index');
        }
    }

    public function view($id)
    {
        $data = $this->model->findOrFail($id);
        return view('view', compact('data'));
    }

    public function delete($id)
    {
        $model =  $this->model;
        $data = $model->findOrFail($id);

        if ($data->image) {
            $image_path = public_path("uploads/{$data->image}");
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
        $success = $data->delete();

        if ($success) {
            return redirect(route('application.index'))->with('delete_success', 'Information deleted successfully.');
        } else {
            return view('index');
        }
    }
}
