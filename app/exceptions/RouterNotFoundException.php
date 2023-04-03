<?php

namespace exceptions;

class RouterNotFoundException extends \Exception
{
    protected $message = "Router Not Found";
}