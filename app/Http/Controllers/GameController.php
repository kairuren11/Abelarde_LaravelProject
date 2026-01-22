<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Platform;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class GameController extends Controller
{
    public function index(Request $request)
    {
        $query = Game::with('platform');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('developer', 'like', "%{$search}%")
                  ->orWhere('publisher', 'like', "%{$search}%");
            });
        }

        if ($request->filled('platform_id')) {
            $query->where('platform_id', $request->input('platform_id'));
        }

        $games = $query->latest()->get();
        $platforms = Platform::all();
        $activePlatforms = Platform::count();

        return view('dashboard', compact('games', 'platforms', 'activePlatforms'));
    }

    public function trash()
    {
        $games = Game::onlyTrashed()->latest()->get();
        $platforms = Platform::all();

        return view('trash', compact('games', 'platforms'));
    }

    public function restore($id)
    {
        $game = Game::withTrashed()->findOrFail($id);
        $game->restore();

        return redirect()->back()->with('success', 'Game restored successfully!');
    }

    public function forceDelete($id)
    {
        $game = Game::withTrashed()->findOrFail($id);
        
        if ($game->photo && Storage::exists('public/games/' . $game->photo)) {
            Storage::delete('public/games/' . $game->photo);
        }

        $game->forceDelete();

        return redirect()->back()->with('success', 'Game permanently deleted!');
    }

    public function export(Request $request)
    {
        $query = Game::with('platform');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('developer', 'like', "%{$search}%")
                  ->orWhere('publisher', 'like', "%{$search}%");
            });
        }

        if ($request->filled('platform_id')) {
            $query->where('platform_id', $request->input('platform_id'));
        }

        $games = $query->latest()->get();
        
        $pdf = Pdf::loadView('pdf.games', compact('games'))
            ->setPaper('a4', 'landscape');

        $filename = 'games_export_' . date('Y-m-d_H-i-s') . '.pdf';
        return $pdf->download($filename);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'release_year' => 'required|string|max:4',
            'developer' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'platform_id' => 'required|exists:platforms,id',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/games', $filename);
            $validated['photo'] = $filename;
        }

        Game::create($validated);

        return redirect()->back()->with('success', 'Game added successfully!');
    }

    public function update(Request $request, Game $game)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'release_year' => 'required|string|max:4',
            'developer' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'platform_id' => 'required|exists:platforms,id',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($game->photo && Storage::exists('public/games/' . $game->photo)) {
                Storage::delete('public/games/' . $game->photo);
            }

            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/games', $filename);
            $validated['photo'] = $filename;
        }

        $game->update($validated);

        return redirect()->back()->with('success', 'Game updated successfully!');
    }

    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->back()->with('success', 'Game moved to trash!');
    }
}