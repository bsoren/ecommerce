<?php
/**
 * Created by PhpStorm.
 * User: bsoren
 * Date: 17-Mar-18
 * Time: 5:49 PM
 */

namespace App\models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    use SoftDeletes;

    // created_at and updated_at will be automatically populated
    public $timestamps = true;

    // enable us to insert following fields, with creating instance
    protected $fillable = ['name', 'slug'];

    /*
     * New Instance
     * $category = new Category();
     * $category->name = 'Testing';
     * $category->save();
     */

    //soft delete, sets deleted_at
    protected $dates = ['deleted_at'];




}