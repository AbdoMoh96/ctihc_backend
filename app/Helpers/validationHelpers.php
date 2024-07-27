<?php


function isLanguageSupported($language){
   return in_array($language, config('app.locales')) ? true : false;
}
/*
        if(!isLanguageSupported($request->header('Accept-Language'))){
            return response()->json("Language Not supported", 400);
        }
 */
