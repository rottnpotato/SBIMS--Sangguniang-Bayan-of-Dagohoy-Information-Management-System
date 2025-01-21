<?php

namespace App\Http\Controllers\AdminPanel;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\sb_members;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Middleware\AdminOnly;
use App\Models\Account;
use App\Models\resident_account;
use Illuminate\Support\Facades\DB;


class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('custom.auth');
        $this->middleware(AdminOnly::class)->only(['getPendingAccounts', 'approveRejectAccount']);
    }

    public function store(Request $request)
    {
        if (!session()->has("user")) {
            return redirect("login");
        }
        $validator = Validator::make($request->all(), [
            "create_account_form_firstname" => "required",
            "create_account_form_lastname" => "required",
            "create_account_form_email" => "required|unique:accounts,email",
            "create_account_form_password" => "required|same:create_account_form_verify_password",
            "create_account_form_verify_password" => "required|same:create_account_form_password",
            "create_account_form_type" => "required|in:Encoder,Admin,Secretary,Clerk,SBMember",
            "sb_member_id" => "required_if:create_account_form_type,SB Member|exists:sb_members,id",
        ], [
            "create_account_form_firstname.required" => "This field cannot be empty",
            "create_account_form_lastname.required" => "This field cannot be empty",
            "create_account_form_email.required" => "This field cannot be empty",
            "create_account_form_password.required" => "This field cannot be empty",
            "create_account_form_verify_password.required" => "This field cannot be empty",
            "create_account_form_email.ends_with" => "Valid email is required",
            "create_account_form_password.same" => "Password does not match",
            "create_account_form_verify_password.same" => "Password does not match",
            "create_account_form_email.unique" => "Email Taken!",
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        $values = [
            'first_name' => $request->create_account_form_firstname,
            'last_name' => $request->create_account_form_lastname,
            'email' => $request->create_account_form_email,
            'password' => Hash::make($request->create_account_form_password),
            'type' => $request->create_account_form_type,
            'status' => session()->get('user.type') === 'Secretary' ? 'pending' : 'active',
        ];

        if ($request->create_account_form_type === 'SBMember') {
            $sbMember = DB::table('sb_members')->where('id', $request->sb_member_id)->first();
            $values['first_name'] = $sbMember->first_name;
            $values['last_name'] = $sbMember->last_name;
        }

        $query = DB::table('accounts')->insert($values);

        if ($query) {
            $message = 'Added new account :)';
            if (session()->get('user.type') === 'Secretary') {
                $message .= ' Account is pending approval.';
            }
            return response()->json(['status' => 1, 'msg' => $message]);
        }

        return response()->json(['status' => 0, 'msg' => 'Failed to create account']);
    }

    public function getSBMembers()
    {
        $sbMembers = DB::table('sb_members')->select('id', 'first_name', 'last_name')->get();
        return response()->json($sbMembers);
    }

    public function getPendingAccounts()
    {
        $pendingAccounts = DB::table('accounts')->where('status', 'pending')->get();
        return datatables()->of($pendingAccounts)
            ->addColumn('action', function($row){
                $btn = '<button data-id="'.$row->account_id.'" class="approve-btn btn btn-success btn-sm">Approve</button> ';
                $btn .= '<button data-id="'.$row->account_id.'" class="reject-btn btn btn-danger btn-sm">Reject</button>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function approveRejectAccount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:accounts,account_id',
            'action' => 'required|in:approve,reject',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()
            ]);
        }

        $account = DB::table('accounts')->where('account_id', $request->id)->first();

        if (!$account || $account->status !== 'pending') {
            return response()->json([
                'status' => 0,
                'message' => 'This account is not pending approval.'
            ]);
        }

        if ($request->action === 'approve') {
            DB::table('accounts')->where('account_id', $request->id)->update(['status' => 'active']);
            // TODO: Send approval notification email to user
            $message = 'Account approved successfully.';
        } else {
            DB::table('accounts')->where('account_id', $request->id)->delete();
            // TODO: Send rejection notification email to user
            $message = 'Account rejected and removed.';
        }

        return response()->json([
            'status' => 1,
            'message' => $message
        ]);
    }
    public function remove($id)

    {
        $sessions = DB::table('sessions')->where('user_id', '=', $id)->delete();
        $ac = Account::findOrFail($id);
        $ac->delete();

        return response()->json(['message' => `$ac->first_name deleted successfully`]);
    }
    
}