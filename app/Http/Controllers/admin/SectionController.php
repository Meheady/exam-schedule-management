<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionController extends Controller
{
    public function CreateSection()
    {
        $allData = Section::all();
        return view('admin.section.create', compact('allData'));
    }


    public function storeSection(Request $request)
    {
        $batch = new Section();
        $batch->section_name = $request->section_name;
        $batch->update_by = Auth::user()->id;
        $batch->save();

        return redirect()->back()->with('success','Section save successfully');
    }

    public function deleteSection($id)
    {
        Section::find($id)->delete();
        return redirect()->back()->with('success','Section delete successfully');
    }
}
