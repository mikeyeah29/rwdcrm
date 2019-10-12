<?php

namespace App\Http\Controllers\API;

use App\Contact;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\EnquiryFromWebsite;

class ContactsController extends Controller
{
    public function yeah(){
        return response()->json(['yeah' => 'yeah mother fucker'], 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::where('api_token', $request->api_token)->first();

        $allowedDomain = 'rockettwd.com';

        $domain = $_SERVER['HTTP_REFERER'];

        if (strpos($domain, $allowedDomain) !== false) {
            $contact = new Contact();

            $contact->user = $user->id;
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->industry = $request->industry;
            $contact->company = $request->company;
            $contact->notes = $request->message . ' - package: ' . $request->package;
            $contact->save();

            Mail::to($user->email)->send(
                new EnquiryFromWebsite('rockettwd.com');
            );

        }else{
            return response()->json(['message' => 'Cant add contact from the address ' . $domain, 'user' => $domain], 418);
        }

        

        // send email...

        return response()->json(['message' => 'Ok', 'user' => $domain], 200);
    }
}
