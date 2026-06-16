<?php

declare(strict_types=1);

namespace App\Exceptions\Json;

use Illuminate\Http\Response;
use JsonException;

class HttpJsonException extends JsonException
{
    /**
     * @var int
     */
    protected int $status;

    /**
     * @var string
     */
    protected string $errorCode;

    /**
     * @param int $status
     * @param string $errorCode
     * @param string $message
     * @param array $errors
     */
    public function __construct(int $status, string $errorCode = '', string $message = '', protected array $errors = [])
    {
        parent::__construct($message);

        $statusText = Response::$statusTexts[$status];

        $this->status = $status;
        $this->errorCode = filled($errorCode) ? studly($errorCode) : studly($statusText);
    }

    /**
     * Get HTTP status.
     *
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * Get error code.
     *
     * @return string
     */
    public function getErrorCode(): string
    {
        return $this->errorCode;
    }

    /**
     * Get a list of errors.
     *
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}
