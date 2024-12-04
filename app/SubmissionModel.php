<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubmissionModel extends Model
{

        // Nonaktifkan timestamp
        public $timestamps = false;

        protected $fillable = ['name', 'email', 'message'];
    
}
