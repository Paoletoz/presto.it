<?php

namespace App\Http\Livewire;

use App\Jobs\AddWatermark;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateAnnouncement extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $price;
    public $category;
    public $images=[];
    public $temporary_images;
    public $announcement;


    protected $rules = [
        'title'=>'required|min:3|max:20',
        'description'=>'required|min:10|max:100',
        'price'=>'required|numeric',
        'category'=>'required',
        'images.*'=>'image|max: 1024',
        'temporary_images.*'=>'image|max: 1024',
    ];

    protected $messages = [
        'required'=>'Il campo è richiesto',
        'min'=>'Il campo è troppo corto',
        'numeric'=>'Il campo dev\'essere un numero',
        'temporary_images.*.image'=>'I file devono essere immagini',
        'temporary_images.*.max'=>'Dimensione massima 1 MB',
        'temporary_images.required'=>'L\'immagine è richiesta',
        'images.image'=>'Il file dev\'essere un\'immagine',
        'images.max'=>'L\'immagine deve essere grande massimo 1 MB',
    ];

    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*'=>'image|max:1024'
        ])) {
            foreach($this->temporary_images as $image){
                $this->images[] = $image;
            }
        }
    }
    public function removeImage($key)
    {
        if(in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
        }
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function store()
    {
        $this->validate();
        $category = Category::find($this->category);
        $announcement=$category->announcements()->create([
            'title'=>$this->title,
            'description'=>$this->description,
            'price'=>$this->price,
            'images'=>$this->images,

        ]);

        // dd($announcement);
        if(count($this->images)){
            foreach($this->images as $image){
                // $announcement->images()->create(['path'=>$image->store('images', 'public')]);
                $newFileName="announcements/{$announcement->id}";
                $newImage=$announcement->images()->create(['path'=>$image->store($newFileName, 'public')]);

                RemoveFaces::withChain([

                    new ResizeImage($newImage->path,300,400),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id),
                    ])->dispatch($newImage->id);
                    dispatch(new AddWatermark($newImage->id));
            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));

        }
        Auth::user()->announcements()->save($announcement);
        // $this->announcement->save();

        return redirect(route('homePage'))->with('message', 'Annuncio creato correttamente. Sarà visualizzabile dopo approvazione dei nostri revisori');
    }


    public function render()
    {
        return view('livewire.create-announcement');
    }
}
