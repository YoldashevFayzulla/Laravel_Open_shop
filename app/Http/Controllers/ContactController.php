<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts=Contact::where('status','0')->get();
        return view('admin.contact.question',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contacts=Contact::where('status','!=','0')->get();
        return view('admin.contact.answer',compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {

        $contact->status = 1;
        $contact->save();
        return redirect()->back()->with('success','answer added');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        Contact::create([
            'name'=>'Answer to '.$contact->name,
            'question'=>$request->answer,
            'post_id'=>$contact->post_id,
            'answer_id'=>$contact-> id,
            'status'=>1
        ]);
        return redirect()->back()->with('success' ,'Answered' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->back()->with('success','deleted');
    }
}
