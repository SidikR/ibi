<?php

namespace App\Http\Controllers;

use App\Models\Ranting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RantingController extends Controller
{
    public function select(Request $request)
    {
        if (Auth::ranting()) {
            return redirect()->to('dashboard/' . Auth::ranting()->ranting->name);
        } else {
            Auth::guard('web')->logout();
            return redirect()->route('login')->with('status', 'You are not authorized to access this page.');
        }
    }

    public function index()
    {
        $data = [
            'header_name' => "Manajemen Ranting",
            'page_name' => "Manajemen Rantings"
        ];
        $rantings = Ranting::all();
        return view('role.pages.rantings.index', compact('rantings', 'data'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required',
            ]);

            Ranting::create($validated);

            return redirect()->back()->with('success', 'ranting berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan data. Pesan: ' . $e->getMessage());
        }
    }


    public function update(Request $request, Ranting $ranting)
    {
        try {

            $validated = $request->validate([
                'name' => 'required'
            ]);

            $ranting->update($validated);

            return redirect()->back()->with('success', 'ranting updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $ranting = Ranting::findOrFail($id);
            $ranting->delete();

            return response()->json([
                'success' => true,
                'message' => 'Ranting berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus ranting.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
