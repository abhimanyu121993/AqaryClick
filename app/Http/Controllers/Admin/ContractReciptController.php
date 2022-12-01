<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContractRecipt;
use Illuminate\Http\Request;

class ContractReciptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contract=ContractRecipt::first();
        return view('admin.contractRecipt.contract_recipt',compact('contract'));
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
    public function store(Request $request)
    {
        $data= ContractRecipt::first()->update([
            'clause_one_english' => $request->clause_one_english,
            'clause_one_arabic' => $request->clause_one_arabic,
            'clause_two_english'=>$request->clause_two_english,
            'clause_two_arabic'=>$request->clause_two_arabic,
            'clause_three_english'=>$request->clause_three_english,
            'clause_three_arabic'=>$request->clause_three_arabic,
            'clause_four_english'=>$request->clause_four_english,
            'clause_four_arabic'=>$request->clause_four_arabic,
            'clause_five_english'=>$request->clause_five_english,
            'clause_five_arabic'=>$request->clause_five_arabic,
            'clause_six_english'=>$request->clause_six_english,
            'clause_six_arabic'=>$request->clause_six_arabic,
            'clause_seven_english'=>$request->clause_seven_english,
            'clause_seven_arabic'=>$request->clause_seven_arabic,
            'clause_eight_english'=>$request->clause_eight_english,
            'clause_eight_arabic'=>$request->clause_eight_arabic,
            'clause_nine_english'=>$request->clause_nine_english,
            'clause_nine_arabic'=>$request->clause_nine_arabic,
            'clause_ten_english'=>$request->clause_ten_english,
            'clause_ten_arabic'=>$request->clause_ten_arabic,
            'clause_eleven_english'=>$request->clause_eleven_english,
            'clause_eleven_arabic'=>$request->clause_eleven_arabic,
            'clause_twelve_english'=>$request->clause_twelve_english,
            'clause_twelve_arabic'=>$request->clause_twelve_arabic,
            'clause_therteen_english'=>$request->clause_therteen_english,
            'clause_therteen_arabic'=>$request->clause_therteen_arabic,
            'clause_therteen_arabic'=>$request->clause_therteen_arabic,
            'clause_fourteen_english'=>$request->clause_fourteen_english,
            'clause_fourteen_arabic'=>$request->clause_fourteen_arabic,
            'clause_fiftyteen_english'=>$request->clause_fiftyteen_english,
            'clause_fiftyteen_arabic'=>$request->clause_fiftyteen_arabic,
            'clause_sixteen_english' => $request->clause_sixteen_english,
            'clause_sixteen_arabic' => $request->clause_sixteen_arabic,
            'clause_seventeen_english' => $request->clause_seventeen_english,
            'clause_seventeen_arabic' => $request->clause_seventeen_arabic,
            'clause_eighteen_english' => $request->clause_eighteen_english,
            'clause_eighteen_arabic' => $request->clause_eighteen_arabic,
            'clause_nineteen_english' => $request->clause_nineteen_english,
            'clause_nineteen_arabic' => $request->clause_nineteen_arabic,
        ]);
        if($data){
        return back()->with('success','Contract Recipt has been created successfully.');
        }
        else{
            return redirect()->back()->with('error','Something Went Wrong');
        }
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
        
    }
}
