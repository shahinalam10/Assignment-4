<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('contacts');

        if ($request->has('sort')) {
            $query->orderBy($request->query('sort'), $request->query('direction', 'asc'));
        }

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->query('search') . '%')
                  ->orWhere('email', 'like', '%' . $request->query('search') . '%');
        }

        $contacts = $query->get();

        return view('contacts.index', ['contacts' => $contacts, 'request' => $request]);
        
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:contacts',
        ]);

        DB::table('contacts')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        session()->flash('success', 'Contact created successfully.');

        return redirect('/contacts');
    }

    public function show($id)
    {
        $contact = DB::table('contacts')->find($id);

        return view('contacts.show', compact('contact'));
    }

    public function edit($id)
    {
        $contact = DB::table('contacts')->find($id);
        

        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:contacts,email,' . $id,
        ]);

        DB::table('contacts')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'updated_at' => now(),
        ]);

        session()->flash('success', 'Contact update successfully.');
        return redirect('/contacts');
    }

    public function destroy($id)
    {
        DB::table('contacts')->delete($id);

        session()->flash('success', 'Contact delete successfully.');

        return redirect('/contacts');
    }
}
