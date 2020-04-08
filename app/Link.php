<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    //

    protected $table = "links";

    protected $fillable = [];

    private $length = 10;

    public function generateLink()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $this->length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
