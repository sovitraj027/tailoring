<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
  public function getMembership()
  {
    return view('member.create');
  }

  public function addMember(MemberRequest $request)
  {

    $memberExist = Member::where('id', auth()->user()->id)->exists();
    if ($memberExist) {
      return redirect()->route('welcome')->with('success', 'you already request for the membership. Please wait for the verification');
    }
    Member::create($request->except('_token'));
    return redirect()->route('welcome')->with('success', 'successfully added membership request. Please wait for the verification');
  }

  public function index()
  {
    return view(
      'member.index',
      [
        'members' => Member::latest()->get()
      ]
    );
  }

  public function destroy($id)
  {
    $member = Member::where('id', $id)->first();
    $member->delete();
    return redirect()->route('members')->with('error', 'Member deleted successfully!');
  }

  public function changeStatus(Request $request)
  {
    $member = Member::find($request->member_id);
    $member->status = $request->status;
    $member->save();

    return response()->json(['success' => 'Status change successfully.']);
  }

  public function verified(Member $member)
    {
        $member->update([
            'status' => 1
        ]);

        return redirect()->route('members')->with('success', 'Membership Verified Successfully!');
    }

    public function unverified(Member $member)
    {
        $member->update([
            'status' => 0
        ]);

        return redirect()->route('members')->with('error', 'Membership unverified!');
    }
}
