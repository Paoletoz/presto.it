<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Spatie\Image\Image as SpatieImage;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ResizeImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $fileName;
    private $path;
    private $w;
    private $h;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($filePath, $w, $h)
    {
        $this->path=dirname($filePath);
        $this->fileName=basename($filePath);
        $this->w=$w;
        $this->h=$h;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $w=$this->w;
        $h=$this->h;
        $srcPath=storage_path(). '/app/public/' . $this->path . '/' . $this->fileName;
        $destPath=storage_path(). '/app/public/' . $this->path . "/crop_{$w}x{$h}_" . $this->fileName;

        $croppedImage = Image::load($srcPath)
            ->crop(Manipulations::CROP_CENTER,$w,$h)
            ->watermark(base_path('resources/media/Presto-logo.png'))
            ->watermarkPosition(Manipulations::POSITION_TOP_LEFT)
            ->watermarkWidth(50, Manipulations::UNIT_PIXELS)
            ->watermarkHeight(50, Manipulations::UNIT_PIXELS)
            ->watermarkOpacity(35)
            ->save($destPath);
    }
}
