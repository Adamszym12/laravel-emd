<?php


namespace App\Http\Controllers\Admin;


use App\Http\Requests\UpdatePagePostRequest;
use App\Models\Page;

class PageController
{
    public function edit(Page $page){
        $content = $page->getContent();
        return view('admin.manage_homepage', compact(['page', 'content']));
    }

    public function update(UpdatePagePostRequest $request,Page $page){
        $page->updatePage($request->validated());
        $page->save();
        return redirect()->back()->with(['status' => 'Home created successfully.']);
    }
}
