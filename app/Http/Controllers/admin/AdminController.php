<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $data['admins'] = Admin::all();
        return view('admin.auth.admins.index')->with($data);

    }

    public function create()
    {
        return view('admin.auth.admins.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'password' => 'confirmed|string|max:191',
        ]);

        Admin::create($data);
        return redirect(route('admin.admins'));
    }
    public function edit($id)
    {
        $data['admin'] = Admin::findorfail($id);
        return view('admin.auth.admins.edit')->with($data);
    }

    public function update(Request $request)
    {

        $data['admin'] = $request->validate([
            'username' => 'required|string|max:50',
            'email' => 'required|email|max:50',
            'password' => 'confirmed|string',
            'password_confirmation' => 'nullable|string',
        ]);

        if ($request->password == null) {
            $admins = Admin::where('id', $request->id);
            $admins->update([
                'username' => $request->username,
                'email' => $request->email,
            ]);
        } else {

                $password = Hash::make($request->password);
                $admins = Admin::where('id', $request->id);
                $admins->update([
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => $password,
                ]);



        }

        return redirect(route('admin.admins'));

    }

}
