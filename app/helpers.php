<?php

use App\Http\ResponseFactory;

function son_response($content = '',$status = 200, array $headers = [])
{
    $factory = new ResponseFactory();

    if(func_num_args() === 0)
    {
        return $factory;
    }
    return $factory->make($content,$status,$headers);
}
