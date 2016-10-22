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

    public function webhook()
    {
        return \Messenger::startConversation();
    }

    public function postWebhook()
    {
        // return \Messenger::startConversation();
        $verify_token = env('verify_token');
        $access_token = env('token');

        // $token = "YOUR TOKEN GOES HERE";
         
        file_put_contents("message.txt",file_get_contents("php://input"));
        $fb_message = file_get_contents("message.txt");
        $fb_message = json_decode($fb_message);
        $rec_id = $fb_message->entry[0]->messaging[0]->sender->id; //Sender's ID
        $rec_msg= $fb_message->entry[0]->messaging[0]->message->text; //Sender's Message
        $data_to_send = array(
            'recipient'=> array('id'=>"$rec_id"), //ID to reply
            'message' => array('text'=>"Hi I am Test Bot") //Message to reply
        );
         
        $options_header = array ( //Necessary Headers
                'http' => array(
                'method' => 'POST',
                'content' => json_encode($data_to_send),
                'header' => "Content-Type: application/json\n"
            )
        );
        $context = stream_context_create($options_header);
        file_get_contents("https://graph.facebook.com/v2.6/me/messages?access_token=$access_token",false,$context);
        
    }

    
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
