<?php

namespace App\Http\Controllers;

use App\Exports\AnggotaExport;
use App\Exports\ExportData;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PendidikanFormal;
use App\Models\PendidikanProfesi;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class AnggotaController extends Controller
{
    protected function getFormFieldsDataPersonal(): array
    {
        return [
            $this->createField('nama_depan', 'Nama Depan', 'text', false),
            $this->createField('nama_belakang', 'Nama Belakang', 'text', false),
            $this->createField('tempat_lahir', 'Tempat Lahir', 'text', false),
            $this->createField('tanggal_lahir', 'Tanggal Lahir', 'date', false),
            $this->createSelectField('agama', 'Agama', false, ['islam', 'katolik', 'protestan', 'hindu', 'budha', 'konghuncu']),
            $this->createField('golongan_darah', 'Golongan Darah', 'text', false),
            $this->createField('no_telepon', 'No Telepon', 'text', false),
            $this->createField('no_ponsel', 'No Ponsel', 'text', false),
            $this->createField('alamat_tinggal', 'Alamat Tinggal', 'textarea', false, ['rows' => 3]),
            $this->createField('propinsi_tinggal', 'Provinsi Tinggal', 'text', false),
            $this->createField('kabupaten_tinggal', 'Kabupaten Tinggal', 'text', false),
            $this->createField('kecamatan_tinggal', 'Kecamatan Tinggal', 'text', false),
            $this->createField('desa_tinggal', 'Desa Tinggal', 'text', false),
        ];
    }
    protected function getFormFieldsKependudukan(): array
    {
        return [
            $this->createField('nik', 'NIK', 'text', false),
            $this->createField('alamat', 'Alamat', 'textarea', false, ['rows' => 3]),
            $this->createField('propinsi', 'Provinsi', 'text', false),
            $this->createField('kabupaten', 'Kabupaten', 'text', false),
            $this->createField('kecamatan', 'Kecamatan', 'text', false),
            $this->createField('desa', 'Desa', 'text', false),
        ];
    }

    protected function getFormFieldsPerizinan(): array
    {
        return [
            $this->createField('no_str', 'Nomor STR', 'text', false),
            $this->createField('masa_berlaku_str', 'Masa Berlaku STR', 'date', false),
            $this->createField('no_sipb_fasyankes', 'No SIPB Fasyankes', 'text', false),
            $this->createField('masa_berlaku_sipb_fasyankes', 'Masa Berlaku SIPB Fasyankes', 'date', false),
            $this->createField('no_sipb_praktik_mandiri', 'No SIPB Praktik Mandiri', 'text', false),
            $this->createField('masa_berlaku_sipb_praktik_mandiri', 'Masa Berlaku SIPB Praktik Mandiri', 'date', false),
            $this->createField('no_sipb_bidan_delima', 'No SIPB Bidan Delima', 'text', false),
            $this->createField('masa_berlaku_sipb_bidan_delima', 'Masa Berlaku SIPB Bidan Delima', 'date', false),
        ];
    }

    public function index()
    {
        $data = [
            'header_name' => "Data Anggota",
            'page_name' => "Tabel Data Anggota"
        ];
        $user = Auth::user();
        $columns = [
            'users' => [
                'name' => 'Nama',
                'email' => 'Email',
                'no_kta' => 'Nomor KTA',
                'jenis_kelamin' => 'Jenis Kelamin',
                'status_keanggotaan' => 'Status Keanggotaan',
            ],
            'dataPersonal' => [
                'nama_depan' => 'Nama Depan',
                'nama_belakang' => 'Nama Belakang',
                'tempat_lahir' => 'Tempat Lahir',
                'tanggal_lahir' => 'Tanggal Lahir',
            ],
            'kependudukan' => [
                'nik' => 'NIK',
                'alamat' => 'Alamat',
                'kabupaten' => 'Kabupaten',
                'kecamatan' => 'Kecamatan',
                'desa' => 'Desa',
            ],
            'pendidikanFormals' => [
                'jenjang' => 'Jenjang',
                'jurusan' => 'Jurusan',
                'nama_pt' => 'Nama PT',
                'alamat_pt' => 'Alamat PT',
                'tahun_lulus' => 'Tahun Lulus',
                'no_ijazah' => 'No Ijazah',
                'path_ijazah' => 'Path Ijazah',
            ],
            'pendidikanProfesis' => [
                'jenjang' => 'Jenjang Profesi',
                'jurusan' => 'Jurusan Profesi',
                'nama_pt' => 'Nama PT Profesi',
                'alamat_pt' => 'Alamat PT Profesi',
                'tahun_lulus' => 'Tahun Lulus Profesi',
                'no_ijazah' => 'No Ijazah Profesi',
                'path_ijazah' => 'Path Ijazah Profesi',
            ],
            'pelatihans' => [
                'jenis_pelatihan' => 'Jenis Pelatihan',
                'tahun_pelatihan' => 'Tahun Pelatihan',
                'deskripsi_pelatihan' => 'Deskripsi Pelatihan',
                'path_sertifikat' => 'Path Sertifikat',
            ],
            'pekerjaan' => [
                'status_pekerjaan' => 'Status Pekerjaan',
                'tempat_kerja' => 'Tempat Kerja',
                'nama_instansi' => 'Nama Instansi',
                'alamat_kerja' => 'Alamat Kerja',
                'propinsi_kerja' => 'Propinsi Kerja',
                'kabupaten_kerja' => 'Kabupaten Kerja',
                'kecamatan_kerja' => 'Kecamatan Kerja',
                'desa_kerja' => 'Desa Kerja',
            ],
            'perizinan' => [
                'no_str' => 'No STR',
                'masa_berlaku_str' => 'Masa Berlaku STR',
                'no_sipb_fasyankes' => 'No SIPB Fasyankes',
                'masa_berlaku_sipb_fasyankes' => 'Masa Berlaku SIPB Fasyankes',
                'no_sipb_praktik_mandiri' => 'No SIPB Praktik Mandiri',
                'masa_berlaku_sipb_praktik_mandiri' => 'Masa Berlaku SIPB Praktik Mandiri',
                'no_sipb_bidan_delima' => 'No SIPB Bidan Delima',
                'masa_berlaku_sipb_bidan_delima' => 'Masa Berlaku SIPB Bidan Delima',
            ],
        ];


        if ($user->role->name === 'petugas') {
            $anggotas = User::where('ranting_id', $user->ranting_id)
                ->whereHas('role', function ($query) {
                    $query->where('name', 'anggota');
                })
                ->get();
        } else {
            $anggotas = null;
        }

        return view('role.' . roleName() . '.pages.anggota.index', compact('data', 'anggotas', 'columns'));
    }

    public function exportAnggota(Request $request)
    {
        $selectedColumns = $request->input('columns');

        if (!$selectedColumns) {
            return redirect()->back()->with('error', 'Pilih setidaknya satu kolom untuk diekspor.');
        }

        // Ambil semua relasi yang dibutuhkan
        $relations = collect($selectedColumns)->map(function ($column) {
            $parts = explode('.', $column);
            return $parts[0];
        })->unique()->filter(function ($relation) {
            return $relation !== 'users';
        })->all();

        // dd($relations);

        $anggotas = User::whereHas('role', function ($query) {
            $query->where('name', 'anggota');
        })->with($relations)->get();

        $data = [];

        foreach ($anggotas as $anggota) {
            // Ambil semua relasi hasMany
            $hasManyRelations = ['pendidikanFormals', 'pendidikanProfesis', 'pelatihans'];
            $maxCount = 1;

            foreach ($hasManyRelations as $relation) {
                if (in_array($relation, $relations)) {
                    $count = $anggota->$relation->count();
                    $maxCount = max($maxCount, $count);
                }
            }

            for ($i = 0; $i < $maxCount; $i++) {
                $row = [];

                foreach ($selectedColumns as $column) {
                    [$relation, $field] = explode('.', $column, 2);

                    if ($relation === 'users') {
                        $row[$column] = $i === 0 ? $anggota->$field : ''; // hanya isi di baris pertama
                    } else {
                        $relationData = $anggota->$relation;

                        if (is_iterable($relationData)) {
                            // hasMany
                            $row[$column] = isset($relationData[$i]) ? $relationData[$i]->$field : '';
                        } else {
                            // hasOne
                            $row[$column] = $i === 0 ? ($relationData->$field ?? '') : '';
                        }
                    }
                }

                $data[] = $row;
            }
        }

        // Buat header
        $headings = array_map(function ($column) {
            return ucwords(str_replace(['.', '_'], [' ', ' '], $column));
        }, array_values($selectedColumns));

        return Excel::download(new AnggotaExport($data, $headings), 'anggota.xlsx');
    }


    public function edit($no_kta)
    {
        $data = [
            'header_name' => "Detail Anggota | Data Personal",
            'page_name' => "Halaman Detail Anggota | Data Personal"
        ];
        $anggota = User::where('no_kta', $no_kta)->first();
        $dataPersonal = $anggota->dataPersonal;
        session(['no_kta' => $no_kta]);

        $fields = $this->getFormFieldsDataPersonal();
        return view('role.' . roleName() . '.pages.anggota.edit.data-personal', compact('data', 'anggota', 'fields', 'dataPersonal'));
    }

    public function editKependudukan($no_kta)
    {
        $data = [
            'header_name' => "Detail Anggota | Kependudukan",
            'page_name' => "Halaman Detail Anggota | Kependudukan"
        ];
        $anggota = User::where('no_kta', $no_kta)->first();
        $kependudukan = $anggota->kependudukan;
        session(['no_kta' => $no_kta]);

        $fields = $this->getFormFieldsKependudukan();
        // dd($dataPersonal);
        return view('role.' . roleName() . '.pages.anggota.edit.kependudukan', compact('data', 'anggota', 'fields', 'kependudukan'));
    }

    public function editPekerjaan($no_kta)
    {
        $data = [
            'header_name' => "Detail Anggota | Pekerjaan",
            'page_name' => "Halaman Detail Anggota | Pekerjaan"
        ];
        $anggota = User::where('no_kta', $no_kta)->first();
        $pekerjaan = $anggota->pekerjaan;
        session(['no_kta' => $no_kta]);

        return view('role.' . roleName() . '.pages.anggota.edit.pekerjaan', compact('data', 'anggota', 'pekerjaan'));
    }

    public function editPendidikan($no_kta)
    {
        $data = [
            'header_name' => "Detail Anggota | Pendidikan",
            'page_name' => "Halaman Detail Anggota | Pendidikan"
        ];
        $anggota = User::where('no_kta', $no_kta)->first();
        $pendidikanFormals = $anggota->pendidikanFormals;
        $pendidikanProfesis = $anggota->pendidikanProfesis;
        session(['no_kta' => $no_kta]);

        // dd($dataPersonal);
        return view('role.' . roleName() . '.pages.anggota.edit.pendidikan', compact('data', 'anggota', 'pendidikanFormals', 'pendidikanProfesis'));
    }

    public function editPelatihan($no_kta)
    {
        $data = [
            'header_name' => "Detail Anggota | Pelatihan",
            'page_name' => "Halaman Detail Anggota | Pelatihan"
        ];
        $anggota = User::where('no_kta', $no_kta)->first();
        $pelatihans = $anggota->pelatihans;
        session(['no_kta' => $no_kta]);

        // dd($dataPersonal);
        return view('role.' . roleName() . '.pages.anggota.edit.pelatihan', compact('data', 'anggota', 'pelatihans'));
    }

    public function editPerizinan($no_kta)
    {
        $data = [
            'header_name' => "Detail Anggota | Perizinan",
            'page_name' => "Halaman Detail Anggota | Perizinan"
        ];
        $anggota = User::where('no_kta', $no_kta)->first();
        $perizinan = $anggota->perizinan;
        $fields = $this->getFormFieldsPerizinan();
        session(['no_kta' => $no_kta]);

        // dd($dataPersonal);
        return view('role.' . roleName() . '.pages.anggota.edit.perizinan', compact('data', 'anggota', 'perizinan', 'fields'));
    }

    public function storePendidikanFormal(Request $request)
    {
        try {
            $validated = $request->validate([
                'jenjang' => 'required|in:SD,SMP,SMA/SMK,D1,D2,D3,D4,S1,S2,S3',
                'jurusan' => 'nullable|string|max:255',
                'nama_pt' => 'required|string|max:255',
                'alamat_pt' => 'nullable|string|max:255',
                'tahun_lulus' => 'required|digits:4',
                'no_ijazah' => 'required|string|max:255',
                'path_ijazah' => 'nullable|file|mimes:pdf|max:2048',
            ]);

            $validated['user_id'] = Auth::id();

            // Handle file upload
            if ($request->hasFile('path_ijazah')) {
                $file = $request->file('path_ijazah');
                $filename = time() . '_' . $file->getClientOriginalName();
                $validated['path_ijazah'] = $file->storeAs('ijazah', $filename, 'public');
            }

            PendidikanFormal::create($validated);

            return redirect()->back()->with('success', 'Pendidikan formal berhasil ditambahkan.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan data pendidikan. ' . $e->getMessage());
        }
    }

    public function updatePendidikanFormal(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'jenjang' => 'required|string',
            'jurusan' => 'required|string',
            'nama_pt' => 'required|string',
            'alamat_pt' => 'nullable|string',
            'tahun_lulus' => 'required|digits:4',
            'no_ijazah' => 'nullable|string',
            'path_ijazah' => 'nullable|mimes:pdf|max:2048', // Validasi file PDF
        ]);

        try {
            // Ambil data pendidikan formal berdasarkan ID
            $pendidikan = PendidikanFormal::findOrFail($id);

            // Update data pendidikan formal
            $pendidikan->jenjang = $request->input('jenjang');
            $pendidikan->jurusan = $request->input('jurusan');
            $pendidikan->nama_pt = $request->input('nama_pt');
            $pendidikan->alamat_pt = $request->input('alamat_pt');
            $pendidikan->tahun_lulus = $request->input('tahun_lulus');
            $pendidikan->no_ijazah = $request->input('no_ijazah');

            // Cek jika ada file yang diupload
            if ($request->hasFile('path_ijazah')) {
                // Validasi file upload
                $file = $request->file('path_ijazah');
                if ($file->getError() !== UPLOAD_ERR_OK) {
                    return back()->with('error', 'Terjadi kesalahan saat mengunggah file.');
                }

                // Hapus file lama jika ada
                if ($pendidikan->path_ijazah && file_exists(public_path('uploads/ijazah/' . $pendidikan->path_ijazah))) {
                    unlink(public_path('uploads/ijazah/' . $pendidikan->path_ijazah));
                }

                // Simpan file baru
                $filename = time() . '-' . $file->getClientOriginalName();
                $file->move(public_path('uploads/ijazah'), $filename);
                $pendidikan->path_ijazah = $filename;
            }

            // Simpan perubahan
            $pendidikan->save();

            // Redirect atau response setelah berhasil update
            return redirect()->route('dashboard.' . roleName() . '.pendidikan-formal.index')
                ->with('success', 'Pendidikan Formal berhasil diperbarui.');
        } catch (\Exception $e) {
            // Menangani error, misalnya data tidak ditemukan
            return back()->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }


    public function deletePendidikanFormal($id)
    {
        try {
            $pendidikan = PendidikanFormal::findOrFail($id);

            // Hapus file ijazah jika ada
            if ($pendidikan->path_ijazah && file_exists(public_path('uploads/ijazah/' . $pendidikan->path_ijazah))) {
                unlink(public_path('uploads/ijazah/' . $pendidikan->path_ijazah));
            }

            $pendidikan->delete();

            return response()->json([
                'success' => true,
                'message' => 'Pendidikan Formal berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }




    // pendidikan profesi

    public function storePendidikanProfesi(Request $request)
    {
        try {
            $validated = $request->validate([
                'jenjang' => 'required|in:D3,D4,S1,S2,S3',
                'jurusan' => 'nullable|string|max:255',
                'nama_pt' => 'required|string|max:255',
                'alamat_pt' => 'nullable|string|max:255',
                'tahun_lulus' => 'required|digits:4',
                'no_ijazah' => 'required|string|max:255',
                'path_ijazah' => 'nullable|file|mimes:pdf|max:2048',
            ]);

            $validated['user_id'] = Auth::id();

            // Handle file upload
            if ($request->hasFile('path_ijazah')) {
                $file = $request->file('path_ijazah');
                $filename = time() . '_' . $file->getClientOriginalName();
                $validated['path_ijazah'] = $file->storeAs('ijazah', $filename, 'public');
            }

            PendidikanProfesi::create($validated);

            return redirect()->back()->with('success', 'Pendidikan profesi berhasil ditambahkan.');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan data pendidikan. ' . $e->getMessage());
        }
    }

    public function updatePendidikanProfesi(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'jenjang' => 'required|string',
            'jurusan' => 'required|string',
            'nama_pt' => 'required|string',
            'alamat_pt' => 'nullable|string',
            'tahun_lulus' => 'required|digits:4',
            'no_ijazah' => 'nullable|string',
            'path_ijazah' => 'nullable|mimes:pdf|max:2048', // Validasi file PDF
        ]);

        try {
            // Ambil data pendidikan profesi berdasarkan ID
            $pendidikan = PendidikanProfesi::findOrFail($id);

            // Update data pendidikan profesi
            $pendidikan->jenjang = $request->input('jenjang');
            $pendidikan->jurusan = $request->input('jurusan');
            $pendidikan->nama_pt = $request->input('nama_pt');
            $pendidikan->alamat_pt = $request->input('alamat_pt');
            $pendidikan->tahun_lulus = $request->input('tahun_lulus');
            $pendidikan->no_ijazah = $request->input('no_ijazah');

            // Cek jika ada file yang diupload
            if ($request->hasFile('path_ijazah')) {
                $file = $request->file('path_ijazah');

                // Validasi manual error upload
                if ($file->getError() !== UPLOAD_ERR_OK) {
                    return back()->with('error', 'Terjadi kesalahan saat mengunggah file.');
                }

                // Hapus file lama jika ada
                if ($pendidikan->path_ijazah && Storage::disk('public')->exists('ijazah/' . $pendidikan->path_ijazah)) {
                    Storage::disk('public')->delete('ijazah/' . $pendidikan->path_ijazah);
                }

                // Simpan file baru
                $filename = time() . '-' . $file->getClientOriginalName();
                $file->storeAs('ijazah', $filename, 'public');
                $pendidikan->path_ijazah = $filename;
            }

            // Simpan perubahan
            $pendidikan->save();

            // Redirect atau response setelah berhasil update
            return redirect()->route('dashboard.' . roleName() . '.pendidikan-profesi.index')
                ->with('success', 'Pendidikan Profesi berhasil diperbarui.');
        } catch (\Exception $e) {
            // Menangani error, misalnya data tidak ditemukan
            return back()->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }


    public function deletePendidikanProfesi($id)
    {
        try {
            $pendidikan = PendidikanProfesi::findOrFail($id);

            // Hapus file ijazah jika ada
            if ($pendidikan->path_ijazah && file_exists(public_path('uploads/ijazah/' . $pendidikan->path_ijazah))) {
                unlink(public_path('uploads/ijazah/' . $pendidikan->path_ijazah));
            }

            $pendidikan->delete();

            return response()->json([
                'success' => true,
                'message' => 'Pendidikan Profesi berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
