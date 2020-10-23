<?php


namespace App\Http\Controllers\Admin;


use App\Http\Requests\UpdatePagePostRequest;
use App\Models\Page;

class PageController
{
    public function edit(Page $page){
        //$view = 'admin.manage_'+$page->name;
        return view('admin.manage_homepage', compact('page'));
    }

    public function update(UpdatePagePostRequest $request,Page $page){
        $asd = $page->update($request->validated());
        dd(($asd));
        return redirect()->back()->with(['status' => 'Home created successfully.']);
    }
}
