<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagePosition extends Model
{
    protected $fillable = ['product_id','top_left_x', 'top_left_y','bottom_right_x','bottom_right_y', 'crop_width', 'crop_height', 'img_width', 'img_height'];
}
