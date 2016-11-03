<?php

use Illuminate\Database\Seeder;

class QuestionsAndAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = [
            ['command' => 'hi', 'answer' => 'hello', 'user_id' => 1],
            ['command' => 'how are you?', 'answer' => 'I am fine thanks. And you?', 'user_id' => 1],
            ['command' => 'i am fine too', 'answer' => 'Gland to hear that.', 'user_id' => 1],
            ['command' => 'i am sick', 'answer' => 'Health is the most important thing in the lief, please take care', 'user_id' => 1],
            ['command' => 'shit', 'answer' => 'Umm, I don\'t like it', 'user_id' => 1],
            ['command' => 'fuck', 'answer' => 'Umm, Rudey :/', 'user_id' => 1],
            ['command' => 'bye', 'answer' => 'Bye, one important things, please don\'t miss to chat with me again', 'user_id' => 1],
            ['command' => 'you are quite fun', 'answer' => 'You are welcome, BTW, tht\'s my job yeah!', 'user_id' => 1],
            ['command' => 'how it\'s the weather today', 'answer' => 'I can\'t help you with this may be my friend Poncho [https://www.facebook.com/hiponcho] can help it to you.', 'user_id' => 1],
            ['command' => 'life is too short', 'answer' => 'We all know yeah', 'user_id' => 1],
            ['command' => 'What exam date', 'answer' => 'Its 26 November. All the best. :)', 'user_id' => 1],
            ['command' => 'know exam seat plan', 'answer' => 'It will be provided to you in right time via sms.', 'user_id' => 1],
            ['command' => 'sust location', 'answer' => 'Akhalia, Sylhet. Just in the right place ;)', 'user_id' => 1],
            ['command' => 'give admission circular', 'answer' => 'It can be downloaded from www.sust.edu/addmission', 'user_id' => 1],
            ['command' => 'thank', 'answer' => 'You are always welcome.', 'user_id' => 1],
        ];

        DB::table('answers')->delete();
        DB::table('answers')->insert($data);
    }
}
