<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
{
    try {
        // All Contacts count (Saved)
        $allContactsCount = Contact::where('isActive', 1)->count();

        // Today's Saved contacts count
        $todaySavedContactsCount = Contact::where('isActive', 1)
            ->whereDate('created_at', now()->toDateString())
            ->count();

        // This Month's Saved contacts count
        $thisMonthSavedContactsCount = Contact::where('isActive', 1)
            ->whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->count();

        $recentContacts = Contact::join('categories', 'categories.id', '=', 'contacts.categoryId')
            ->select('contacts.*', 'categories.name as categoryName')
            ->where('contacts.isActive', 1)
            ->orderBy('contacts.created_at', 'desc')
            ->take(5)
            ->get();

        $categories = Category::where('isActive', '=', '1')->get();

        return view('pages.home', compact('recentContacts', 'categories', 'allContactsCount', 'todaySavedContactsCount', 'thisMonthSavedContactsCount'));
    } catch (Exception $e) {
        return redirect()->back()->withErrors(['An error occurred']);
    }
}

}
