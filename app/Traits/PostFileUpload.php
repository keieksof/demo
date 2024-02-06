<?php

namespace App\Traits;

trait PostFileUpload
    /*
     * 1.
     *
     *
     *
     *
     *
     *
     *
     * */


{
    public function uploadFile($request, $attribute, $path, $column)
    {   //shikon nese request ka nje file me attribute e caktuar
        if ($request->hasFile($attribute)) {

            //Nese eshte true fut store filen e ri
            return $request->file($attribute)->store($path);
        }

        //Nese jo return filen e vjeter
        return $this->$column;


    }

}
