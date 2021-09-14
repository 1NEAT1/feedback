<?php

namespace App\Http\Controllers;

use App\Models\FeedBack;
use Illuminate\Http\Request;

class FeedBackController extends Controller
{
    public function store(Request $request)
    {
        $model = new FeedBack();

        if ($model->store($request->json()->all())) {
            // можно так же использовать для вывода ошибок если что-то не записалось в файл, не стал вставлять это
            // вставил тупо метод
            (new FeedBack\FeedBackFile())->store($request->json()->all());
            return json_encode(['status' => true]);
        }

        return json_encode(['status' => false, 'errors' => $model->errors()]);
    }
}
