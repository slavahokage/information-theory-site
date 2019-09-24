<?php

namespace App\Service;

interface Cipher
{
    public function encrypt();

    public function decrypt();
}
