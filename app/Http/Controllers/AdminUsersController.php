<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;
use App\Photo;
use App\Http\Requests\UserRequest;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        // Validation Rule are in UserRequest page inside Request
        $this->validate($request, [
            'password' => 'required',
            'email' => 'required|email|unique:users'
        ]);

        // $this->userValid($request); //below is the validation rule

        $input = $request->all();

        if ($file = $request->file('photo')) {
            $name = time().$file->getClientOriginalName();
            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        $input['password'] = bcrypt($request->password);

    //in one line it is saving bcoz colum name and request->parameter matched and are in same table
        User::create($input); 


    //use above when in same table i/p parameter and column name match

        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password),
        //     'role_id' => $request->role,
        //     'is_active' => $request->status
        // ]);


        return redirect('admin/users');

        // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::pluck('name', 'id')->all();
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {

        $user = User::findOrFail($id);

        $input = $request->all();



        // if (! $request->has('password')) {
        //     $request->except(['password']);
        // }



        if ($file = $request->file('photo')) {
            $name = time().$file->getClientOriginalName();
            $file->move('images', $name);

            $photo = Photo::create(['file' => $name]);

            // $input['photo_id'] = $photo->id;

            $user->photo_id = $photo->id;

            $user->save();

        }

        if ($pass = $request->password)
        {
            $user->password = bcrypt($pass);
        }

// $2y$10$xpoYsTouEXBV4EP9mGWuauVcWa4nZikjABBxLeCdxMhxiut.5okcK

       // $user->create($input);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->is_active = $request->is_active;

$user->save();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        unlink(public_path() . $user->photo->file);
        $user->photo->delete();
        $user->delete();
         
        return redirect()->route('users.index');
    }


    // public function userValid(Request $request)
    // {
    //     return $this->validate($request, [
    //         'name' => array(
    //                 'required',
    //                 'regex:/(^([a-zA-Z]+)(\d+)?$)/u'
    //             ),
    //         'email' => 'required|email|unique:users',
    //         'is_active' => 'required',
    //         'role_id' => 'required'

    //     ]);
    // }
}
