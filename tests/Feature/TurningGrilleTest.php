<?php

namespace Tests\Feature;

use App\Service\TurningGrille;
use Tests\TestCase;


class TurningGrilleTest extends TestCase
{
    public function testEncryptOnSimpleString()
    {
        $turningGrille = new TurningGrille('SHIFROTEXT');
        $encryptText = $turningGrille->encrypt();

        $this->assertEquals('SCXROTDHATIEFFEB', $encryptText);
    }

    public function testDecryptOnSimpleString()
    {
        $turningGrille = new TurningGrille('SCXROTDHATIEFFEB');
        $encryptText = $turningGrille->decrypt();

        $this->assertEquals('SHIFROTEXTABCDEF', $encryptText);
    }

    public function testEncryptOnShortStringInLowerCase()
    {
        $turningGrille = new TurningGrille('slava');
        $encryptText = $turningGrille->encrypt();

        $this->assertEquals('SHDAAEILFBAJKVCG', $encryptText);
    }

    public function testDecryptOnShortStringInLowerCase()
    {
        $turningGrille = new TurningGrille('SHDAAEILFBAJKVCG');
        $encryptText = $turningGrille->decrypt();

        $this->assertEquals('SLAVAABCDEFGHIJK', $encryptText);
    }

    public function testEncryptOnSimpleStringWithRussianLetters()
    {
        $turningGrille = new TurningGrille('ваываываывSHIFROвыаывTEXTывавыа');
        $encryptText = $turningGrille->encrypt();

        $this->assertEquals('SCXROTDHATIEFFEB', $encryptText);
    }

    public function testDecryptOnSimpleStringWithRussianLetters()
    {
        $turningGrille = new TurningGrille('выавыавыаSCXROTD    HATIEFFEBавыаывавыаыва');
        $encryptText = $turningGrille->decrypt();

        $this->assertEquals('SHIFROTEXTABCDEF', $encryptText);
    }
}