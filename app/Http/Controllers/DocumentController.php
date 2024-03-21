<?php

namespace App\Http\Controllers;

use App\Models\Document;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::paginate(10);

        return view('documents.index', compact('documents'));
    }

    public function show(Document $document)
    {
        return view('documents.show', compact('document'));
    }
}
