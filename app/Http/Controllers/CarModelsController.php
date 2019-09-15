<?php

namespace App\Http\Controllers;

use App\CarModels;
use Illuminate\Http\Request;

class CarModelsController extends Controller
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
        
        $datos['carmodels'] = CarModels::paginate(5);
         return view('CarModels.index',$datos);
        
           
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('CarModels.create');

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

            'Model' => 'required|string | max:100'

        ];

        $Mensaje =["required"=>'The :attribute is required'];
        $this->validate($request,$campos,$Mensaje); /**validando camppos agregado de marca para que no se pueda enviar vacio  */
       // $datosCar = request()->all();

        $datosCar = request()->except('_token'); //  almacena todos los datos menos la llave
        CarModels::insert($datosCar);

        return redirect('CarModels')->with('Mensaje','Model added Succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CarModels  $carModels
     * @return \Illuminate\Http\Response
     */
    public function show(CarModels $carModels)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CarModels  $carModels
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $datosCar=CarModels::findOrFail($id);  /** devuelve toda la informacion correspondiente al id */

        return view('CarModels.edit',compact('datosCar')); /**retorna vista  y le pasa la información correspondiente al id */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CarModels  $carModels
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[

            'Model' => 'required|string | max:100'

        ];

        $Mensaje =["required"=>'The :attribute is required'];
        $this->validate($request,$campos,$Mensaje); /**validando camppos agregado de marca para que no se pueda enviar vacio  */


        
        $datosCar = request()->except(['_token','_method']);
                        /**no recepciona ni token ni method */   
        CarModels::where('id','=',$id)->update($datosCar);/*se actualiza fila de la tabla cuyo id coincidad con el id pasado por parametro*/ 

        $datosCar=CarModels::findOrFail($id);  /** devuelve toda la informacion correspondiente al id */

        // return view('CarCrud.edit',compact('datosCar')); /**retorna vista  y le pasa la información correspondiente al id */

        return redirect('CarModels')->with('Mensaje','Model modified Succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CarModels  $carModels
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CarModels::destroy($id);
        return redirect('CarModels')->with('Mensaje','Model deleted successully!');
    }
}
