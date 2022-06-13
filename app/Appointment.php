<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenant;



class Appointment extends Model
{
    use Multitenant;

    public function save(array $options = [])
    {
        // If no author has been assigned, assign the current user's id as the author of the post
        if (!$this->user_id && \Auth::user()) {
            $this->user_id = \Auth::user()->id;
        }

        parent::save();
    }
}
