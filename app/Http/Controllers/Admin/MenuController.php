<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Privilege;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $menus = Menu::all();

        $privileges = Privilege::where('role_id', '1')->join('menus', 'menus.menu_id', 'privileges.menu_id')->get();

        // SELECT * FROM MENUS m WHERE m.menu_id NOT IN (SELECT DISTINCT menu_id FROM PRIVILEGES p WHERE p.role_id = <role_id>);
        $menu_selected_by_role = Privilege::select('menu_id')->where('role_id', '1')->get();
        $menu_available = Menu::whereNotIn('menu_id', $menu_selected_by_role)->get();

        return view('pages.admin.master_menus', ['menus' => $menus, 'roles' => $roles, 'privileges' => $privileges, 'menu_available' => $menu_available]);
    }

    public function getByRoleId(Request $request){
        $privileges = $privileges = Privilege::where('role_id', $request->role_id)->join('menus', 'menus.menu_id', 'privileges.menu_id')->get();

        // SELECT * FROM MENUS m WHERE m.menu_id NOT IN (SELECT DISTINCT menu_id FROM PRIVILEGES p WHERE p.role_id = <role_id>);
        $menu_selected_by_role = Privilege::select('menu_id')->where('role_id', $request->role_id)->get();
        $menu_available = Menu::whereNotIn('menu_id', $menu_selected_by_role)->get();

        return [
            'privileges' => $privileges,
            'list_menu' => $menu_available
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'privilege_name' => 'required',
            'menu_id' => 'required'
        ]);

        $role_id = $request->role_id;
        $menu_id = $request->menu_id;
        $exists = DB::table('privileges')->where('role_id', $role_id)->where('menu_id', $menu_id)->exists();
        
        if(!$exists) {
            Privilege::create([
                'menu_id' => $menu_id,
                'role_id' => $role_id,
                'privilege_name' => $request->privilege_name
            ]);
        }

        return redirect()->back();
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $privilege_id = $request->privilege_id;
        Privilege::destroy($privilege_id);
        return redirect()->back();
    }
}
