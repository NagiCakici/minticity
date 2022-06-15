<?php

namespace App\Http\Controllers;

use App\Models\Phrase;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class PhrasesController extends Controller
{
    public function index(Request $request)
    {

        $HowmanyPharese = Phrase::count();
        return Inertia::render('EnglishApp/Phrases/Phrases', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'phrases' => Phrase::query()->orderBy('id', 'desc')->when($request->input('search'), function ($query, $search) {
                $query->where('eng', 'like', "%{$search}%")
                      ->orWhere('tr', 'like', "%{$search}%");
            })
                ->paginate(25)->withQueryString()
                ->through(fn ($phrase) => [
                    'id' => $phrase->id,
                    'eng' => $phrase->eng,
                    'tr' => $phrase->tr,
                ]),
            'filters' => $request->input('search'),
            'HowmanyPharese' => $HowmanyPharese,

        ]);
    }

    public function create()
  
    { 
        return Inertia::render('EnglishApp/Phrases/PhrasesCreate');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'eng' => 'required|unique:phrases',
            'tr' => 'required',
        ]);
        phrase::create($data);
        return redirect()->back();
       // return redirect()->route('PhrasesIndex');
    }

    public function destroy($id)
    {
        $delete = DB::table('phrases')
            ->where('id', $id)
            ->delete();
        return redirect()->back();

    }

    public function edit($id)
    {
        $Editphrases = phrase::where('id', $id)->first();
        return Inertia::render('EnglishApp/Phrases/PhrasesEdit', [
            'Editphrases' => $Editphrases
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'eng' => 'required',
            'tr' => 'required',
        ]);

        DB::table('phrases')
            ->where('id',$request->id)
            ->update($data);
        return redirect()->route('PhrasesIndex');
    }

}
