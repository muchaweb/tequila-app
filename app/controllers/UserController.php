<?php
class UserController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('csrf', array('on' => 'post'));
        $this->beforeFilter('auth', array('only' => array('/admin')));
    }

    public function getLogin()
    {  
        return View::make('admin.login');
    }   

    public function postLogin()
    {
        $validator_login = Validator::make(Input::all(), 
                                                User::$rules_login, 
                                                User::$messages);

        if($validator_login->fails()) {

            return Redirect::route('login_form')
                            ->withErrors($validator_login);
        }

        if(Auth::attempt(array('nickname'  => Input::get('nickname'), 
                               'password'  => Input::get('password'), 
                               'confirmed' => 1,
                               'active'    => 1 ))) {

            return Redirect::route('user_list');

        } else {

            return Redirect::route('login_form')
                            ->with('invalid', 'Accesos incorrectos')
                            ->withInput();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $all_users = DB::table('users')
                        ->join('roles','users.id_rol_fk','=','roles.id','left')
                        ->select('users.id', 'users.name', 'users.lastname', 'users.active', 'users.email', 'roles.rol')
                        ->orderBy('users.id', 'desc')
                        ->paginate(10);

        return View::make('admin.users.users')->with('users', $all_users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(){

        $groups   = Rol::all()->lists('rol', 'id');
        $combobox = array(0 => "Seleccione") + $groups;
        $selected = array();

        return View::make('admin.users.users-new', compact('combobox', 'selected'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(){

        $validator = Validator::make(Input::all(), 
                                               User::$rules, 
                                               User::$messages);

        if($validator->passes()) {
            
            $store                   = Business::first();
            $business_name           = $store->business;
            $business_phone          = $store->phone;
            $business_email          = $store->email;
            $business_address        = $store->address;
            
            $user                    = new User;
            $confirmation_code       = str_random(30);

            $user->name              = Input::get('name');
            $user->lastname          = Input::get('lastname');
            $user->id_rol_fk         = Input::get('rol');
            $user->nickname          = Input::get('nickname');
            $user->job               = Input::get('job');
            $user->phone             = Input::get('phone');
            $user->email             = Input::get('email');
            $user->password          = Hash::make(Input::get('password'));
            $user->confirmation_code = $confirmation_code;

            $user->save();

            Mail::send('emails.admin.users.confirmation-code-user',   
                array('name'              =>    Input::get('name'),
                      'lastname'          =>    Input::get('lastname'),
                      'business'          =>    $business_name,
                      'phone'             =>    $business_phone,
                      'email'             =>    $business_email,
                      'address'           =>    $business_address,
                      'confirmation_code' =>    $confirmation_code), function($message) {

                $message->to(Input::get('email'), Input::get('name').' '.Input::get('lastname'))
                        ->subject('Activación de cuenta de usuario');
            });

            return Redirect::route('user_add_new_form')
                            ->with('success', 'Usuario registrado correctamente');

        } else {

            return Redirect::route('user_add_new_form')
                            ->with('error', 'Revise los siguientes errores')
                            ->withErrors($validator)
                            ->withInput();
        }
    }

    public function getActive()
    {
        $id = Input::get('id');
        $id_user = User::findOrFail($id);

        if($id_user != "") {
            $id_user->active = $id_user->active ? false : true;
            $id_user->save();
        }
        return Redirect::route('user_list');
    }

    public function destroy($id)
    {
        $id_user = User::findOrFail($id);

        if($id_user != ""){
           $id_user->delete();
        }
        return Redirect::route('user_list')
                        ->with('success', 'Usuario eliminado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        $rolID = $users->id_rol_fk; 

        //-- Rol Search --
        $searchRol = Rol::find($rolID);
        $currentIDRol = $searchRol->id;
        $currentRol = $searchRol->rol;

        $roles   = Rol::all()->lists('rol', 'id');
        $combo_rol = array($currentIDRol => $currentRol) + $roles;
        $selected_rol = array();
        //-- End Rol Search --

        return View::make('admin.users.users-edit', compact('combo_rol', 'selected_rol'))->with('users', $users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $validator_user = Validator::make(Input::all(), 
                                                    User::$rules_user, 
                                                    User::$messages);

        if($validator_user->passes()) {
            $user           = User::find($id);

            $user->name      = Input::get('name');
            $user->lastname  = Input::get('lastname');
            $user->nickname  = Input::get('nickname');
            $user->job       = Input::get('job');
            $user->phone     = Input::get('phone');
            $user->email     = Input::get('email');
            $user->id_rol_fk = Input::get('rol');

            $user->save();

            return Redirect::route('user_list')->with('success', 'Usuario actualizado correctamente');

        } else {
            return Redirect::to('/admin/users/edit/'.$id)
                            ->with('error', 'Revise los siguientes errores')
                            ->withErrors($validator_user)
                            ->withInput();
        }
    }

    public function getResetPassword($id)
    {
        $users = User::find($id);
        return View::make('admin.users.users-reset-password')
                    ->with('users', $users);
    }

    public function postResetPassword($id){
        $validator_reset_password = Validator::make(Input::all(), 
                                                         User::$rules_reset_password, 
                                                         User::$messages);

        if($validator_reset_password->passes()){
            $user            = User::find($id);
            $user->password  = Hash::make(Input::get('password'));

            //-- Email data
            $email      = $user->email;
            $name       = $user->name;
            $lastname   = $user->lastname;

            //-- Business data
            $store                   = Business::first();
            $business_name           = $store->business;
            $business_phone          = $store->phone;
            $business_email          = $store->email;
            $business_address        = $store->address;

            $user->save();

            Mail::send('emails.admin.users.reset-password', 
                
                array('name'              =>    $name,
                      'lastname'          =>    $lastname,
                      'password'          =>    Input::get('password'),
                      'business'          =>    $business_name,
                      'phone'             =>    $business_phone,
                      'email'             =>    $business_email,
                      'address'           =>    $business_address), function($message) use($email, $name, $lastname) {

                $message->to($email, $name.' '.$lastname)
                        ->subject('Cambio de password de usuario');
            });

            return Redirect::route('user_list');

        } else {
            return Redirect::to('/admin/users/reset-password/'.$id)
                            ->with('error', 'Revise los siguientes errores')
                            ->withErrors($validator_reset_password)
                            ->withInput();
        }
    }
}
