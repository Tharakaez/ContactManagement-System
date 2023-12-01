<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ContactController extends Controller
{
    //Contact View
    public function ContactPageView()
    {
        try {
            $data = Contact::join('categories', 'categories.id', '=', 'contacts.categoryId')
                ->select('contacts.*', 'categories.name as categoryName')
                ->where('contacts.isActive', 1)
                ->orderBy('contacts.id', 'asc')
                ->get();

            $categories = Category::where('isActive', '=', '1')
                ->get();

            return view('pages.contactView', compact('data', 'categories'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['An error occurred']);
        }
    }

    // Add Contact
    public function AddContact(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1020', // image validation rules
        ]);


        try {
            // Check if an image was uploaded and handle it
            if ($request->hasFile('image')) {

                $image = uniqid() . '-' . $request->file('image')->getClientOriginalName();
                $imagePath = $request->image->move(public_path('adminImages/contactImage/'), $image);
            } else {
                // If no image is uploaded, set a default image path
                $image = 'default.png';
            }

            // Create a new slider with the provided data
            $newContact = new Contact;
            $newContact->name = $request->name;
            $newContact->designation = $request->designation;
            $newContact->phone = $request->phone;
            $newContact->email = $request->email;
            $newContact->location = $request->location;
            $newContact->image = $image;
            $newContact->note = $request->note;
            $newContact->categoryId = $request->categoryId;

            $newContact->save();

            // Assuming you want to redirect to a specific route after adding the slider
            return redirect()->back()->with('message', 'Contact added successfully');
        } catch (Exception $e) {
            // Handle any exceptions that might occur during the process
            return redirect()->back()->withErrors(['An error occurred']);
        }
    }

    // Edit Contact
    public function EditContact(Request $request)
    {
        try {
            // Check if an image was uploaded and handle it
            if ($request->hasFile('imageEdit')) {
                $request->validate([
                    'imageEdit' => 'image|mimes:jpeg,png,jpg,gif|max:1020', // image validation rules
                ]);

                $image = uniqid() . '-' . $request->file('imageEdit')->getClientOriginalName();
                $imagePath = $request->imageEdit->move(public_path('adminImages/contactImage/'), $image);

                // Delete old image if it's not the default one
                $oldImage = $request->imageOld;
                if ($oldImage != 'default.png') {
                    File::delete(public_path('adminImages/contactImage/' . $oldImage));
                }
            } else {
                $image = $request->imageOld;
            }

            // Update the existing slider with the provided data
            Contact::where('id', $request->id)->update([
                'name' => $request->name,
                'designation' => $request->designation,
                'phone' => $request->phone,
                'email' => $request->email,
                'location' => $request->location,
                'image' => $image,
                'note' => $request->note,
                'categoryId' => $request->categoryId,
            ]);

            // Success message if the slider is edited successfully
            return redirect()->back()->with('message', 'Place Card Edited Successfully');
        } catch (\Illuminate\Validation\ValidationException $exception) {
            // Return to the form with validation errors if image validation fails
            return redirect()->back()->withErrors($exception->errors());
        } catch (\Exception $e) {
            // Handle any other exceptions that might occur during the process
            return redirect()->back()->withErrors(['An error occurred']);
        }
    }

    // Delete Contact
    public function DeleteContact(Request $request)
    {
        $id = $request->id;
        try {
            Contact::where(['id' => $id])->update([
                'isActive' => 0,
            ]);

            return redirect()->back()->with('message', 'Contact Deleted Successfully!');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['An error occurred']);
        }
    }

    // Favorite Contact
    public function FavoriteContact($id)
    {
        try {
            Contact::where(['id' => $id])->update([
                'isFavorite' => 1,
            ]);

            return redirect()->back()->with('message', 'Contact Added to Favorite Successfully!');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['An error occurred']);
        }
    }

    // Unfavorite Contact
    public function UnfavoriteContact($id)
    {
        try {
            Contact::where(['id' => $id])->update([
                'isFavorite' => 0,
            ]);

            return redirect()->back()->with('message', 'Contact Removed from Favorite Successfully!');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['An error occurred']);
        }
    }

    //favorite view
    public function FavoritePageView()
    {
        try {
            $data = Contact::join('categories', 'categories.id', '=', 'contacts.categoryId')
                ->select('contacts.*', 'categories.name as categoryName')
                ->where('contacts.isFavorite', 1)
                ->orderBy('contacts.id', 'asc')
                ->get();

            $categories = Category::where('isActive', '=', '1')
                ->get();

            return view('pages.favView', compact('data', 'categories'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['An error occurred']);
        }
    }





}