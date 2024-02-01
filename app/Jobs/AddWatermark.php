<?php

namespace App\Jobs;

use App\Models\Image;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Image as SpatieImage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class AddWatermark implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $announcement_image_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($announcement_image_id)
    {
        $this->announcement_image_id=$announcement_image_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $i=Image::find($this->announcement_image_id);
        if(!$i){
            return;
        }
        $srcPath=storage_path('app/public/' . $i->path);
        $image=file_get_contents($srcPath);

        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credentials.json'));
        $image=SpatieImage::load($srcPath);

        //!inserire immagine al posto di nome_file
        $image->watermark(base_path('resources/media/Presto-logo.png'))
            ->watermarkPosition('top-left')
            ->watermarkWidth(50, Manipulations::UNIT_PIXELS)
            ->watermarkHeight(50, Manipulations::UNIT_PIXELS);
        $image->save($srcPath);
    }
}
