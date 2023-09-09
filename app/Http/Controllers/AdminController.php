<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
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
                ->editColumn('created_at', function ($data) {
                    return $data->created_at->format('d, M Y');
                })
                ->addColumn('action', function ($data) {
                    return view('pages.admin.modal.b_edit', compact('data'));
                })
                ->rawColumns(['action', 'created_at'])
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

    public function show($id) {
        $data = Accounts::whereId($id)->first();
        if (!$data) {
            return redirect()->back()->with('error-message', 'Data tidak ditemukan.');

        }
        return $data;
    }

    public function update(AdminRequest $request, $id){

        $account = Accounts::whereId($id)->first();
        DB::beginTransaction();
        try {
            $password = Str::random(8);
            $account->update([
                'first_name'    => $request->first_name,
                'last_name'     => $request->last_name,
                'email'         => $request->email,
            ]);

            if ($request->email != $account->email) {
                $account->update([
                    'password' => Hash::make($password)
                ]);
                Mail::to($account->email)->send(new Verification($password));
            }

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        DB::commit();
        return redirect()->back()->with('success-message', 'Berhasil mendaftar sebagai admin');
    }

    public function delete($id){
        $account = Accounts::whereId($id)->first();

        DB::beginTransaction();
        try {
            $account->delete();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        DB::commit();
        return redirect()->back()->with('success-message', 'Berhasil Menghapus Data.');
    }

}
