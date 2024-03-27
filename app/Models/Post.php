<?php

namespace App\Models;

use App\Models\Traits\Attributes\PostAttributes;
use App\Models\Traits\ModelAttributes;
use App\Models\Traits\Relationships\PostRelationships;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Image;

class Post extends BaseModel
{
    use SoftDeletes, ModelAttributes, PostRelationships, PostAttributes;

    protected $table = 'requests';

    /**
     * The guarded field which are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Fillable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'requester_id',
        'receiver_id',
        'source',
        'source_city',
        'destination',
        'destination_city',
        'product_link',
        'details',
        'type',
        'created_by',
    ];

    public function attributes()
    {
        return [
            'source' => 'Travel From Country',
            'source_city' => 'Travel From City',
            'destination' => 'Travel To Country',
            'destination_city' => 'Travel To City',
        ];
    }

    public function day(){
        return date("d",strtotime($this->created_at));
    }

    public function month(){
        return date("M",strtotime($this->created_at));
    }

    public function excerpt(){
        return \Str::words(strip_tags($this->details), 10, ' ...');
    }

    public function country($id){
        $country = \DB::table('countries')->select('id','name')->where('id',$id)->first();
        return $country->name;
    }
    public function city($id){
        $city = \DB::table('cities')->select('id','name')->where('id',$id)->first();
        if(!empty($city))
        return $city->name;
        else
        return '';
    }

    public function getCompletedOffer(){
        $offer = \DB::table('offers')->where('request_id',$this->id)->where('status','completed')->first();
        if(empty($offer))
        return false;
        else
        return true;
    }

    public function alreadyPostOffer(){
        if (\Auth::check()) {
            $offer = \DB::table('offers')->where('request_id',$this->id)->where('offer_by',\Auth::user()->id)->first();
            if(empty($offer))
            return false;
            else
            return true;
        }else{
            return false;
        }
        
    }

    public function getRelatedServices(){
        $related = self::where('source',$this->source)->where('destination',$this->destination)->limit(5)->latest()->get();
        ob_start();
        foreach($related as $post):
        ?>
            <!-- Item -->
            <div class="offer-item item ez-animate col-sm-12 col-md-6 animated fadeInUp " data-animation="fadeInUp" style="animation-delay: 0s; opacity: 1;">
                <div class="shadow border p-3 w-100 h-100">
                    <span class="badge badge-success text-capitalize"><?=$post->type?></span>
                    <a href="{{route('frontend.requests.show',$post->slug)}}" class="bghoverscheme">
                        <h3 class="clscheme"><?=$post->title?></h3>
                        <small class="text-muted"><?=$post->created_at->diffForHumans()?> | Created By: <?=$post->owner->first_name?>
                        Source: <?=$post->city($post->source_city)?>, <?=$post->country($post->source)?> | Destination: <?=$post->city($post->destination_city)?>, <?=$post->country($post->destination)?>
                        <?php
                        if($post->type == 'travel'):?>
                        | Weight Available: <?=$post->weight_available?> | Carrying Rate: <?=$post->carrying_rate?>
                        <?php endif;
                        if($post->type == 'shipping'):?>
                        | Shipping Weight Available: <?=$post->weight_available?> | Upcoming Shipment Date: <?=$post->upcoming_shipping_date?> | Shipping Rate: <?=$post->shipping_rate?>
                        <?php endif;?>
                        </small>
                        <p><?=$post->excerpt()?></p>
                    </a>
                </div>
            </div>
        <?php
        endforeach;

        $html = ob_get_clean();
        return $html;
    }

}
