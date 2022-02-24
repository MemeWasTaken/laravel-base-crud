<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    public function index()
    {
        $comics = Comic::paginate(20);
        $data = [
            'comics' => $comics,
            'title' => 'Comics Home'
        ];

        return view('comics.index', $data);
    }

    public function create()
    {
        return view('comics.create', ['title' => 'Add new comic']);
    }

    public function store(Request $request)
    {
        $dataArray = $request->all();
        $comic = new Comic();
        $comic->title = $dataArray['title'];
        $comic->author = $dataArray['author'];
        $comic->price = $dataArray['price'];
        $comic->genre = $dataArray['genre'];
        $comic->photo = $dataArray['photo'];
        $comic->description = $dataArray['description'];

        $save = $comic->save();

        if (!$save) {
            dd('salvataggio non riuscito');
        }

        return redirect()->route('comics.show', $comic->id);
    }

    public function show(Comic $comic)
    {
        $data = [
            'comic' => $comic,
            'title' => $comic->title
        ];
        return view('comics.show', $data);
    }

    public function edit(Comic $comic)
    {
        return view('comics.edit', ['comic' => $comic]);
    }

    public function update(Request $request, Comic $comic)
    {
        $data = $request->all();
        $updated = $comic->update($data);
        if (!$updated) {
            dd('update non riuscito');
        }

        return redirect()->route('comics.show', $comic->id);
    }

    public function destroy(Comic $comic)
    {
        //
    }
}
