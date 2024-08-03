<?php

namespace App\Http\Controllers\CommunityProfile;

use Exception;
use Illuminate\Http\Request;
use App\Models\CommunityProfile;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\CommunityProfile\StoreCommunityProfileRequest;

class CommunityProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $communityProfile = CommunityProfile::first();

        return view('admin.community-profiles.index', compact('communityProfile'));
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
    public function store(StoreCommunityProfileRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $communityProfile = CommunityProfile::first();

                if (!$request->hasFile('logo')) {
                    $communityProfile->update(array_merge($request->validated(), [
                        'social_media' => json_encode([
                            'website' => $request->social_media['website'],
                            'instagram' => $request->social_media['instagram'],
                            'telegram' => $request->social_media['telegram'],
                        ]),
                    ]));

                    return;
                }

                if (file_exists(storage_path('app/public/' . $communityProfile->logo))) {
                    unlink(storage_path('app/public/' . $communityProfile->logo));
                }

                $logoPath = $request->file('logo')->store('community_logos', 'public');

                $communityProfile->update(array_merge($request->validated(), [
                    'social_media' => json_encode([
                        'website' => $request->social_media['website'],
                        'instagram' => $request->social_media['instagram'],
                        'telegram' => $request->social_media['telegram'],
                    ]),
                    'logo' => $logoPath
                ]));
            });

            return redirect()->route('admin.community-profiles.index');
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'system_error' => ['System error!' . $e->getMessage()],
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CommunityProfile $communityProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommunityProfile $communityProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommunityProfile $communityProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommunityProfile $communityProfile)
    {
        //
    }
}
