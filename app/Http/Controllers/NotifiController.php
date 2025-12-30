<?php

namespace App\Http\Controllers;

use App\Models\Notifi;
use Illuminate\Http\Request;

class NotifiController extends Controller
{
    public function index()
    {
        $title = 'Notifikasi';
        $notifis = Notifi::latest()->get();

        return view('notifi.index', compact('notifis', 'title'));
    }

    public function read($id)
    {
        $notifi = Notifi::findOrFail($id);
        $notifi->update(['is_read' => true]);

        return back();
    }
}
