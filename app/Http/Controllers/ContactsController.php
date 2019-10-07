<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user = auth()->user();
        $contacts = Contact::where('user', '=', $user->id)->orderBy('created_at', 'desc')->paginate(30);

        $contactsTotal = Contact::where('response', '!=', 'not_contacted')->count();

        if($contactsTotal == 0){
            $contactsTotal = 1;
        }

        $res_positive = Contact::where('user', $user->id)->where('response', 'positive')->count();
        $res_nointerest = Contact::where('user', $user->id)->where('response', 'not_interested')->count();
        $res_negitive = Contact::where('user', $user->id)->where('response', 'negative')->count();
        $res_noanswer = Contact::where('user', $user->id)->where('response', 'no_answer')->count();

        $stats = [];
        $stats['positive'] = $res_positive / ($contactsTotal / 100);
        $stats['no_interest'] = $res_nointerest / ($contactsTotal / 100);
        $stats['negative'] = $res_negitive / ($contactsTotal / 100);
        $stats['no_answer'] = $res_noanswer / ($contactsTotal / 100);
        $stats['posNum'] = $res_positive;
        $stats['noiNum'] = $res_nointerest;
        $stats['negNum'] = $res_negitive;
        $stats['noaNum'] = $res_noanswer;

        return view('contacts/all', [
            'contacts' => $contacts,
            'stats' => $stats,
            'total_contacted' => $contactsTotal
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts/add', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        request()->validate([
            'company' => 'required',
        ]);

        $contact = new Contact();
        $contact->user = $user->id;
        $contact->company = $request->company;

        if($request->name){
            $contact->name = $request->name;
        }
        
        $contact->email = $request->email;
        $contact->number = $request->number;
        $contact->website = $request->website;
        $contact->industry = $request->industry;

        if($request->notes){
            $contact->notes = $request->notes;
        }
        
        $contact->save();

        return redirect('/contacts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        abort_if($contact->user !== auth()->id(), 403);
        return view('contacts/show', ['contact' => $contact]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        abort_if($contact->user !== auth()->id(), 403);
        return view('contacts/edit', ['contact' => $contact]);
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
        $contact = Contact::findOrFail($id);

        request()->validate([
            'company' => 'required',
        ]);

        $contact->company = $request->company;

        if($request->name){
            $contact->name = $request->name;
        }
        
        $contact->email = $request->email;
        $contact->number = $request->number;
        $contact->website = $request->website;
        $contact->industry = $request->industry;

        if($request->response){
           $contact->response = $request->response; 
        }

        if($request->notes){
            $contact->notes = $request->notes;
        }
        $contact->save();

        return redirect('/contacts');
    }

    public function setResponse(Request $request, $id){
        $contact = Contact::findOrFail($id);
        $contact->response = $request->response;
        // $contact->contacted = true;
        $contact->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::find($id)->delete();
        return redirect('/contacts');
    }
}
