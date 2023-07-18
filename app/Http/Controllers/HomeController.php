<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Notifications\TractorBookingNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\Booking;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;

            if ($usertype=='user') {
                $product=Product::all();
                return view('dashboard',compact('product'));
            } 
            elseif ($usertype=='admin')
             {
                return view('admin.adminhome');
            }
            elseif ($usertype=='seller')
             {
                return view('seller.sellerhome');
            }
        }

        // If the user is not authenticated or the usertype is not recognized, you can redirect them to a default page or display an error message.
        // For example:
        return redirect()->route('login')->with('error', 'Invalid user or usertype');
    }


    /**
     * Add to cart
     */
    public function addToCart($id,Request $request)
    {
        // Retrieve the authenticated user
    $user = Auth::user();

    // Create a new booking record
    $booking = new Booking();
    $booking->user_id = $user->id;
    $booking->product_id = $id;
    $booking->date = $request->input('date');
    $booking->time = $request->input('time');
    $booking->location = $request->input('location');
    $booking->instructions = $request->input('instructions');
    $booking->save();





        // Send notification to admin
    $usertype = User::where('usertype', 'admin')->first();
    $bookingData = [
         // Replace with your tractor data
         'booking_id' => $id,
        'user' => auth()->user(), // Assuming the user is authenticated
    ];
    Notification::send($usertype, new TractorBookingNotification($bookingData));
        return redirect()->back()->with('success','Tractor booked  successfully!');
    }  



    
}   