<?php

namespace App\Http\Controllers;

use App\Models\club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class clubController extends Controller
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
        $clubList = DB::table("clubs")
                    ->join("clubs_sponsors", "clubs.id", "=", "clubs_sponsors.club_id")
                    ->join("sponsors", "clubs_sponsors.sponsor_id", "=", "sponsors.id")
                    ->select("clubs.name as clubName", "sponsors.name as sponsorName", "clubs_sponsors.price")
                    ->get();
        //var_dump($clubList);
        //die();
        return view('clubs.index', compact('clubList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clubs.create');
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

    Club::create($input);

    return redirect()->route('clubs.index')->with('success','Club created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\club  $club
     * @return \Illuminate\Http\Response
     */
    public function show(club $club)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\club  $club
     * @return \Illuminate\Http\Response
     */
    public function edit(club $club)
    {
        $category = $club->name;
        return view('clubs.edit', compact(['club']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\club  $club
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, club $club)
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

        $club->update($input);
        return redirect()->route('clubs.index')->with('success','Club updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\club  $club
     * @return \Illuminate\Http\Response
     */
    public function destroy(club $club)
    {
        $club->delete();
        return redirect()->route('clubs.index')
        ->with('success','Club deleted successfully');
    }
}
