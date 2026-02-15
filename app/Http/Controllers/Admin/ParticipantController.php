<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class ParticipantController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        return view('admin.peserta.index');
    }

    /*
    |--------------------------------------------------------------------------
    | DATATABLES
    |--------------------------------------------------------------------------
    */
    public function data(Request $request)
    {
        $query = Participant::with('user'); // WAJIB ADA

        if ($request->filled('searchbox')) {
            $search = $request->searchbox;

            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                ->orWhere('nisnim', 'like', "%{$search}%")
                ->orWhere('jurusan', 'like', "%{$search}%");
            });
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('actions', function ($participant) {
                return '
                    <div class="flex gap-2">
                        <a href="'.route('admin.peserta.show', $participant).'"
                        class="px-3 py-1 bg-green-500 text-white rounded text-sm">
                            Detail
                        </a>

                        <a href="'.route('admin.peserta.edit', $participant).'"
                        class="px-3 py-1 bg-blue-500 text-white rounded text-sm">
                            Edit
                        </a>

                        <form action="'.route('admin.peserta.destroy', $participant).'"
                            method="POST"
                            onsubmit="return confirm(\'Yakin hapus?\')">
                            '.csrf_field().'
                            '.method_field('DELETE').'
                            <button type="submit"
                                class="px-3 py-1 bg-red-500 text-white rounded text-sm">
                                Hapus
                            </button>
                        </form>
                    </div>
                ';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */
    public function create()
    {

        return view('admin.peserta.create');
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'nik' => 'required|string|max:16',
            'nisnim' => 'nullable|unique:participants,nisnim',
            'jenis_kelamin' => 'required|in:L,P',
            'jurusan' => 'nullable|string|max:100',
            'kontak_peserta' => 'nullable|string|max:20',
            'tahun_aktif' => 'required|digits:4',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        // Create user login
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pemagang',
        ]);

        // Create participant
        Participant::create([
            'user_id' => $user->id,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'nisnim' => $request->nisnim,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jurusan' => $request->jurusan,
            'kontak_peserta' => $request->kontak_peserta,
            'tahun_aktif' => $request->tahun_aktif,
            'keterangan' => $request->keterangan,
            'status' => 'active'
        ]);

        return redirect()
            ->route('admin.peserta.index')
            ->with('success', 'Peserta berhasil ditambahkan.');
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */
    public function show(Participant $participant)
    {
        return view('admin.peserta.detail', compact('participant'));
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */
    public function edit(Participant $participant)
    {

        return view('admin.peserta.edit', compact('participant'));
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, Participant $participant)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'nik' => 'required|string|max:16',
            'nisnim' => 'nullable|unique:participants,nisnim,' . $participant->id,
            'jenis_kelamin' => 'required|in:L,P',
            'jurusan' => 'nullable|string|max:100',
            'kontak_peserta' => 'nullable|string|max:20',
            'tahun_aktif' => 'required|digits:4',
        ]);

        $participant->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'nisnim' => $request->nisnim,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jurusan' => $request->jurusan,
            'kontak_peserta' => $request->kontak_peserta,
            'tahun_aktif' => $request->tahun_aktif,
            'keterangan' => $request->keterangan,
        ]);

        // Update nama user login juga
        if ($participant->user) {
            $participant->user->update([
                'name' => $request->nama,
            ]);
        }

        return redirect()
            ->route('admin.peserta.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */
    public function destroy(Participant $participant)
    {
        if ($participant->user) {
            $participant->user->delete();
        }

        $participant->delete();

        return redirect()
            ->route('admin.peserta.index')
            ->with('success', 'Peserta berhasil dihapus.');
    }
}
