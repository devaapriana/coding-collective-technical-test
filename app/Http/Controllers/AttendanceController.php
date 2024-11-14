<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{

    public function index()
    {
        $attendances = Attendance::with('employee')->where('employee_id', Auth::user()->employee->id)->orderBy('id', 'asc')->get();
        return view('attendance', compact('attendances'));
    }

    public function active(Request $request)
    {
        Attendance::create([
            'employee_id' => $request->user()->employee->id,
            'time' => Carbon::now()->setTimezone($request->userTimezone),
            'status' => 'active'
        ]);

        return redirect()->back()->with(['message' => 'Employee actived successfully']);
    }
    public function inactive(Request $request)
    {
        Attendance::create([
            'employee_id' => $request->user()->employee->id,
            'time' => Carbon::now()->setTimezone($request->userTimezone),
            'status' => 'inactive'
        ]);

        return redirect()->back()->with(['message' => 'Employee inactive successfully']);
    }

    public function update(Request $request, Attendance $attendance)
    {
        $status = $request->input('status') == 'active' ? 'inactive' : 'active';
        $attendance->update(['status' => $status, 'time' => Carbon::now()->setTimezone($request->userTimezone)]);
        return response()->json(['message' => 'Status update successfully']);
    }

    public function reports()
    {
        $attendances = Attendance::with('employee')->orderBy('created_at')->paginate(5);
        return view('report', compact('attendances'));
    }
}
