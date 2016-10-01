<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
class ChatbotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function webhook()
    // {
    //     return \Messenger::startConversation();
    // }

    
    public function receiveData(Request $request)
    {
        $data = $request->all();
        $receiveString = $data['message'];

        $lowerCaseFormate = strtolower($receiveString);  // make everything lowecase 

        switch ($lowerCaseFormate) {
            case "hi":
            case "he":
            case "hay":
            case "hello":
            case "hey":
                $data = $this->replyToBeSent("Hello, Sir");
                break;
            case "pizaa":
                $data = $this->replyToBeSent("You mean Pizza!");
                break;
            case "green":
                $data = $this->replyToBeSent("Your favorite color is green!");
                break;
            default:
                $data = $this->replyToBeSent("Your favorite color is neither red, blue, nor green!");
        }

        return $this->response($data, 201);
    }

    private function replyToBeSent($replyMessage)
    {
        $data = $replyMessage;
        return $data;
    }

    public function index()
    {
        return view('chat')->with('title', 'Chat');
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

    // return $this->response('Designation Deleted Successfully', 201);
    //     } else {
    //         return $this->errorResponse('Password did not match', 400);
    //     }
    // code for json response to 
    private function response($dataToBeSent, $status = 200){
        return Response::json([
                        'data' => $dataToBeSent,
                        'status_code' => $status
                        
                    ],$status);
    }
    private function errorResponse($dataToBeSent, $status = 400){
        return Response::json([
                        'error' => $dataToBeSent,
                        'status_code' => $status
                        
                    ], $status);
    }
}
