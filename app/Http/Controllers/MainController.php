<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $title = "main title";
        $subtitle = "<i>Home subtitle</i>";
        $users = [
            'John Snow',
            'Cersei Lannister',
            'Jaime Lannister'
        ];
        return view("index", compact('title', 'subtitle', 'users'));
    }

    public function contacts()
    {
        return view('client.contacts');
    }

    public function sendEmail(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        // dd($request);
        // $name = $request->name;
        // $email = $request->email;
        // $message = $request->message;

        // mail('sWk5a@example.com', 'Hello', $email, $name, $message);

        return redirect()->route('contacts')->with('success', 'Email sent successfully');
    }

    public function feedback()
    {
        return view('client.feedback');
    }

    public function sendFeedback(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|max:2000',
            'rate' => 'required|integer|min:1|max:5',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');
        $rate = $request->input('rate');

        \Log::info('Feedback from {name}:', [
            'name' => $name,
            'email' => $email,
            'message' => $message,
            'rate' => $rate,
        ]);

        // dd($request->all());

        return redirect()->route('feedback')->with('success', 'Thanks for your feedback, ' . $name . '!');
    }
}
