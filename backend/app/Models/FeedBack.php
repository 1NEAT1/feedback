<?php

namespace App\Models;

use App\Models\FeedBack\IFeedBack;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class FeedBack extends Model implements IFeedBack
{
    use HasFactory;

    private $errors;

    // для смены БД (не тестил, но оф. метод)

    // protected $connection = 'mysql_2';

    // либо $model->setConnection('mysql_2');

    protected $primaryKey = 'id';
    protected $table = 'feedback';
    protected $fillable = [
        'name',
        'phone',
        'message',
    ];

    private $rules = [
        'name' => 'required|max:255',
        'phone' => 'required|regex:/^\+?8\d{10}$/',
        'message' => 'required'
    ];

    public function store(array $request): bool
    {
        $validator = $this->validate($request);

        if (!$validator->fails()) {
            $record = new static();
            if($record->save()){
                return true;
            }
        }

        $this->errors = $validator->errors();
        return false;
    }

    public function errors(): object
    {
        return $this->errors;
    }

    private function validate($data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, $this->rules);
    }
}
