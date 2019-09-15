<?php

namespace App\Http\Controllers;
use App\CarBrands;
use App\CarModels;
use Illuminate\Http\Request;

class Operator extends Controller
{

     public function __construct(){

          $this->middleware('isOperator'); /**se carga el middleware en el constructor */

     }

 

    public function index($value){
        

              if ($value == 1){

        $datos['carbrands'] = CarBrands::paginate(5);
         return view('CarCrud.index',$datos);}
         else if ($value==2){
         $datos['carmodels'] = CarModels::paginate(5);
         return view('CarModels.index',$datos);
            



         }

        }





}
