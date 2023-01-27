<?php

namespace App\Services;

use App\Models\Pic;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class RandomPicService
{
    private Http $http;
    /**
     * To prevent looping.
     * @var int
     */
    private static int $loopCounter = 0;

    public function __construct(Http $http)
    {
        $this->http = $http;
    }

    /**
     * @return string
     * @throws RuntimeException
     */
    public function getPicUri(): string
    {
        if (self::$loopCounter === 10) {
            throw New RuntimeException('Pictures source has a problems.');
        }

        if (!$picSource = env('PIC_SOURCE')) {
            throw New RuntimeException('Pictures source is not configured.');
        }

        $picRequest = $this->http::get($picSource);
        if ($picRequest->failed()) {
            throw New RuntimeException( 'Pictures source is not available.');
        }

        $picUri = (string)$picRequest->transferStats->getRequest()->getUri();

        if (Pic::query()->where('link', $picUri)->whereNotNull('is_approved')->exists()) {
            self::$loopCounter ++;
            return $this->getPicUri();
        }
        self::$loopCounter = 0;

        return $picUri;
    }
}
