<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use DB;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = DB::table('questions')->get();
        return view('quiz', compact('questions'));
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
        $this->validate($request, [
            'first_name' => 'required',
            'email' => 'required',
        ]);
        $input = $request->all();
        try{
            $category = array('C' => 0, 'I' => 0, 'O' => 0, 'V' => 0, 'A' => 0);
            $outcome = array('EDU' => 0, 'LSD' => 0, 'LAC' => 0, 'MPD' => 0);
            
            foreach($input as $key => $val):
                if(is_array($val)):
                    foreach($val as $key1 => $val1):
                        $category['C'] += ($val1 == 'C') ? 1 : 0;
                        $category['I'] += ($val1 == 'I') ? 1 : 0;
                        $category['O'] += ($val1 == 'O') ? 1 : 0;
                        $category['V'] += ($val1 == 'V') ? 1 : 0;
                        $category['A'] += ($val1 == 'A') ? 1 : 0;

                        $outcome['EDU'] += ($val1 == 'EDU') ? 1 : 0;
                        $outcome['LSD'] += ($val1 == 'LSD') ? 1 : 0;
                        $outcome['LAC'] += ($val1 == 'LAC') ? 1 : 0;
                        $outcome['MPD'] += ($val1 == 'MPD') ? 1 : 0;
                    endforeach;
                endif;
            endforeach;
            $input['category'] = array_search(max($category), $category);
            $input['outcome'] =  array_search(max($outcome), $outcome);
            $insert = Quiz::create($input);
            $quiz = Quiz::find($insert->id);
            return redirect()->route('quiz.thankyou')->with(['quiz' => $quiz]);
        }catch(Exception $e){
            throw $e;
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
        //
    }
}
