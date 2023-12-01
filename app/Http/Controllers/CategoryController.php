<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    //Category management
    // View Categories Section Page
    public function CategoryPageView()
    {
        try {
            // Retrieve main slider data directly from the database
            $data = Category::where('isActive', '=', '1')
                ->get();

            return view('pages.categoryView', compact('data'));
            // Assuming 'admin.pageManagement.editMainSliderPage' is the view to which you want to pass this data
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['An error occurred']);
        }
    }

    // Add Categories Section
    public function AddCategory(Request $request)
    {

        try {
            // Create a new slider with the provided data
            $newCat = new Category;
            $newCat->name = $request->name;
            $newCat->note = $request->note;
            $newCat->save();

            // Assuming you want to redirect to a specific route after adding the slider
            return redirect()->back()->with('message', 'Category Added Successfully');
        } catch (Exception $e) {
            // Handle any exceptions that might occur during the process
            return redirect()->back()->withErrors(['An error occurred']);
        }
    }

    // Edit Categories Section
    public function EditCategory(Request $request)
    {
        try {

            Category::where('id', $request->id)->update([
                'name' => $request->name,
                'note' => $request->note,
            ]);

            // Success message if the slider is edited successfully
            return redirect()->back()->with('message', 'Category Edited Successfully');
        } catch (\Illuminate\Validation\ValidationException $exception) {
            // Return to the form with validation errors if image validation fails
            return redirect()->back()->withErrors($exception->errors());
        } catch (\Exception $e) {
            // Handle any other exceptions that might occur during the process
            return redirect()->back()->withErrors(['An error occurred']);
        }
    }

    // Delete Categories Section
    public function DeleteCategory(Request $request)
    {
        $id = $request->id;
        try {
            Category::where(['id' => $id])->update([
                'isActive' => 0,
            ]);

            return redirect()->back()->with('message', 'Category Deleted Successfully!');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['An error occurred']);
        }
    }
}
