<?php

namespace App\Service;

class TurningGrille implements Cipher
{

    protected $matrix = [
        [1, 2, 3, 1],
        [3, 4, 4, 2],
        [2, 4, 4, 3],
        [1, 3, 2, 1],
    ];

    protected $neededCells = [
        [0, 0], [1, 3],
        [2, 2], [3, 1]
    ];

    protected const ENGLISH_ALPHABET = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    protected const ENGLISH = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
        'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

    protected $message;

    protected $englishMessage;

    public function __construct(string $message)
    {
        $this->message = strtoupper($message);

        $this->getOnlyEnglishMessage();
    }

    protected function getOnlyEnglishMessage()
    {
        for ($i = 0; $i < strlen($this->message); $i++) {
            if (in_array(strtoupper($this->message[$i]), self::ENGLISH)) {
                $this->englishMessage .= $this->message[$i];
            }
        }
    }

    public function encrypt()
    {
        $this->englishMessage = $this->englishMessage . self::ENGLISH_ALPHABET;

        $filledMatrix = [];
        $currentLetter = 0;
        $matrixLength = count($this->matrix);

        while ($currentLetter < $matrixLength * $matrixLength) {
            sort($this->neededCells);
            for ($i = 0; $i < count($this->neededCells); $i++) {
                list($x, $y) = $this->neededCells[$i];
                $filledMatrix[$x][$y] = $this->englishMessage[$currentLetter];
                $currentLetter++;
            }

            $this->rotateMatrix();
        }

        $encryptMessage = '';

        foreach ($filledMatrix as $key => &$value) {
            ksort($value);
            $encryptMessage .= implode($filledMatrix[$key]);
        }

        return $encryptMessage;
    }

    public function decrypt()
    {
        $filledMatrix = [];

        $n = count($this->matrix);

        for ($i = 0; $i < strlen($this->englishMessage); $i++) {
            $temp[] = $this->englishMessage[$i];

            if (count($temp) % $n === 0) {
                $filledMatrix[] = $temp;
                $temp = [];
            }
        }

        $decryptMessage = '';

        for ($j = 0; $j < 4; $j++) {
            for ($i = 0; $i < count($this->neededCells); $i++) {
                list($x, $y) = $this->neededCells[$i];
                $decryptMessage .= $filledMatrix[$x][$y];
            }

            $this->rotateMatrix();
            sort($this->neededCells);
        }

        return $decryptMessage;
    }

    protected function rotateMatrix()
    {
        $n = count($this->neededCells);

        for ($i = 0; $i < $n; $i++) {
            list($x, $y) = $this->neededCells[$i];
            $this->neededCells[$i][0] = $y;
            $this->neededCells[$i][1] = $n - 1 - $x;
        }
    }
}
