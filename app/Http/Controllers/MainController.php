<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Feedback;

class MainController extends Controller
{
    public function feedback()
    {
        return view('layouts.primary', [
            'page' => 'feedback',
            'title' => 'Написать мне',
            'activeMenu' => 'feedback',
        ]);
    }
    public function feedbackPost()
    {
        $this->validate($this->request, [
            'name' => 'required|max:50|min:2',
            'email' => 'required|max:255|email',
            'message' => 'required|max:10240|min:10',
        ]);
        $result = Mail::to('marg13@yandex.ru')
            ->send(new Feedback($this->request->all()
        ));
        return redirect()->home()->with('message', trans('messages.mailsent'));
    }
}
