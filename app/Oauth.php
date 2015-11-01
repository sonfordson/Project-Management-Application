<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Oauth extends Model 
{
  

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'oauth_identities';


    public function user()
    
       {
        
        return $this->belongsTo('App\User','user_id');

       }

    

}
