<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admins = Admin::all();
        return view('cms.admin.admins.index',['adminsData'=>$admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cms.admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required:string|email|unique:admins,email',
            'mobile' => 'required|string|numeric|unique:admins,mobile',
            'gender' => 'required|string|in:Male,Female',
            'age' => 'required|integer|min:16|max:100',
            'account_status' => 'string|in:Active,Blocked'
        ]);

        $admin = new Admin();
        $admin->name = $request->get('name');
        $admin->email = $request->get('email');
        $admin->mobile = $request->get('mobile');
        $admin->gender = $request->get('gender');
        $admin->age = $request->get('age');
        $admin->status = $request->get('status');
        $admin->password = Hash::make("Pass123$");
        $isSaved = $admin->save();

        if ($isSaved){
            return response()->json(['icon'=>'success','title'=>'Admin created successfully'],200);
        }else{
            return response()->json(['icon'=>'success','title'=>'Admin created successfully'],400);
        }
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
        $admin = Admin::find($id);
        return view('cms.admin.admins.edit',['admin'=>$admin]);
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
        $request->request->add(['id' => $id]);
        $request->validate([
            'id' => 'required|exists:admins,id',
            'name' => 'required|string|min:3',
            'email' => 'required:string|email|unique:admins,email,'.$id,
            'mobile' => 'required|string|numeric|unique:admins,mobile,'.$id,
            'gender' => 'required|string|in:Male,Female',
            'age' => 'required|integer|min:16|max:100',
            'account_status' => 'string|in:Active,Blocked'
        ]);

        $admin = Admin::find($id);
        $admin->name = $request->get('name');
        $admin->email = $request->get('email');
        $admin->mobile = $request->get('mobile');
        $admin->gender = $request->get('gender');
        $admin->age = $request->get('age');
        $admin->status = $request->get('status');
        $isSaved = $admin->save();

        if ($isSaved){
            return response()->json(['icon'=>'success','title'=>'Admin updated successfully'],200);
        }else{
            return response()->json(['icon'=>'Failed','title'=>'Admin update failed'],400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        //
        $isDestroyed = Admin::destroy($id);
        if ($isDestroyed) {
            return response()->json([
                'icon' => 'success',
                'title' => 'Admin deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'icon' => 'error',
                'title' => 'Admin delete failed'
            ], 400);
        }
    }
}
