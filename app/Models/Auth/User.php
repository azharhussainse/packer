<?php

namespace App\Models\Auth;

use App\Models\Auth\Traits\Access\UserAccess;
use App\Models\Auth\Traits\Attributes\UserAttributes;
use App\Models\Auth\Traits\Methods\UserMethods;
use App\Models\Auth\Traits\Relationships\UserRelationships;
use App\Models\Auth\Traits\Scopes\UserScopes;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use DGvai\Review\Reviewable;
/**
 * Class User.
 */
class User extends BaseUser
{
    use HasApiTokens, Notifiable, SoftDeletes, UserAttributes, UserScopes, UserAccess, UserRelationships, UserMethods, Reviewable;


    public function userRatingHtml(){
        $html = '<div class="ratings">
        <span class="heading mr-2">User Rating</span>';

        for($i = 1;$i<=5; $i++){
            if($i<=floor($this->rating)){
                $html.='<span class="fa fa-star checked"></span>';
            }else{
                $html.='<span class="fa fa-star"></span>';
            }
        }
        $html.='<p>'.floor($this->rating).' average based on '.$this->reviews()->count().' reviews.</p>
        <hr style="border:3px solid #f1f1f1">

    </div>';
    return $html;
    }
}
