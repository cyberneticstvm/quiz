<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use QrCode;
use PDF;
use Mail;
use DB;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $settings;

    public function __construct(){        
        $this->settings = DB::table('settings')->first();
    }

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
    public function testmail(){
        $mailData = array('qid' => $quiz->id, 'first_name' => $request->first_name);
         
        Mail::to('vijoysniit@gmail.com')->send(new AcknowledgementMail($mailData));
           
        dd("Email is sent successfully.");
    }
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
            $sum = array_sum($category);
            $input['c_per'] = ($category['C'] > 0) ? ceil((100/$sum)*$category['C']) : 0;
            $input['i_per'] = ($category['I'] > 0) ? ceil((100/$sum)*$category['I']) : 0;
            $input['o_per'] = ($category['O'] > 0) ? ceil((100/$sum)*$category['O']) : 0;
            $input['v_per'] = ($category['V'] > 0) ? ceil((100/$sum)*$category['V']) : 0;
            $input['a_per'] = ($category['A'] > 0) ? ceil((100/$sum)*$category['A']) : 0;

            $input['category'] = array_search(max($category), $category);
            $input['outcome'] =  array_search(max($outcome), $outcome);
            $insert = Quiz::create($input);
            $quiz = Quiz::find($insert->id);
            $data = array('qid' => $quiz->id, 'first_name' => $request->first_name);
            Mail::send('email.acknowledgement', $data, function($message) use($request){
                $message->to($request->email, $request->first_name);
                $message->from($this->settings->admin_email, $this->settings->admin_name);
                $message->cc($this->settings->admin_email, $this->settings->admin_name);
                $message->replyTo($this->settings->admin_email, $this->settings->admin_name);
                $message->subject('Life Style Design Quiz - Report');                
                //$message->priority(2);                
            });            
        }catch(Exception $e){
            throw $e;
        }
        return redirect()->route('quiz.thankyou')->with(['quiz' => $quiz]);        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function report($id)
    {
        $quiz = Quiz::find($id);    
        $chart = "{
            type: 'bar',
            data: {
                labels: ['Compassion', 'Innovation', 'Optimism', 'Vision', 'Diligence'],
                datasets: [{
                    label: 'Your Profile Breakdown', 
                    data: [".$quiz->c_per.", ".$quiz->i_per.", ".$quiz->o_per.", ".$quiz->v_per.", ".$quiz->a_per."],
                    backgroundColor: 'rgb(220, 118, 51)'
                }]
            }
        }";
        $pdf = PDF::loadView('report', ['quiz' => $quiz, 'chart' => $chart]);
        return $pdf->stream('report.pdf', array("Attachment"=>0));
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
