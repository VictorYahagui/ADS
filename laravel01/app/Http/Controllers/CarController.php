<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carro;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $car = new Carro();
            $cars = Carro::All();
            return view("car.index", [ 
                "cars" => $cars,
                "car" => $car   
            ]);
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
    public function store(Request $request) {
        if ($request ->get("id") != "") {
            $car = Carro::Find($request->get("id"));
        } else {
            $car  = new Carro();
        }
        $car = new Carro();
        $car->mark = $request-> get ("mark");
        $car->vehicleModel = $request-> get ("vehicleModel");
        $car->plate = $request-> get ("plate");
        $car->color = $request-> get ("color");
        $car->manufacturing = $request-> get ("manufacturing");
        $car->save();
        return redirect("/car");
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
        $car = Carro::Find($id);
        $cars = Carro::All();
        return view("car.index", [
            "cars" => $cars,
            "car" => $car
        ]);
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
    public function destroy($id)
    {
        Carro::Destroy($id);
        return redirect("/car");
    }
}
