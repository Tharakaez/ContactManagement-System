<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //search
    public function search(Request $request)
    {
        $searchTerm = $request->input('searchTxt');

        $contact = Contact::join('categories', 'categories.id', '=', 'contacts.categoryId')
            ->select('categories.name as category_name', 'contacts.*')
            ->where('contacts.isActive', '=', 1)
            ->where('contacts.name', 'LIKE', "%$searchTerm%") // Explicitly specifying the table for title column
            ->orderBy('contacts.id', 'desc')
            ->get();

        $count = $contact->count();

        return view('pages.search', compact('contact', 'count', 'searchTerm'));
    }
}
