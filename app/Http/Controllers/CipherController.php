<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class CipherController extends Controller
{
    public abstract function encryptPage();

    public abstract function decryptPage();

    public abstract function getEncryptFile(Request $request);

    public abstract function getDecryptFile(Request $request);
}