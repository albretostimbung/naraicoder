<?php

namespace App\Http\Controllers\Partner;

use Exception;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\Partner\StorePartnerRequest;
use App\Http\Requests\Partner\UpdatePartnerRequest;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::latest()->get();

        return view('admin.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePartnerRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                if (!$request->hasFile('logo')) {
                    Partner::create($request->validated());

                    return;
                }

                $logoPath = $request->file('logo')->store('partner_logos', 'public');

                Partner::create(array_merge($request->validated(), [
                    'logo' => $logoPath,
                ]));
            });

            return redirect()->route('admin.partners.index');
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'system_error' => ['System error!' . $e->getMessage()],
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePartnerRequest $request, Partner $partner)
    {
        try {
            DB::transaction(function () use ($request, $partner) {
                if (!$request->hasFile('logo')) {
                    $partner->update($request->validated());

                    return;
                }

                if (isset($partner->logo) && file_exists(storage_path('app/public/' . $partner->logo))) {
                    unlink(storage_path('app/public/' . $partner->logo));
                }

                $logoPath = $request->file('logo')->store('partner_logos', 'public');

                $partner->update(array_merge($request->validated(), [
                    'logo' => $logoPath,
                ]));
            });

            return redirect()->route('admin.partners.index');
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'system_error' => ['System error!' . $e->getMessage()],
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        $partner->delete();

        return redirect()->route('admin.partners.index');
    }
}
