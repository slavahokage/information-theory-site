<?php

namespace Tests\Feature;

use App\Service\RailFence;
use Tests\TestCase;

class RailFenceCipherTest extends TestCase
{
    public function testEncryptOnSimpleString()
    {
        $railFence = new RailFence(3, 'geeksforgeeksq');
        $encryptText = $railFence->encrypt();
        
        $this->assertEquals('gsgsekfrekqeoe', $encryptText);
    }

    public function testDecryptOnSimpleString()
    {
        $railFence = new RailFence(3, 'gsgsekfrekqeoe');
        $encryptText = $railFence->decrypt();

        $this->assertEquals('geeksforgeeksq', $encryptText);
    }

    public function testEncryptOnLongString()
    {
        $railFence = new RailFence(3, 'geeksforgeeksqwertyuiopasdfghjklzxcvbnm');
        $encryptText = $railFence->encrypt();

        $this->assertEquals('gsgsrishzbekfrekqetuoadgjlxvneoewypfkcm', $encryptText);
    }

    public function testDecryptOnLongString()
    {
        $railFence = new RailFence(3, 'gsgsrishzbekfrekqetuoadgjlxvneoewypfkcm');
        $encryptText = $railFence->decrypt();

        $this->assertEquals('geeksforgeeksqwertyuiopasdfghjklzxcvbnm', $encryptText);
    }

    public function testEncryptWithTwoKey()
    {
        $railFence = new RailFence(2, 'memory');
        $encryptText = $railFence->encrypt();

        $this->assertEquals('mmreoy', $encryptText);
    }

    public function testEncryptWithOneKey()
    {
        $this->expectException(\Exception::class);

        $railFence = new RailFence(1, 'memory');
    }

    public function testEncryptWithNegativeKey()
    {
        $this->expectException(\Exception::class);

        $railFence = new RailFence(-1, 'memory');
    }

    public function testEncryptWithHugeKey()
    {
        $railFence = new RailFence(50, 'jfgjfbhgbhdfbghjdjkfghjkdhfgkhfdkghdkfghkjdhfgjdhfjg');
        $encryptText = $railFence->encrypt();

        $this->assertEquals('jfgjfbhgbhdfbghjdjkfghjkdhfgkhfdkghdkfghkjdhfgjdghjf', $encryptText);
    }

    public function testDecryptWithTwoKey()
    {
        $railFence = new RailFence(2, 'gesogeswrysqetekfrekqetadwry');
        $encryptText = $railFence->decrypt();

        $this->assertEquals('geeksforgeeksqwertyasdqwerty', $encryptText);
    }

    public function testDecryptWithFourKey()
    {
        $railFence = new RailFence(4, 'gosefrkqesgeke');
        $encryptText = $railFence->decrypt();

        $this->assertEquals('geeksforgeeksq', $encryptText);
    }

    public function testWithFiveKey()
    {
        $railFence = new RailFence(5, 'ggereeoekfkss');
        $encryptText = $railFence->decrypt();

        $this->assertEquals('geeksforgeeks', $encryptText);
    }

    public function testDecryptWithHugeKey()
    {
        $railFence = new RailFence(50, 'jfgjfbhgbhdfbghjdjkfghjkdhfgkhfdkghdkfghkjdhfgjdghjf');
        $encryptText = $railFence->decrypt();

        $this->assertEquals('jfgjfbhgbhdfbghjdjkfghjkdhfgkhfdkghdkfghkjdhfgjdhfjg', $encryptText);
    }

    public function testEncryptWithTwentyFiveKey()
    {
        $railFence = new RailFence(25, 'qwesjdfbjkdbfjsbdjfbdskjbfjkdsbfjksdbjfbsdkjfbdskfbkjsdbfkjsdbkjfsdkfbsdkjfbjksdbfksdbfbdskfbksdfbj');
        $encryptText = $railFence->encrypt();

        $this->assertEquals('qkfwsfdbedbsjsbkkjfjbdjsffkdkbdbsjsfdkbkbdfjfbjsbfbddjdbssskkbkjfdjfbjfsdfbdsbskkddfjskbbkjsfjfdjbk', $encryptText);
    }

    public function testDecryptWithTwentyFiveKey()
    {
        $railFence = new RailFence(25, 'qkfwsfdbedbsjsbkkjfjbdjsffkdkbdbsjsfdkbkbdfjfbjsbfbddjdbssskkbkjfdjfbjfsdfbdsbskkddfjskbbkjsfjfdjbk');
        $encryptText = $railFence->decrypt();

        $this->assertEquals('qwesjdfbjkdbfjsbdjfbdskjbfjkdsbfjksdbjfbsdkjfbdskfbkjsdbfkjsdbkjfsdkfbsdkjfbjksdbfksdbfbdskfbksdfbj', $encryptText);
    }

    public function testEncryptWithRussianLetters()
    {
        $railFence = new RailFence(3, 'ффффqwertyффф');
        $encryptText = $railFence->encrypt();

        $this->assertEquals('ффффqtwryeффф', $encryptText);
    }

    public function testEncryptWithRussianLettersInDifferentPartOfString()
    {
        $railFence = new RailFence(3, 'ффффqweццццrtyффф');
        $encryptText = $railFence->encrypt();

        $this->assertEquals('ффффqtwццццryeффф', $encryptText);
    }
}