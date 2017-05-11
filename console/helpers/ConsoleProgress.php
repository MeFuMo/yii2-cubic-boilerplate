<?php

use yii\base\Object;
use yii\helpers\Console;

/**
 * Usage:
 * $consoleProgress = new ConsoleProgress(['max' => 365]);
 * $consoleProgress->start();
 * foreach($days in $day) {
 *     echo $day;
 *     $consoleProgress->advance();
 * }
 */
class ConsoleProgress extends Object
{
    /**
     * @var int maximum number that equals to 100%
     */
    public $max = 0;

    /**
     * @var int number of digits after dot in percent number
     */
    private $percentPrecision = 2;

    /**
     * @var int counter step that will trigger render
     */
    private $stepSize;

    /**
     * @var int counter
     */
    private $i = 0;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if ($this->max < 0) {
            throw new \RuntimeException('$max must be greater or equals to zero');
        }

        $precision = (int)ceil(log10($this->max / 100));
        $this->percentPrecision = $precision > 2 ? 2 : ($precision < 0 ? 0 : $precision);
        $this->stepSize = ceil($this->max / 100 / pow(10, $this->percentPrecision));
    }

    /**
     * Display progress
     */
    public function start()
    {
        $this->render();
    }

    /**
     * Increment internal counter and print progress
     */
    public function advance()
    {
        if (++$this->i % $this->stepSize == 0 || $this->i == $this->max) {
            $this->render();
        }
    }

    /**
     * Render progress message
     */
    private function render()
    {
        $percent = $this->max ? $this->i / $this->max * 100 : 100;
        Console::stdout(sprintf("\rDone %.{$this->percentPrecision}f%% (%d/%d)", $percent, $this->i, $this->max));
        Console::clearLineAfterCursor();
    }
}
