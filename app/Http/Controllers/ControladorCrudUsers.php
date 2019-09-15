<?php
use App\Http\Controllers\Controller;


namespace App\Http\Controllers;
use App\User;
use Hash;
use Validator;
use App\Mail\Welcome;

use Illuminate\Http\Request;

class ControladorCrudUsers extends Controller
{
    public function __construct(){

        $this->middleware('EsAdmin'); /**se carga el middleware en el constructor */

    }
  
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['usuarios'] = User::paginate(5);
        return view('Usuarios.index',$datos);
          
        // $datos['users'] = User::paginate(5);
        //  return view('Usuarios.index');
        
    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[

            'name' => 'required|string | max:100',
            'username' => 'required|string | max:100',
            'email' => 'required|email',
            'password' => 'required'

        ];
        // $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
         
        // $request['password'] = substr($random, 0, 10);
        // $passrandom = $request['password'];

        $request['password'] = Hash::make($request['password']);
        $Mensaje =["required"=>'The :attribute is required'];
        $this->validate($request,$campos,$Mensaje); /**validando camppos agregado de marca para que no se pueda enviar vacio  */
       // $datosCar = request()->all();

        $datos = request()->except('_token'); //  almacena todos los datos menos la llave
        
        // User::insert($datos);

        $user = User::create($datos
            // request(['name','email','password'])
         );

        //  auth()->login($user);
         
        \Mail::to($user['email'])->send(new Welcome($user['password']));
        return redirect('Usuarios')->with('Mensaje','User added Succesfully!');
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
        $datos=User::findOrFail($id);  /** devuelve toda la informacion correspondiente al id */

        return view('Usuarios.edit',compact('datos')); /**retorna vista  y le pasa la información correspondiente al id */
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
        $campos=[

            
            'name' => 'required|string | max:100',
            'username' => 'required|string | max:100',
            'email' => 'required|email' ,
            'password' => 'required',

        ];

        $Mensaje =["required"=>'The :attribute is required'];
        $this->validate($request,$campos,$Mensaje); /**validando camppos agregado de marca para que no se pueda enviar vacio  */


        
        $datos = request()->except(['_token','_method']);
                        /**no recepciona ni token ni method */   
        User::where('id','=',$id)->update($datos);/*se actualiza fila de la tabla cuyo id coincidad con el id pasado por parametro*/ 

        $datos=User::findOrFail($id);  /** devuelve toda la informacion correspondiente al id */

        // return view('CarCrud.edit',compact('datosCar')); /**retorna vista  y le pasa la información correspondiente al id */

        return redirect('Usuarios')->with('Mensaje','User modified Succesfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('Usuarios')->with('Mensaje','User deleted successully!');
    }
}
