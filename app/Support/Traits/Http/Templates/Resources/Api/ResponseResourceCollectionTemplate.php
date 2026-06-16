<?php

declare(strict_types=1);

namespace App\Support\Traits\Http\Templates\Resources\Api;

use Illuminate\Http\Response;
use JsonException;

trait ResponseResourceCollectionTemplate
{
    /**
     * @var string
     */
    private string $message = '';

    /**
     * Customize the response for a request.
     *
     * @param $request
     * @param $response
     * @throws JsonException
     */
    public function withResponse($request, $response): void
    {
        $responseContent = json_decode($response->getContent(), true, 512, JSON_THROW_ON_ERROR);
        $statusCode = $response->getStatusCode();
        $statusTexts = Response::$statusTexts[$statusCode];
        $message = $this->getMessage();
        $content = [
            'message' => empty($message)
                ? period_at_the_end($statusTexts)
                : $message,
            'data' => $responseContent,
        ];

        $response->setContent(json_encode($content, JSON_THROW_ON_ERROR));
    }

    /**
     * @param $message
     * @return $this
     */
    public function setMessage($message): static
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }
}
