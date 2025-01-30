<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $reports = [];
        if ($user->role === "admin") {
            $reports = Report::all();
        } else {
            $reports = Report::where("user_id", $user->id)->get();
        }
        return view("dashboard", compact("reports"));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'address' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'payment' => 'required|string|max:255',
            'service_id' => 'required|exists:services,id',
            'photo' => 'image|mimes:png,jpg,gif,jpeg|max:1000',
        ]);

        $data["user_id"] = auth()->id();

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images'), $photoName);
            $data["photo"] = $photoName;
        }

        Report::create($data);

        return redirect()->route('dashboard');
    }

    public function updateStatus(Request $request, Report $report)
    {
        $request->validate([
            'status' => 'required|in:новая,оказана,отменена',
            'deny' => 'nullable|string|max:255',
        ]);

        $report->update([
            'status' => $request->status,
            'deny' => $request->status === 'отменена' ? $request->deny : null,
        ]);
        return redirect()->back()->with('success', 'Статус и причина отказа успешно обновлены.');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
