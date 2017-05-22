<?php

namespace App\Http\Controllers\Backend\User;

use App\Models\Role\Role;
use App\Http\Requests\Backend\Role\StoreRoleRequest;
use App\Http\Requests\Backend\Role\ManageRoleRequest;
use App\Http\Requests\Backend\Role\UpdateRoleRequest;
use App\Repositories\Backend\Role\RoleRepository;
use App\Repositories\Backend\Permission\PermissionRepository;
use App\Http\Controllers\Controller;

class UserGroupController extends Controller{
    
    protected $roles;
    protected $permissions;

    public function __construct(RoleRepository $roles, PermissionRepository $permissions)
    {
        $this->roles = $roles;
        $this->permissions = $permissions;
    }

    public function index(){
        return $this->list();
    }

    public function list(){
        return view('backend.usergroup')
           ->withRoles($this->roles->getRoles())
           ->withCount($this->roles->getCount());
    }

    public function create(){
        return view('backend.addusergroup')
           ->withPermissions($this->permissions->getAll(100));
    }

    public function store(StoreRoleRequest $request){
        $this->roles->create($request->all());
        return redirect()->route('admin.user.rolelist')->withFlashSuccess(trans('alerts.backend.roles.created'));
    }

    public function edit(Role $role, ManageRoleRequest $request){
        dd($role);
    }

    public function update(){

    }

    public function destroy(Role $role, ManageRoleRequest $request){
        dd($role);
        $this->roles->delete($role);
        return ["status"=>1,"msg"=>"success"];
        //return redirect()->route('admin.user.rolelist')->withFlashSuccess(trans('alerts.backend.roles.deleted'));
    }

}