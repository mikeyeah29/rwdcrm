<?php

namespace App\Http\Controllers\API;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {
        // $contact = new Contact();

        
        
        return response()->json(['yeah' => 'yeah mother fucker'], 200);
    }
}
