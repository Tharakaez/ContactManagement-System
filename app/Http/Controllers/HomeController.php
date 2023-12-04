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
            $user = Auth::user();

            // All Contacts count (Saved) for the authenticated user
            $allContactsCount = $user->contacts()->where('isActive', 1)->count();

            // Today's Saved contacts count for the authenticated user
            $todaySavedContactsCount = $user->contacts()
                ->where('isActive', 1)
                ->whereDate('created_at', now()->toDateString())
                ->count();

            // This Month's Saved contacts count for the authenticated user
            $thisMonthSavedContactsCount = $user->contacts()
                ->where('isActive', 1)
                ->whereYear('created_at', now()->year)
                ->whereMonth('created_at', now()->month)
                ->count();

            $recentContacts = $user->contacts()
                ->join('categories', 'categories.id', '=', 'contacts.categoryId')
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
