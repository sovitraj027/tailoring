<?php

namespace App\Http\Controllers;

use App\Models\SiteInformation;
use App\Http\Requests\SiteInformationRequest;
use App\Traits\FileUploadTrait;

class SiteInformationController extends Controller
{
    use FileUploadTrait;

    public function create()
    {
        $site_information = SiteInformation::first();

        if (!is_null($site_information)) {
            return view('site_information.edit', compact('site_information'));
        }
        return view('site_information.create');
    }

    public function store(SiteInformationRequest $request)
    {
        $site_information = SiteInformation::create($request->except('image'));

        if ($request->hasFile('image')) {
            $this->fileUpload($site_information, 'image', 'site-info-image', false);
        }
        return redirect()->route('home')->with('success', 'SiteInformation Created Successfully!');
    }

    public function edit(SiteInformation $site_information)
    {
        return view('site_information.edit', compact('site_information'));
    }

    public function update(SiteInformationRequest $request, SiteInformation $site_information)
    {
        $site_information->update($request->except('image'));
        if ($request->hasFile('image')) {
            if (!is_null($site_information->image)) {

                $this->fileUpload($site_information, 'image', 'site-info-image', true);
            }
            $this->fileUpload($site_information, 'image', 'site-info-image', false);
        }
        return redirect()->route('home')->with('success', 'SiteInformation Updated Successfully!');
    }
}
