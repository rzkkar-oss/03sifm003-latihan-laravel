<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = [
                'nama'   => 'Rizky Yulianto',
                'nim'    => '251011701206',
                'prodi'  => 'Sistem Informasi',
                'kampus' => 'Universitas Pamulang',
                'email'  => 'rzk@gmail.com',
                'status' => 'Aktif',
                'foto'   => 'images/rizky.jpeg',
        ];

        return view('mahasiswa', compact('mahasiswa'));
    }
}