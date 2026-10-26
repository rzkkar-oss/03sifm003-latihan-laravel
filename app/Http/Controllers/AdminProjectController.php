<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class AdminProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();

        return view('admin.project.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.project.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|max:255',
            'description' => 'required',
            'teknologi'   => 'required|max:255',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status'      => 'required',
        ]);

        $data = $request->only(['title', 'description', 'teknologi', 'status']);

        // upload gambar ke folder public/images
        if ($request->hasFile('image')) {
            $namaFile = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $namaFile);
            $data['image'] = $namaFile;
        }

        Project::create($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Data project berhasil ditambahkan');
    }

    public function show(string $id)
    {
        // halaman detail tidak dipakai di admin, kembali ke daftar project
        return redirect()->route('admin.projects.index');
    }

    public function edit(string $id)
    {
        $project = Project::findOrFail($id);

        return view('admin.project.edit', compact('project'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'       => 'required|max:255',
            'description' => 'required',
            'teknologi'   => 'required|max:255',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status'      => 'required',
        ]);

        $project = Project::findOrFail($id);

        $data = $request->only(['title', 'description', 'teknologi', 'status']);

        // kalau ada gambar baru, ganti. kalau tidak, pakai gambar lama
        if ($request->hasFile('image')) {
            $namaFile = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $namaFile);
            $data['image'] = $namaFile;
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Data project berhasil diubah');
    }

    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Data project berhasil dihapus');
    }
}