<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(){
        $this->middleware('auth');
     }
     
    public function index()
    {
        try{
            return view('admin.role_permissions.permissions.index')->with([
                'permissions' => Permission::all(),
            ]);
        }catch(\Exception $e){
            return redirect()->back()->with([
                'error' => $e->getMessage()
            ]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try{

            return view('admin.role_permissions.permissions.create');

        }catch(\Exception $e){
            return redirect()->back()->with([
                'error' => $e->getMessage()
            ]);
        }
       
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:w2t_permissions,id'
        ]);

        try{
            $permission =  Permission::create($request->except(['_token', '_method']));
            return redirect()->back()->with([
                'success' => $permission->name.' Permission created'
            ]);

        }catch(\Exception $e){
            return redirect()->back()->with([
                'error' => $e->getMessage()
            ]);
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
        return view('admin.role_permissions.permissions.edit')->with([
            'permission' => Permission::find($id)
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
        try{
            $permission = Permission::findOrFail($id)->update($request->except(['_token', '_method']));
            return redirect()->back()->with([
                'permission' => $permission,
                'success' => $permission->name . ' Permission Updated'
            ]);
        }catch(\Exception $e){
            return redirect()->back()->with([
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            Permission::findOrFail($id)->delete();
            return redirect()->route('admin.permission.permission_list');
        }catch(\Exception $e){
            return redirect()->back()->with([
                'error' => $e->getMessage()
            ]);
        }
    }
}
