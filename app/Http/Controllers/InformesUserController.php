<?php

namespace App\Http\Controllers;

use App\Models\InformesUser;
use Illuminate\Http\Request;

class InformesUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('usuarios/funciones-usuario/informes');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(InformesUser $informesUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InformesUser $informesUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InformesUser $informesUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InformesUser $informesUser)
    {
        //
    }
}
