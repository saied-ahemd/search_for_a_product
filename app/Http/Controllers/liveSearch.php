<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\items;
use DB;

class liveSearch extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('liveSearch');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function action(request $request)
    {
        if($request->ajax()){
            $query=$request->get('query');
            if($query !=''){
                $data =DB::table('items')->where('Name','like','%'.$query.'%')->orWhere('Country_Made','like','%'.$query.'%')->orderBy('Item_ID','DESC')->get();
                $total=$data->count();
                if($total>0){
                    $allData=array(
                        'data_table' =>$data,
                        'count' =>$total,
                    );

                    return json_encode($allData);
                }
            }
            
            
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
