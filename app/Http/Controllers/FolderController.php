<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Folder;
use App\Http\Requests\StoreFolderRequest;


class FolderController extends Controller
{
    public function create(): View
    {
        return view('folders/create');
    }

    public function store(StoreFolderRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $folder = new Folder;
        $folder->name = $request->name;
        $folder->save();
        
        return redirect()->route('tasks.index', [$folder]);
    }

    public function edit(string $id): View
    {
        $folder = Folder::find($id);

        return view('folders/edit', ['folder' => $folder]);
    }

    public function update(StoreFolderRequest $request, string $id): RedirectResponse
    {
        $validated = $request->validated();

        $folder = Folder::find($id);
        $folder->name = $request->name;
        $folder->save();
        
        return redirect()->route('tasks.index', [$folder]);
    }
}
