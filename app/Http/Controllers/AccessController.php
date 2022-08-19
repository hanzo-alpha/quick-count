<?php

  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use Spatie\Permission\Models\Role;
  use Illuminate\Support\Facades\Auth;
  use Illuminate\Support\Facades\DB;
  use Spatie\Permission\Models\Permission;

  class AccessController extends Controller
  {
    public function index()
    {

      // Breadcrumbs
      $breadcrumbs = [
        ['link' => "/", 'name' => "Home"], ['link' => "#", 'name' => " Extra Components"], ['name' => "Access Controller"],
      ];
      //Pageheader set true for breadcrumbs
      $pageConfigs = ['pageHeader' => true];

      return view('pages.access-control', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
    }

    public function roles($role)
    {
      if (Auth::user()) {
        // check group is empty
        $roles = DB::table('roles')->count();
        if ($roles === null) {
          //if group empty add two group and assign permission
          $editor = Role::create(['name' => 'Editor']);
          $permissionEditor = Permission::create(['name' => 'create articles']);
          $editor->givePermissionTo($permissionEditor);

          $admin = Role::create(['name' => 'Super Admin']);
          $permission = Permission::create(['name' => 'approve articles']);
          $admin->givePermissionTo($permission, $permissionEditor);
        }
        //if
        $user = Auth::user();
        if ($role === 'admin') {
          $user->removeRole('Editor');
          $user->assignRole('Admin');
        } else {
          $user->removeRole('Admin');
          $user->assignRole('Editor');
        }
      }
      return redirect()->back();
    }

    public function home()
    {
      return view('pages.dashboard-ecommerce');
    }
  }
