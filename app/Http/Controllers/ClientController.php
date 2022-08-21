<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $client = Client::all();
        return view('admin.client.index', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'cnic' => 'required',
            'dob' => 'required',
        ]);
        $input = $request->all();
        if ($request->hasfile('image')) {
            $image1 = $request->file('image');
            $name = time() . 'image' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'image/';
            $image1->move($destinationPath, $name);
            $input['image'] = 'image/' . $name;
        }
        Client::create($input);
        return redirect()->back();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.client.create');
    }

    /**
     * Display the specified resource.
     *
     * @param Client $client
     * @return Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Client $client
     * @return Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        return view('admin.client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Client $client
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        $client->name = $request->name;
        $client->dob = $request->dob;
        $client->cnic = $request->cnic;
        $client->description = $request->description;
        if ($request->hasfile('image')) {
            $image1 = $request->file('image');
            $name = time() . 'image' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'image/';
            $image1->move($destinationPath, $name);
            $client->image = 'image/' . $name;
        }
        $client->update();
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Client $client
     * @return Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        return redirect()->back();

    }
}
