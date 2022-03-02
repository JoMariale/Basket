<?php

namespace App\Http\Controllers;

use App\Models\sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class sponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // SELECT cl.name as clubName, sp.name as sponsorName, cs.price FROM `clubs` as cl
        // JOIN clubs_sponsors as cs ON cl.id = cs.club_id
        // JOIN sponsors as sp ON cs.sponsor_id = sp.id
        $sponsorList = DB::table("sponsors")
                    ->join("clubs_sponsors", "sponsors.id", "=", "clubs_sponsors.sponsor_id")
                    ->join("clubs", "clubs_sponsors.club_id", "=", "clubs.id")
                    ->select("clubs.name as clubName", "sponsors.name as sponsorName", "clubs_sponsors.price")
                    ->get();
        //var_dump($clubList);
        //die();
        return view('sponsors.index', compact('sponsorList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('sponsors.create');
    }


    public function store(Request $request)
    {

    $input = $request->all();
    // $input = {
        // title: "Ukraine",
        // image: "53h4dh4fgh657hsdhiod"
    // }
    /*
    //create the post
    $input =  Post::create([
        'title' => $request->title,
        'image' => $request->image,
        'category_id' => $request->category_id,
    ]);
    */

    Sponsor::create($input);

    return redirect()->route('sponsors.index')->with('success','sponsor created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function show(sponsor $sponsor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function edit(sponsor $sponsor)
    {
        $category = $sponsor->name;
        return view('sponsors.edit', compact(['sponsor']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sponsor $sponsor)
    {
        $request->validate([
            'name' => 'min:2|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        $input = $request->all();
        // $input = {
            // title: "Ukraine",
            // image: "53h4dh4fgh657hsdhiod"
        // }
        if ($image = $request->file('image')) {
            $imageDestinationPath = 'images/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $input['image'] = "$postImage"; // $input['image'] = "20221502.jpeg";
        } else {
            unset($input['image']);
        }

        $sponsor->update($input);
        return redirect()->route('sponsors.index')->with('success','Sponsors updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function destroy(sponsor $sponsor)
    {
        $sponsor->delete();
        return redirect()->route('sponsors.index')
        ->with('success','Sponsor deleted successfully');
    }
}
