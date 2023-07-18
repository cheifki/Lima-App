<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Http\Controllers\Controller;
use App\Notifications\TractorBookingNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;


use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{

    





    public function accept(Booking $booking)
    {
        // Accept the booking logic here
        $booking->status = 'accepted';
        $booking->save();

        // Send a notification or perform any other actions
        // Send a notification
    $bookingData = [
        'booking_id' => $booking->id,
        'user' => $booking->user,
    ];

    $user = $booking->user;
    Notification::send($user, new TractorBookingNotification($bookingData));

        return redirect()->route('home')->with('success', 'Booking accepted successfully!');
    }

    public function reject(Booking $booking)
    {
        // Reject the booking logic here
        $booking->status = 'rejected';
        $booking->save();

        // Send a notification or perform any other actions

        // Send a notification
    $bookingData = [
        'booking_id' => $booking->id,
        'user' => $booking->user,
    ];
    $user = $booking->user;
    Notification::send($user, new TractorBookingNotification($bookingData));



        return redirect()->route('home')->with('success', 'Booking rejected successfully!');
    }
}
