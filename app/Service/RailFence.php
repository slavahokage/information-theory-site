<?php

namespace App\Service;

class RailFence implements Cipher
{
    protected $key;

    protected $message;

    protected $matrix = [[]];

    protected const ENGLISH = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',
        'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];

    protected $englishMessage = [];

    protected const UP = 1;

    protected const DOWN = 0;

    protected $currentDirection = self::DOWN;

    public function __construct(int $key, string $message)
    {
        if (!is_int($key)) {
            throw new \Exception('Not integer key');
        }

        if ($key < 2 || $key > 100) {
            throw new \Exception('Not illegal key');
        }

        $this->key = $key;
        $this->message = $message;

        $this->getOnlyEnglishMessage();
    }


    protected function getOnlyEnglishMessage()
    {
        for ($i = 0; $i < strlen($this->message); $i++) {
            if (in_array(strtolower($this->message[$i]), self::ENGLISH)) {
                $this->englishMessage[] = $this->message[$i];
            }
        }
    }

    protected function getOutputMessage($message)
    {
        $wholeMessage = str_split($this->message, 1);
        $message = str_split($message, 1);
        $currentEnglishLetter = 0;

        for ($i = 0; $i < count($wholeMessage); $i++) {
            if (in_array(strtolower($wholeMessage[$i]), self::ENGLISH)) {
                $wholeMessage[$i] = $message[$currentEnglishLetter];
                $currentEnglishLetter++;
            }
        }

        return implode($wholeMessage);
    }

    protected function changeDirection($height)
    {
        if ($height === $this->key - 1 && $this->currentDirection === self::DOWN) {
            $this->currentDirection = self::UP;
        } elseif ($height === 0 && $this->currentDirection === self::UP) {
            $this->currentDirection = self::DOWN;
        }
    }

    protected function changeHeight($height)
    {
        if ($this->currentDirection === self::DOWN) {
            $height++;
        } else {
            $height--;
        }

        return $height;
    }

    public function encrypt()
    {
        $height = 0;
        $width = 0;

        while ($width < count($this->englishMessage)) {
            $this->matrix[$height][$width] = $this->englishMessage[$width];

            $width++;

            $height = $this->changeHeight($height);

            $this->changeDirection($height);
        }

        $encryptText = '';

        for ($i = 0; $i < $this->key; $i++) {
            $encryptText .= implode($this->matrix[$i]);
        }

        return $this->getOutputMessage($encryptText);
    }

    public function decrypt()
    {
        $height = 0;
        $width = 0;

        $currentLetter = 0;
        $neededHeight = 0;

        while ($currentLetter < count($this->englishMessage)) {

            if ($neededHeight === $height) {
                $this->matrix[$height][$width] = $this->englishMessage[$currentLetter];
                $currentLetter++;
            }

            $width++;

            $height = $this->changeHeight($height);

            $this->changeDirection($height);

            if ($width > count($this->englishMessage) - 1) {

                if ($neededHeight !== $this->key - 1) {
                    $neededHeight++;
                    $width = $neededHeight;
                    $height = $neededHeight;
                }

                if ($height === $this->key - 1) {
                    $this->currentDirection = self::UP;
                } else {
                    $this->currentDirection = self::DOWN;
                }
            }
        }

        $decryptText = '';
        $height = 0;
        $this->currentDirection = self::DOWN;
        $currentLetter = 0;

        while ($currentLetter < count($this->englishMessage)) {
            $decryptText .= array_shift($this->matrix[$height]);

            $currentLetter++;

            $height = $this->changeHeight($height);

            $this->changeDirection($height);
        }

        return $this->getOutputMessage($decryptText);
    }
}
