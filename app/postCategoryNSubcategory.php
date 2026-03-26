<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class postCategoryNSubcategory extends Model
{
    protected $table = "news_category_n_sub_categories";
    protected $fillable = ['news_id', 'category_id', 'sub_category_id'];
}
 