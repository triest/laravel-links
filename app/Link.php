<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    //

    protected $table = "links";

    protected $fillable = [];

    private $length = 6;

    public function generateLink()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $end_loop = false;
        while (!$end_loop) {
            $randomString = '';
            for ($i = 0; $i < $this->length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }

            $linkObject = Link::select(['id', 'original_link', 'original_short'])->where('original_short',
                $randomString)->first();

            if ($linkObject == null) {
                $end_loop = true;
            }
        }
        return $randomString;
    }
}
