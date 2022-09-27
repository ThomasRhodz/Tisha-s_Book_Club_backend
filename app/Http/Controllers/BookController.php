<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Category;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = QueryBuilder::for(Book::class)
        ->allowedFilters([
            'BookTitle',
            'BookISBN',
            'BookAuthor',
            'BookPublicationYear',
            'BookPublisher',
            'CategoryID'
        ])
        ->defaultSort('-BookID')
        ->allowedSorts('BookID', 'BookPublicationYear')
        ->with('category')
        ->get();

        return $this->sendResponse($books->toArray());
    }

    public function getExactBook()
    {
        $books = QueryBuilder::for(Book::class)
        ->allowedFilters([AllowedFilter::exact('BookTitle')])
        ->get();

        return $this->sendResponse($books->toArray());
    }

    public function getExactBookISBN()
    {
        $books = QueryBuilder::for(Book::class)
        ->allowedFilters([AllowedFilter::exact('BookISBN')])
        ->get();

        return $this->sendResponse($books->toArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $category = Category::find($request->get('CategoryID'));
        $validated = $request->validated();
        $book = Book::make($validated);
        $category->books()->save($book);

        $book->refresh()->load('category');

        return $this->sendResponse($book->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return $this->sendResponse($book->toArray());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $category = Category::find($request->get('CategoryID'));
        $validated = $request->validated();
        // return $this->sendResponse([
        //     'category' => $category,
        //     'validated' => $validated
        // ]);
        $book->update($validated);

        $book->category()->associate($category)->save();

        return $this->sendResponse($book->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return $this->sendResponse($book->toArray());
    }

    public function getLastBook()
    {
        $book = Book::query()->latest('BookID')->first();
        return $this->sendResponse($book->toArray());
    }
}
