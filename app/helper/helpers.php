<?php

if(!function_exists('count_complete'))
{
    function count_complete()
    {
        return \App\Models\Todo::select('status')->where('status','=',1)->count();
    }
}
if(!function_exists('count_remaining'))
{
    function count_remaining()
    {
        return \App\Models\Todo::select('status')->where('status','=',0)->count();
    }
}
