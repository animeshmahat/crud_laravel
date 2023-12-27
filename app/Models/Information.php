<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'gender', 'faculty', 'status', 'image', 'detail'];

    public function getRules(array $validate)
    {
        return validator($validate, [
            'name'    => 'required|max:255|min:2',
            'email'   => 'required|email|regex:/(.+)@(.+)\.(.+)/i',
            'phone'   => 'required|nullable',
            'gender'  => 'required',
            'faculty' => 'required',
            'status'  => 'nullable|boolean',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'detail'  => 'max:255|nullable'
        ]);
    }
}
