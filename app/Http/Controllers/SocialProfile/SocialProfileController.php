<?php

namespace App\Http\Controllers\SocialProfile;

use Exception;
use Illuminate\Http\Request;
use App\Models\SocialProfile;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\SocialProfile\StoreSocialProfileRequest;
use App\Http\Requests\SocialProfile\UpdateSocialProfileRequest;

class SocialProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socialProfiles = SocialProfile::all();

        return view('admin.social-profiles.index', compact('socialProfiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.social-profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSocialProfileRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                if (!$request->hasFile('icon')) {
                    SocialProfile::create($request->validated());

                    return;
                }

                if (isset($request->icon) && file_exists(storage_path('app/public/' . $request->icon))) {
                    unlink(storage_path('app/public/' . $request->icon));
                }

                $iconPath = $request->file('icon')->store('social_icons', 'public');

                SocialProfile::create(array_merge($request->validated(), [
                    'icon' => $iconPath
                ]));
            });

            return redirect()->route('admin.social-profiles.index');
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'system_error' => ['System error!' . $e->getMessage()],
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SocialProfile $socialProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SocialProfile $socialProfile)
    {
        return view('admin.social-profiles.edit', compact('socialProfile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSocialProfileRequest $request, SocialProfile $socialProfile)
    {
        try {
            DB::transaction(function () use ($request, $socialProfile) {
                if (!$request->hasFile('icon')) {
                    $socialProfile->update($request->validated());

                    return;
                }

                if (isset($socialProfile->icon) && file_exists(storage_path('app/public/' . $socialProfile->icon))) {
                    unlink(storage_path('app/public/' . $socialProfile->icon));
                }

                $iconPath = $request->file('icon')->store('social_icons', 'public');

                $socialProfile->update(array_merge($request->validated(), [
                    'icon' => $iconPath,
                ]));
            });

            return redirect()->route('admin.social-profiles.index');
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'system_error' => ['System error!' . $e->getMessage()],
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SocialProfile $socialProfile)
    {
        $socialProfile->delete();

        return redirect()->route('admin.social-profiles.index');
    }
}
