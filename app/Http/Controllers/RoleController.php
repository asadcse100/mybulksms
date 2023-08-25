<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Cookie;
use Laratrust;

class RoleController extends Controller
{
public function __construct()
{
$this->middleware('auth');
}
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
	$user = Auth::user();
	$allUser['name'] = User::pluck('name', 'id')->toArray();
	$roles = Role::orderBy('id', 'DESC')->paginate(20);

	return view('manage.roles.index', compact('roles', 'user', 'allUser'));
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
	$user = Auth::user();
	$permissions = Permission::orderBy('description')->get();
	return view('manage.roles.create', compact('permissions', 'user'));
}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
	//dd($request->toArray());
	$this->validateWith([
	'display_name' => 'required|max:255',
	'name' => 'required|max:100|alpha_dash|unique:roles'
	]);

	$role = new Role();
	$role->display_name = $request->display_name;
	$role->name = $request->name;
	$role->create_by = $request->create_by;
	$role->save();

	if ($request->permissions) {
	$role->syncPermissions(explode(',', $request->permissions));
	}

	Session::flash('success', 'Successfully created the new '. $role->display_name . ' role in the database.');
	return redirect()->route('roles.show', $role->id);
}
/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
$role = Role::where('id', $id)->with('permissions')->first();
// return view('manage.roles.show')->withRole($role);
return view('manage.roles.show', compact('role'));

}
/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
	$role = Role::where('id', $id)->with('permissions')->first();
	//$permissions = Permission::orderBy('description')->get();
	$permissions = Permission::all();
     return view('manage.roles.edit')->withRole($role)->withPermissions($permissions);
	//return view('manage.roles.edit', compact('role', 'permissions'));
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
	//$getNavData = Application::getNavData();
	$this->validateWith([
	'display_name' => 'required|max:255'
	]);
	$role = Role::findOrFail($id);
	
	$role->display_name = $request->display_name;
	$role->save();
	//dd($request->permissions);
	if ($request->permissions) {
	$role->syncPermissions(explode(',', $request->permissions));
	}
	Session::flash('success', 'Successfully update the '. $role->display_name . ' role in the database.');
	return redirect()->route('roles.show', $id);
}
/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{

}
}