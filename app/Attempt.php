<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attempt extends Model {
  // Attempt = Intento

  public $fillable = [
    'id_facebook', 'name_facebook', 'words_count', 'point',
  ];

  protected $hidden = ['created_at', 'updated_at'];

}
