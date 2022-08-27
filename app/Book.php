<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
     protected $fillable = [
        'bid', 'title', 'subtitle','smallThumbnail','thumbnail'
    ]; 

    public function scopeInsertBooks($query,$request)
    {
        foreach($request as $val)
        {
            $title='';$subtitle='';$authors='';$smallThumbnail='';$thumbnail='';
            if(!empty($val->volumeInfo->title)){
                $title=$val->volumeInfo->title;
            }
            if(!empty($val->volumeInfo->subtitle)){
                $subtitle=$val->volumeInfo->subtitle;
            }
            if(!empty($val->volumeInfo->authors[0])){
                $authors=$val->volumeInfo->authors[0];
            }
             if(!empty($val->volumeInfo->imageLinks->smallThumbnail)){
                $smallThumbnail=$val->volumeInfo->imageLinks->smallThumbnail;
            }
            if(!empty($val->volumeInfo->imageLinks->thumbnail)){
                $thumbnail=$val->volumeInfo->imageLinks->thumbnail;
            }
            $checkExist=$query->select('id')->where('bid',$val->id)->first();;
        
            if($checkExist==null)
            {
                $query->insert([
                    'bid'=>$val->id,
                    'title'=>$title,
                    'subtitle'=> $subtitle,
                    'authors'=>$authors,
                    'smallThumbnail'=>$smallThumbnail,
                    'thumbnail'=>$thumbnail
                ]);
            }
            else{
                $query->where('bid',$val->id)->update([
                    'bid'=>$val->id,
                    'title'=>$title,
                    'subtitle'=> $subtitle,
                    'authors'=>$authors,
                    'smallThumbnail'=>$smallThumbnail,
                    'thumbnail'=>$thumbnail
                ]);

            }
             
        }
       
    }
}
