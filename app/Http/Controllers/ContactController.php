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
        $contacts = Contact::paginate();

        return view('admin.contact.index', compact('contacts'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contact.show', compact('contact'));

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Contact::findOrFail($id);
        $data = $data->delete();
        return back();
    }
}
