<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index()
    {
        $announcement_to_check=Announcement::where('is_accepted', null)->first();
        return view('revisor.index', compact('announcement_to_check'));
    }

    public function acceptAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(true);
        return redirect()->back()->with('message','Annuncio accettato con successo');
    }

    public function rejectAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(false);
        return redirect()->back()->with('message','Annuncio rifiutato');
    }

        public function undoRev(Announcement $announcement)
    {
        $announcement = Announcement::orderBy('created_at','DESC')->whereNotNull('is_accepted')->first();
        $announcement->setAccepted(null);
        return redirect()->back()->with('message', 'Revisione annullata');
    }
    public function becomeRevisor()
    {
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->back()->with('message', 'Richiesta avvenuta con successo');
    }
    public function makeRevisor(User $user)
    {
        Artisan::call('presto:makeUserRevisor', ["email"=>$user->email]);
        return redirect('/')->with('message', 'L\' utente è diventato revisore');
        
    }

}
