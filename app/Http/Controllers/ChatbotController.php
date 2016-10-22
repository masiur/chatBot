<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
use App\Answer;
class ChatbotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function webhook()
    {
        // return \Messenger::startConversation();


        $access_token = env('token');
        $verify_token = env('verify_token');
        $hub_verify_token = null;
         
        if(isset($_REQUEST['hub_challenge'])) {
            $challenge = $_REQUEST['hub_challenge'];
            $hub_verify_token = $_REQUEST['hub_verify_token'];
        }
         
         
        if ($hub_verify_token === $verify_token) {
            echo $challenge;
        }



        $input = json_decode(file_get_contents('php://input'), true);

        $sender = $input['entry'][0]['messaging'][0]['sender']['id'];
        $message = $input['entry'][0]['messaging'][0]['message']['text'];

        $demo = new Answer();
        $demo->answer = $message;
        $demo->save();


        /**
         * Some Basic rules to validate incoming messages
         */
        // if(preg_match('[time|current time|now]', strtolower($message))) {

        //     // Make request to Time API
        //     ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 6.0)');
        //     $result = file_get_contents("http://www.timeapi.org/utc/now?format=%25a%20%25b%20%25d%20%25I:%25M:%25S%20%25Y");
        //     if($result != '') {
        //         $message_to_reply = $result;
        //     }
        // } else {
        //     $message_to_reply = 'Huh! what do you mean?';
        // }
        // print $message_to_reply;

        //API Url
            $url = 'https://graph.facebook.com/v2.6/me/messages?access_token='.$access_token;


            //Initiate cURL.
            $ch = curl_init($url);

            //The JSON data.
            $jsonData = '{
                "recipient":{
                    "id":"'.$sender.'"
                },
                "message":{
                    "text":"Huh! what do you mean?"
                }
            }';



            // $options_header = array ( //Necessary Headers
            //         'http' => array(
            //         'method' => 'POST',
            //         'content' => json_encode($data_to_send),
            //         'header' => "Content-Type: application/json\n"
            //     )
            // );
            // $context = stream_context_create($options_header);
            // file_get_contents("https://graph.facebook.com/v2.6/me/messages?access_token=$access_token",false,$context);

            

            //Encode the array into JSON.
            $jsonDataEncoded = $jsonData;

            //Tell cURL that we want to send a POST request.
            curl_setopt($ch, CURLOPT_POST, 1);

            //Attach our encoded JSON string to the POST fields.
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

            //Set the content type to application/json
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));

            //Execute the request
            if(!empty($input['entry'][0]['messaging'][0]['message'])){
                $result = curl_exec($ch);
            }




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
