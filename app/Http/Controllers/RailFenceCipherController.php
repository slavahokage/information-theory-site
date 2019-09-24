<?php

namespace App\Http\Controllers;

use App\Http\Requests\RailFenceCipherRequest;
use App\Service\RailFence;
use Illuminate\Support\Facades\File;

class RailFenceCipherController extends Controller
{
    public function encryptPage()
    {
        return view('transposition-ciphers/rail-fence/encrypt-page');
    }

    public function decryptPage()
    {
        return view('transposition-ciphers/rail-fence/decrypt-page');
    }

    public function getEncryptFile(RailFenceCipherRequest $request)
    {
        $file = $request->file('file');

        $railFence = app()->makeWith(RailFence::class, [$request->input('key'), File::get($file->getRealPath())]);

        $encryptText = $railFence->encrypt();

        return response()->streamDownload(function () use ($encryptText) {
            echo $encryptText;
        }, 'encrypt_by_rail_fence_file.txt');
    }

    public function getDecryptFile(RailFenceCipherRequest $request)
    {
        $file = $request->file('file');

        $railFence = app()->makeWith(RailFence::class, [$request->input('key'), File::get($file->getRealPath())]);

        $encryptText = $railFence->decrypt();

        return response()->streamDownload(function () use ($encryptText) {
            echo $encryptText;
        }, 'decrypt_by_rail_fence_file.txt');
    }
}
