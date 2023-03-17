<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BatchController extends Controller
{
    public function CreateBatch()
    {
        $allData = Batch::all();
        return view('admin.batch.create', compact('allData'));
    }


    public function storeBatch(Request $request)
    {
        $batch = new Batch();
        $batch->batch_name = $request->batch_name;
        $batch->update_by = Auth::user()->id;
        $batch->save();

        return redirect()->back()->with('success','Batch save successfully');
    }

    public function deleteBatch($id)
    {
        Batch::find($id)->delete();
        return redirect()->back()->with('success','Section delete successfully');
    }
}
