<?php

namespace App\Classes;

use Image;
use Illuminate\Support\Str;

class ImageUpload
{

    private $origin;
    private $image;

    private $types = [
        'avatar' => [300,300],
        'banner_desk' => [1920],
        'banner_mobile' => [720],
        'foto_assessor' => [300, 300],
    ];

    public function __construct($origin){
        $this->origin = $origin;
        $this->image = Image::make($origin)->encode("webp");
    }

    // MAKE FUNCTIONS
    public function makeAvatar(){
        $this->resizeWithAspectRatio($this->types["avatar"][0], $this->types["avatar"][1]);
        $this->crop($this->types["avatar"][0], $this->types["avatar"][1]);
    }

    public function makeBannerDesk(){
        $this->resizeWidthWithAspectRatio($this->types["banner_desk"][0]);
    }

    public function makeBannerMobile(){
        $this->resizeWidthWithAspectRatio($this->types["banner_mobile"][0]);
    }

    public function makeThumbnail(){
        $this->resizeWithAspectRatio($this->types["thumbail"][0], $this->types["thumbail"][1]);
        $this->crop($this->types["thumbnail"][0], $this->types["thumbnail"][1]);
    }

    // SAVE FUNCTION
    public function save($path){
        if($this->image){
            $fileName = Str::random(20) . ".webp";
            $this->image->save($path . "/" . $fileName);
            return $path . "/" . $fileName;
        }
    }

    // FILTER FUNCTIONS
    public function blur($quantidade) :void{
        if($this->image){
            $this->image->blur($quantidade);
        }
    }

    public function colorFilter($red, $green, $blue) :void{
        if($this->image){
            $this->image->colorize($red, $green, $blue);
        }
    }

    public function resize($width, $height) :void{
        if($this->image){
            $this->image->resize($width, $height);
        }
    }

    public function resizeWidthWithAspectRatio($width) :void{
        if($this->image){
            $this->image->resize($width, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
    }

    // resize the image so that the largest side fits within the limit; the smaller
    // side will be scaled to maintain the original aspect ratio
    public function resizeWithAspectRatio($width, $height) :void{
        if($this->image){
            $this->image->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
    }

    public function crop($width, $height) :void{
        if($this->image){
            $this->image->crop($width, $height);
        }
    }



}
