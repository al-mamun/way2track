<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Faker\Provider\ar_EG\Person;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
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
            return view('admin.role_permissions.roles.index')->with([
                'roles' => Role::all(),
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

            return view('admin.role_permissions.roles.create')->with([
                'permissions' => Permission::all()
            ]);

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
            'name' => 'required|unique:w2t_roles'
        ]);

        try{
            $role =  Role::create($request->except(['_token', '_method']));
            if($request->has('permissions')){
                foreach($request->permissions as $permission){
                    $role->givePermissionTo($permission);
                }
            }
            return redirect()->back()->with([
                'success' => $role->name.' Role created'
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
        // dd(Role::find($id)->permissions->pluck('name'));
        return view('admin.role_permissions.roles.edit')->with([
            'role' => $role = Role::find($id),
            'permissions' => Permission::all(),
            'role_permissions' => $role->permissions->pluck('name')->toArray()
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
            $role = Role::findOrFail($id);
            $role->update($request->except(['_token', '_method']));
            if($request->has('permissions')){
                $role->syncPermissions($request->permissions);
            }
            return redirect()->back()->with([
                'permission' => $role,
                'success' => $role->name . ' Role Updated'
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
            Role::findOrFail($id)->delete();
            return redirect()->route('admin.role.index');
        }catch(\Exception $e){
            return redirect()->back()->with([
                'error' => $e->getMessage()
            ]);
        }
    }
    
}
