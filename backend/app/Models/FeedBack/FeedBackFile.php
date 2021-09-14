<?php

namespace App\Models\FeedBack;

use Illuminate\Support\Facades\Storage;
use Throwable;

class FeedBackFile implements IFeedBack
{
    const PATH = '/feedback/';
    const FILENAME = 'logs.json';
    private $errors;

    /**
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */

    public function store(array $request): bool
    {
        try {
            $fullPath = self::PATH . self::FILENAME;
            $array = [];

            if (Storage::exists($fullPath)) {
                $content = Storage::disk('local')->get($fullPath);
                $array = json_decode($content, true);
            }

            $array[] = $request;
            Storage::disk('local')->put($fullPath, json_encode($array));
            return true;
        } catch (Throwable $ex) {
            $this->errors = $ex;
            return false;
        }
    }

    public function errors(): object
    {
        return $this->errors;
    }
}
