<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TravelController extends Controller
{

    public function index()
    {
        return view('destination');
    }

    public function getBeautifulLocations(Request $request)
    {
        

            $this->validate(request(), [
                'location' => 'required|min:2|max:255'
            ]);
            $location = $request->input('location');
            $prompt = 'If this location in sri lanka, please Give at least five beautiful locations near to ' . $location .
                ' and this beautiful locations should be withing 25 km from the ' . $location .
                ' and also  give the correct distance to the locations from the ' . $location;
            // dd($prompt);
            $responses = $this->askToChatGPT($prompt);

            return view('beautiful_locations', compact('responses', 'location'));
       
    }

    private function askToChatGPT($prompt)
    {

        $data = Http::withoutVerifying()
            ->withHeaders([
                'Authorization' => 'Bearer ' . config('services.openai.key'),
                'Content-Type' => 'application/json',
            ])
            ->post("https://api.openai.com/v1/chat/completions", [
                "model" => "gpt-3.5-turbo",
                'messages' => [
                    [
                        "role" => "user",
                        "content" => $prompt
                    ]
                ],
                'temperature' => 0.5,
                "max_tokens" => 200,
                "top_p" => 1.0,
                "frequency_penalty" => 0.52,
                "presence_penalty" => 0.5,
                "stop" => ["11."],
            ])
            ->json();
        $responses = $data['choices'][0]['message']['content'];
        // dd($responses);

        return $responses;
    }
}
