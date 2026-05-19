<?php

namespace App\Http\Controllers; 

use App\Models\campaign; 
use Illuminate\Http\Request;

class HomeController extends Controller // Dia menginduk ke Controller utama yang sudah diperbaiki di atas
{
    public function index()
    {
        $campaigns = campaign::latest()->get();
        return view('campaign.index', compact('campaigns'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'target_amount' => 'required|numeric|min:1000',
        ]);

        campaign::create([
            'title' => $request->title,
            'description' => $request->description,
            'target_amount' => $request->target_amount,
        ]);

        return redirect()->route('home')->with('success', 'Campaign sosial berhasil dibuat!');
    }

    public function edit($id)
    {
        $campaign = campaign::findOrFail($id);
        return view('campaign.edit', compact('campaign'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'target_amount' => 'required|numeric|min:1000',
        ]);

        $campaign = campaign::findOrFail($id);
        $campaign->update([
            'title' => $request->title,
            'description' => $request->description,
            'target_amount' => $request->target_amount,
        ]);

        return redirect()->route('home')->with('success', 'Campaign berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $campaign = campaign::findOrFail($id);
        $campaign->delete();

        return redirect()->route('home')->with('success', 'Campaign berhasil dihapus!');
    }
}