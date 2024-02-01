<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function create(){

        return view('announcements.create');
    }

    public function showAnnouncements(Announcement $announcement)
    {
        return view('announcements.show', compact('announcement'));
    }

    public function indexAnnouncements()
    {
        $announcements = Announcement::where('is_accepted', true)->orderBy('created_at', 'DESC')->paginate(6);
        return view('announcements.index', compact('announcements'));
        // dd($announcements)
    }


}
