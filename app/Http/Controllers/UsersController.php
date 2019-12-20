<?php

namespace App\Http\Controllers;

use App\User;
use App\Alumno;
use App\Profesor;
use App\Role;
use Illuminate\Http\Request;
use App\Policies\Userpolicy;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Cache;

class UsersController extends Controller
{

    function __construct(){

        $this->middleware('auth');
        $this->middleware('roles:admin');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $user_auth = Auth::user();
         //$this->authorize('before',$user_auth);

         $key = 'user.page' . request('page', 1) . request('search','');
         $users = Cache::rememberForever($key, function() use($request){
            
            return $users = User::with(['roles'])->where('name','like','%'.$request->search.'%')
                           ->orWhere('email', $request->search)->orderBy('name', request('sorted','ASC'))->paginate(5);

        });
        
        //$users= User::with(['roles'])->get();
        return view ('users.index', compact('users'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $user_auth = Auth::user();
        $this->authorize('before',$user_auth);
        $roles = Role::pluck('display_name','id');
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        //
        $user_auth = Auth::user();
        $this->authorize('before',$user_auth);
        $user= User::create( $request->all());
        $user->roles()->attach($request->roles);
        Cache::flush();
        return redirect()->route('usuarios.index');
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
       // $user = User::findOrFail($id);   
        $user = User::findOrFail($id);
        
        return view ('users.show', compact('user'));

       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //la funcion old en la vista users.form tiene un problema solucionar despues lo mas seguro es que sea 
        // error del layout recordar reconstruir layout

         $user_auth = Auth::user();
        $this->authorize('before',$user_auth);
         $user = User::findOrFail($id);

         //dd($user->name);
        // $id = Auth::id();

        

        $roles = Role::pluck('display_name','id');

        return view('users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        //
       
        $user_auth = Auth::user();
        $this->authorize('before',$user_auth);
        $user = User::findOrFail($id);
        $user->update($request->only('name','email','password'));
        
        if($request->roles[0] == '2'){
         
            $data = Profesor::where('clave',$user->name)->first();
            $data->update([
               'email' => $request->email
            ]);
        }else if($request->roles[0] == '3'){

            $data = Alumno::where('matricula',$user->name)->first();
            $data->update([
               'email' => $request->email
            ]);
        }
    

        $user->roles()->sync($request->roles);

        Cache::flush();

        return redirect()->route('usuarios.index')->with('info','Usuario actualizado');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user_auth = Auth::user();
        $this->authorize('before',$user_auth);


        $user = User::findOrFail($id);
        $user->delete();
        

        if( $user->roles->pluck('display_name')->implode(' - ')  === 'Moderador'){
           
           if( $dato = Profesor::where('clave',$user->name)->first()){
                 $dato->delete();
           }
          
          
        }else{
             
            if($dato = Alumno::where('matricula',$user->name)->first()){
                 $dato->delete();
           } 
            
           
        }


         

          Cache::flush();
         
         return back()->with('info','Usuario eliminado');
    }
}
 