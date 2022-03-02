<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsor;
use App\Models\Club;
use Illuminate\Support\Facades\DB;

class ClubSponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clubSponsor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // Liste des clubs
        $clubsList = Club::all();

        // Liste des sponsors
        $sponsorsList = Sponsor::all();

        return view('clubSponsor.create', compact('clubsList', 'sponsorsList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Créer un objet à partir de la classe Club
        // $club = $request->club_id;
        // $sponsorPrice = $request->price;

        // Associer un sponsor à un club
        // $sponsor = Sponsor::find($request->sponsor_id);
        DB::insert('insert into clubs_sponsors (club_id, sponsor_id, price) values (?, ?, ?)', [$request->club_id,$request->sponsor_id,$request->price]);
        return view('clubs.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
