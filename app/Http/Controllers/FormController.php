<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FormController extends Controller
{
    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'Name' => 'required',
            'Email' => 'required|email',
            'Message' => 'required',
            'Company' => 'required',
            'Position' => 'required',
            'Phone' => 'required',


        ]);

      Mail::to($request['Email'])->send(new ContactFormMail($validatedData));


        return response()->json(['message' => 'Форма с вашими данными успешно отправлена', $validatedData], 200);
    }
}
