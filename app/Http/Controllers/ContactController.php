<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function index()
    {
        return response()->json(Contact::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|unique:contacts,phone',
        ]);

        Contact::create($request->all());

        return response()->json(['message' => 'Contact added successfully']);
    }

    public function show(Contact $contact)
    {
        return response()->json($contact);
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'string',
            'phone' => 'unique:contacts,phone,' . $contact->id,
        ]);

        $contact->update($request->all());

        return response()->json(['message' => 'Contact updated successfully']);
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return response()->json(['message' => 'Contact deleted successfully']);
    }

    public function importXML(Request $request)
    {
        $request->validate(['file' => 'required|mimes:xml']);

        $xml = simplexml_load_file($request->file('file'));

        foreach ($xml->contact as $contact) {
            Contact::updateOrCreate(
                ['phone' => (string) $contact->phone],
                ['name' => (string) $contact->name]
            );
        }

        return response()->json(['message' => 'Contacts imported successfully']);
    }
}
