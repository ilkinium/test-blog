<?php

namespace App\Enums;

enum HttpMethod: string
{
    case Head = 'head';
    case Get = 'get';
    case Post = 'post';
    case Put = 'put';
    case Patch = 'patch';
    case Delete = 'delete';
}
