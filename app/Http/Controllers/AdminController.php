<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Mail\Verification;
use App\Models\Accounts;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function datatable(Request $request)  {
        if ($request->ajax()) {
            $data = Accounts::where('role', 99)->latest();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return view('pages.karyawan.modal.b_edit', compact('data'));
                })
                ->rawColumns(['action'])
                ->toJson();
        }
    }

    public function  index() : View {
        return view('pages.admin.index');
    }

    public function store(RegisterRequest $request) : RedirectResponse {
        DB::beginTransaction();
        try {
            $password = Str::random(8);

            $account = Accounts::create([
                'first_name'    => $request->first_name,
                'last_name'     => $request->last_name,
                'email'         => $request->email,
                'password'      => Hash::make($password),
                'role'          => 99
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        DB::commit();
        Mail::to($account->email)->send(new Verification($password));

        return redirect()->back()->with('success-message', 'Berhasil mendaftar sebagai admin, silahkan cek password diemail anda.');
    }

}
