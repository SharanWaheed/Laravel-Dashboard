<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    public function markAttendance(Request $request)
    {
        $user = Auth::user();

        // Check if the user has already marked attendance for the current date
        $today = Carbon::today();
        $attendance = $user->attendance()->where('attendance_date', $today)->first();

        if ($attendance) {
            return redirect()->back()->with('error', 'You have already marked attendance for today.');
        }

        // If attendance not marked yet, add the attendance record
        $attendance = new Attendance();
        $attendance->user_id = $user->id;
        $attendance->attendance_date = $today;
        $attendance->status = true; // Assuming the user is marked as present by clicking the button
        $attendance->save();

        return redirect()->back()->with('success', 'Attendance marked successfully.');
    }
}
