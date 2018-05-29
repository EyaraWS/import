<?php

declare(strict_types=1);

namespace Darkilliant\ProcessBundle\Logger;

use Psr\Log\AbstractLogger;

/**
 * @internal
 */
class InMemoryLogger extends AbstractLogger
{
    private $messages;

    public function log($level, $message, array $context = [])
    {
        $this->messages[] = ['message' => $this->interpolate($message, $context), 'context' => $context];
    }

    public function getMessages($withContext = false): array
    {
        return ($withContext) ? $this->messages : array_column($this->messages, 'message');
    }

    private function interpolate($message, array $context = [])
    {
        // build a replacement array with braces around the context keys
        $replace = [];
        foreach ($context as $key => $val) {
            // check that the value can be casted to string
            if (!is_array($val) && (!is_object($val) || method_exists($val, '__toString'))) {
                $replace['{'.$key.'}'] = $val;
            }
        }

        // interpolate replacement values into the message and return
        return strtr($message, $replace);
    }
}
