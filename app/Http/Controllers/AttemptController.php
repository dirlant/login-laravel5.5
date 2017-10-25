<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Attempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttemptController extends Controller
{

  		public function __construct()
  		{

  		}
  		/**
  		 * Display a listing of the resource.
  		 *
  		 * @return Response
  		 */
  		public function index()
  		{

        $intentos =  DB::table('attempts')
                 ->select('*', DB::raw('SUM(point) AS points'))
                 ->groupBy('users_id')
                 ->orderBy('points', 'DESC')
                 ->get();

  			if(!$intentos){
  				return response()->json(['data' => $intentos, 'codigo' => 'Error 404'], 404);
  			}
  			return response()->json(['data' => $intentos], 200) ;
  		}
  		/**
  		 * Show the form for creating a new resource.
  		 *
  		 * @return Response
  		 */
  		public function create()
  		{

  		}
  		/**
  		 * Store a newly created resource in storage.
  		 *
  		 * @return Response
  		 */
  		public function store(Request $req)
  		{
        if (!$req){
    			return response()->json([
    				'mensaje' => 'No se recibieron datos',
    				'codigo' => 'Error 500',
    				'controller' => 'AttemptController'
    			], 500);
    		}

    		Attempt::create($req->all());

    		return response()->json([
    			'data' => 'Los intentos han sido registrados'
    		], 200) ;
  		}
  		/**
  		 * Display the specified resource.
  		 *
  		 * @param  int  $id
  		 * @return Response
  		 */
  		public function show($id)
  		{
        $intentos =  DB::table('attempts')
                 ->select('*', DB::raw('SUM(point) AS points'))
                 ->where('users_id',  $id)
                 ->get();

        if(!$intentos){
          return response()->json(['data' => $intentos, 'codigo' => 'Error 404'], 404);
        }
        return response()->json(['data' => $intentos], 200) ;
  		}
  		/**
  		 * Show the form for editing the specified resource.
  		 *
  		 * @param  int  $id
  		 * @return Response
  		 */
  		public function edit($id)
  		{

  		}
  		/**
  		 * Update the specified resource in storage.
  		 *
  		 * @param  int  $id
  		 * @return Response
  		 */
  		public function update($id)
  		{
  			return "actualizando vehiculo->$id";
  		}
  		/**
  		 * Remove the specified resource from storage.
  		 *
  		 * @param  int  $id
  		 * @return Response
  		 */
  		public function destroy($id)
  		{
  			return "eliminando vehiculo->$id";
  		}

}
