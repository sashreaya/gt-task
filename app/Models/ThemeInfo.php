<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThemeInfo extends Model
{
    use HasFactory;

    
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'theme_infos';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'theme',
        'description',
        'user_id'
    ];


    public function themeImage()
    {
       return $this->hasOne('App\Models\ThemeImages','theme_info_id','id')->orderBy('id','desc');
    }
}
