<?php

namespace App\Http\Controllers;


use App\Service\TurningGrille;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TurningGrilleController extends Controller
{
    public function encryptPage()
    {
        return view('transposition-ciphers/turning-grille/encrypt-page');
    }

    public function decryptPage()
    {
        return view('transposition-ciphers/turning-grille/decrypt-page');
    }

    public function getEncryptFile(Request $request)
    {
        $file = $request->file('file');

        $turningGrille = app()->makeWith(TurningGrille::class, [File::get($file->getRealPath())]);

        $encryptText = $turningGrille->encrypt();

        return response()->streamDownload(function () use ($encryptText) {
            echo $encryptText;
        }, 'encrypt_by_turning_grille_file.txt');
    }

    public function getDecryptFile(Request $request)
    {
        $file = $request->file('file');

        $turningGrille = app()->makeWith(TurningGrille::class, [File::get($file->getRealPath())]);

        $encryptText = $turningGrille->decrypt();

        return response()->streamDownload(function () use ($encryptText) {
            echo $encryptText;
        }, 'decrypt_by_rail_fence_file.txt');
    }
}