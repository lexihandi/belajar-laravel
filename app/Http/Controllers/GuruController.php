<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuruModel;

class GuruController extends Controller
{
    public function __construct()
    {
        $this->GuruModel = new GuruModel();
    }

    public function index()
    {
        $data = [
            'guru' => $this->GuruModel->allData(),
        ];
        return view('v_guru', $data);
    }

    public function detail($id_guru)
    {
        if (!$this->GuruModel->detail($id_guru)) {
            abort(404);
        }
        $data = [
            'guru' => $this->GuruModel->detail($id_guru),
        ];
        return view('v_detailguru', $data);
    }

    public function add()
    {
        return view('v_addguru');
    }

    public function insert()
    {
        Request()->validate(
            [
                'nip' => 'required|unique:tbl_guru,nip|min:4|max:5',
                'nama_guru' => 'required',
                'mapel' => 'required',
                'foto_guru' => 'required|mimes:png,jpg,jpeg|max:1024',
            ],
            [
                'nip.required' => 'Nomor nip wajib diisi',
                'nip.unique' => 'Nomor ini sudah ada (duplikat)',
                'nip.min' => 'Nomor nip minimal 4 angka', 'nip.max' => 'Nomor nip maksimal 5 angka',
                'nama_guru.required' => 'Nama guru wajib diisi',
                'mapel.required' => 'Mapel wajib diisi',
                'foto_guru.required' => 'Foto wajib diupload',
                'foto_guru.mimes' => 'Format tidak didukung, hanya mendukung format PNG, JPG, JPEG',
                'foto_guru.max' => 'Ukuran foto melebihi 1024mb'
            ],
        );

        $file = Request()->foto_guru;
        $fileName = Request()->nip . '.' . $file->extension();
        $file->move(public_path('img'), $fileName);

        $data =
            [
                'nip' => Request()->nip,
                'nama_guru' => Request()->nama_guru,
                'mapel' => Request()->mapel,
                'foto_guru' => $fileName,
            ];

        $this->GuruModel->addData($data);
        return redirect()->route('guru')->with('pesan', 'Data berhasil disimpan');
    }

    public function edit($id_guru)
    {
        if (!$this->GuruModel->detail($id_guru)) {
            abort(404);
        };
        $data = [
            'guru' => $this->GuruModel->detail($id_guru),
        ];
        return view('v_editguru', $data);
    }

    public function update($id_guru)
    {
        Request()->validate(
            [
                'nip' => 'required|min:4|max:5',
                'nama_guru' => 'required',
                'mapel' => 'required',
                'foto_guru' => 'mimes:png,jpg,jpeg|max:1024',
            ],
            [
                'nip.required' => 'Nomor nip wajib diisi',
                'nip.min' => 'Nomor nip minimal 4 angka',
                'nip.max' => 'Nomor nip maksimal 5 angka',
                'nama_guru.required' => 'Nama guru wajib diisi',
                'mapel.required' => 'Mapel wajib diisi',
                'foto_guru.mimes' => 'Format tidak didukung, hanya mendukung format PNG, JPG, JPEG',
                'foto_guru.max' => 'Ukuran foto melebihi 1024mb'
            ],
        );

        if (Request()->foto_guru <> "") {
            $file = Request()->foto_guru;
            $fileName = Request()->nip . '.' . $file->extension();
            $file->move(public_path('img'), $fileName);

            $data =
                [
                    'nip' => Request()->nip,
                    'nama_guru' => Request()->nama_guru,
                    'mapel' => Request()->mapel,
                    'foto_guru' => $fileName,
                ];

            $this->GuruModel->editData($id_guru, $data);
        } else {
            $data =
                [
                    'nip' => Request()->nip,
                    'nama_guru' => Request()->nama_guru,
                    'mapel' => Request()->mapel
                ];

            $this->GuruModel->editData($id_guru, $data);
        }

        return redirect()->route('guru')->with('pesan', 'Data berhasil diupdate');
    }
}
