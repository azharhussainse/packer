<?php

namespace App\Models;

use App\Models\Traits\Attributes\BlogAttributes;
use App\Models\Traits\ModelAttributes;
use App\Models\Traits\Relationships\BlogRelationships;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends BaseModel
{
    use ModelAttributes, SoftDeletes, BlogAttributes, BlogRelationships;

    /**
     * Fillable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'publish_datetime',
        'content',
        'source',
        // 'political_spectrum',
        'meta_title',
        'cannonical_link',
        'meta_keywords',
        'meta_description',
        'status',
        'featured_image',
        'created_by',
        'updated_by',
    ];

    /**
     * Dates.
     *
     * @var array
     */
    protected $dates = [
        'publish_datetime',
        'created_at',
        'updated_at',
    ];

    /**
     * Statuses.
     *
     * @var array
     */
    protected $statuses = [
        0 => 'InActive',
        1 => 'Published',
        2 => 'Draft',
        3 => 'Scheduled',
    ];

    /**
     * Appends.
     *
     * @var array
     */
    protected $appends = [
        'display_status',
    ];

    public function getImage(){
        if(!empty($this->featured_image)){
            return asset('public/images/'.$this->featured_image);
        }else{
            return asset('public/images/default-blog.jpg');
        }
    }

    public function excerpt(){
        return \Str::words(strip_tags($this->content), 10, ' ...');
    }

    public function Card(){
        $card = '<div class="card" style="width: 18rem;">
        <img src="'.$this->getImage().'" class="card-img-top" alt="'.$this->name.'">
        <div class="card-body">
          <h5 class="card-title"><a href="'.url("blog/".$this->slug).'">'.$this->name.'</a></h5>
          <p class="card-text">'.$this->excerpt().'</p>
        </div>
      </div>';
      return $card;
    }

    public function day(){
        return date("d",strtotime($this->created_at));
    }

    public function month(){
        return date("M",strtotime($this->created_at));
    }
}
