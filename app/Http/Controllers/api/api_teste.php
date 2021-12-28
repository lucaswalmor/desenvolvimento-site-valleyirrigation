<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Classes\Sistema\Revendas;
use Illuminate\Support\Facades\Http;

class api_teste extends Controller
{
    public function index()
    {
        return Revendas::all();
    }
    
    public function store(Request $request)
    {
        Revendas::create($request->all());
    }

    public function show($id)
    {
        return Revendas::findOrFail($id);
    }
    
    public function update(Request $request, $id)
    {
        $revenda = Revendas::findOrFail($id);
        $revenda->update($request->all());
    }
    
    public function destroy($id)
    {
        $revenda = Revendas::findOrFail($id);
        $revenda->delete();
    }
}
