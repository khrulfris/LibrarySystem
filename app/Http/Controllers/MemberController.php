<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function index()
    {
        $Members = Member::paginate(10);
        return view('members',compact('Members'));
    }

    public function create(){

        return view('members', compact('Members'));
    }

    public function store(Request $request)
    {
        Member::create($request->all());
        return redirect()->route('member.index')
        ->with('success','Member Saved Successfully.','OK');
    }

    public function show(Member $members){
    }

    public function edit(Member $members){
    }

    public function update(Request $request, Member $members)
    {
        $members->update($request->all());
        return redirect()->back()
        ->with('success','Member Updated Successfully.','OK');
    }

    public function destroy(Member $members){
        $members->delete();
        return redirect()->route('members')
        ->with('success','Member Deleted Successfully.','OK');
    }
}
