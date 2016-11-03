<?php
namespace App\Messenger\Helpers;

use App\Answer;
use pimax\FbBotApp;
use pimax\Messages\Message;
use pimax\Messages\ImageMessage;
use pimax\UserProfile;
use pimax\Messages\MessageButton;
use pimax\Messages\StructuredMessage;
use pimax\Messages\MessageElement;
use pimax\Messages\MessageReceiptElement;
use pimax\Messages\Address;
use pimax\Messages\Summary;
use pimax\Messages\Adjustment;

class Messenger
{
	protected $verify_token;
	protected $token;
	protected $bot;

	function __construct() {
		$this->verify_token = env('verify_token');
		$this->token = env('token');
		
		$this->bot = new FbBotApp($this->token);
	}

	public function startConversation() {
		if (!empty($_REQUEST['hub_mode']) && $_REQUEST['hub_mode'] == 'subscribe' && $_REQUEST['hub_verify_token'] == $this->verify_token) {
			//if verification checking
			echo $_REQUEST['hub_challenge'];
		} else {
			// Other event
		    $data = json_decode(file_get_contents("php://input"), true, 512, JSON_BIGINT_AS_STRING);
		   	// Log::info($data);
		    if (!empty($data['entry'][0]['messaging'])) {
		        foreach ($data['entry'][0]['messaging'] as $message) {
		            // Skipping delivery messages
		            if (!empty($message['delivery'])) {
		                continue;
		            }
		            $command = "";

		            // When bot receive message from user
		            if (!empty($message['message'])) {
		            	//Check if the message is a greeting
		            	
		            		
		            	$command = $message['message']['text'];
		            	
		            	
		            // When bot receive button click from user
		            } else if (!empty($message['postback'])) {

		                $command = $message['postback']['payload'];
		            }

		            // Handle command
		            $bot_answer = Answer::where('command', '=', strtolower($command))->first();

		            if ($bot_answer) {

		            	$this->bot->send(new Message($message['sender']['id'], $bot_answer->answer));
		            	//When there is no command Basically skip the delivery msg
		            }  else {
		            	//Default
		            	$this->bot->send(new Message($message['sender']['id'], 'Sorry. I don’t understand you.'));
		            }
		        }
		    }
		}
	}

	// find the words of length more than 3 and append them to make the final command
	//return $command
	public function wordExtract($message){
		$processedMsg = "";
		$arr = str_word_count($message,1);
		$arrayLength = count($arr);
		for($count=0; $count < $arrayLength; $count++){
			if(strlen(strval($arr[$count])) > 3){
				$processedMsg = $processedMsg.strval($arr[$count]);
			}else{
				continue;
			}
		}
		return trim($processedMsg);
	}

	//If the message is a greeting it has to be handled first
	//return a boolean-like value to check if it is a greeting or not
	private function greetings($message){
		$check = strtolower(trim($message,".,!?"));
		if(strlen($message) > 8){
			return 0;
		} else if($message == "hi" || $message == "hello" || $message == "bye" ||
		 $message == "ok" || $message == "bye bye" || $message == "good bye"){
				return 1;
			}
		
	}

}
