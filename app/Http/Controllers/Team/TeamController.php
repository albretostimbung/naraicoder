<?php

namespace App\Http\Controllers\Team;

use Exception;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Team\StoreTeamRequest;
use App\Http\Requests\Team\UpdateTeamRequest;
use Illuminate\Validation\ValidationException;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::latest()->get();

        return view('admin.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                if (!$request->hasFile('avatar')) {
                    Team::create($request->validated());

                    return;
                }

                $avatarPath = $request->file('avatar')->store('team_avatars', 'public');

                Team::create(array_merge($request->validated(), [
                    'avatar' => $avatarPath,
                ]));
            });

            return redirect()->route('admin.teams.index');
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'system_error' => ['System error!' . $e->getMessage()],
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        return view('admin.teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamRequest $request, Team $team)
    {
        try {
            DB::transaction(function () use ($request, $team) {
                if (!$request->hasFile('avatar')) {
                    $team->update($request->validated());

                    return;
                }

                if (isset($team->avatar) && file_exists(storage_path('app/public/' . $team->avatar))) {
                    unlink(storage_path('app/public/' . $team->avatar));
                }

                $avatarPath = $request->file('avatar')->store('team_avatars', 'public');

                $team->update(array_merge($request->validated(), [
                    'logo' => $avatarPath,
                ]));
            });

            return redirect()->route('admin.teams.index');
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'system_error' => ['System error!' . $e->getMessage()],
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        $team->delete();

        return redirect()->route('admin.teams.index');
    }
}
