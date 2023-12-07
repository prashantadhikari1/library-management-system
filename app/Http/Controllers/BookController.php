<?php

namespace App\Http\Controllers;

use App\Book;
use App\Faculty;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $i = 1;
        $books = Book::all();
        return view('backend.pages.book.index', compact('books','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = Faculty::whereStatus(1)->get();
        return view('backend.pages.book.create', compact('faculties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputFields = $request->validate([
            'name' => 'required',
            'faculty_id' => 'required',
            'status' => 'required'
        ],
    [
        'faculty_id.required' => 'The faculty field is required'
    ]);
        $faculty_ids = $inputFields['faculty_id'];
        for ($i=0; count($faculty_ids) > $i; $i++) { 
            $book = new Book();
            $book->name = $request->input('name');
            $book->faculty_id = $faculty_ids[$i];
            // $book->faculty_id = $request->input('faculty_id');
            $book->status = $request->input('status');
    
            if($request->hasFile('pdf'))
            {
                $pdf = time().'.'.$request->file('pdf')->getClientOriginalExtension();
                $request->pdf->move('public/book',$pdf);
                $book->pdf = $pdf;
            }
            else{
                $book->pdf = "";
            }
            $book->save();
        }
        return redirect('book');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $faculties = Faculty::whereStatus(1)->get();
        return view('backend.pages.book.edit', compact('book','faculties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $inputFields = $request->validate([
            'name' => 'required',
            'faculty_id' => 'required'
        ]);
       
        $book->name = $request->input('name');
        $book->faculty_id = $request->input('faculty_id');

        if($request->hasFile('pdf'))
        {
            $pdf = time().'.'.$request->file('pdf')->getClientOriginalExtension();
            if($book->pdf!="") {
                if(file_exists('public/book/'.$book->pdf)){
                    unlink('public/book/'.$book->pdf);
                }
            }
            $request->pdf->move('public/book',$pdf);
            $book->pdf = $pdf;
        }

        $book->update();
        return redirect('book');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('book');
    }

    public function inactive($id) {
        $status = Book::find($id);
        $status->status = '0';
        $status->save();
        return redirect('book');
    }
    public function active($id) {
        $status = Book::find($id);
        $status->status = '1';
        $status->save();
        return redirect('book');
    }
}
