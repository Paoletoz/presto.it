<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home() {

        $announcements = Announcement::where('is_accepted', true)->orderBy('created_at', 'DESC')->paginate(6);
        return view('welcome', compact('announcements'));
        }

        public function categoryShow(Category $category)
        {
            return view('categoryShow', compact('category'));
        }
        public function searchAnnouncements(Request $request)
        {
            $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(6);
            return view('announcements.index', compact('announcements'));
        }
        public function workWithUs(){
            return view('workWithUs');
        }

        public function setLanguage($lang)
        {
            session()->put('locale',$lang);
            return redirect()->back();  
        }
    }

