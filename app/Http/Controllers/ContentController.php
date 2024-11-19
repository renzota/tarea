<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class ContentController extends Controller
{
    public function index($type)
    {
        $content = Content::where('type', $type)->first(); // Obtener el contenido por tipo
        return view('backend.content.edit', compact('content'));
    }

    public function update(Request $request, $type)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'required|string',
            'cta_text' => 'nullable|string|max:255',
        ]);

        $content = Content::where('type', $type)->first();
        $content->update($request->all());

        return redirect()->route('content.edit', ['type' => $type])->with('success', ucfirst($type) . ' actualizado correctamente');
    }
}
