<?php

namespace App\Models;

use App\Repository\AppRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class Office extends AppRepository {

    use HasFactory;
    protected $fillable = [
        'code',
        'description',
        'direction',
        'identification',
        'currency_id'
    ];

    /**
     * Define relation model Currency
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currency() {
        return $this->belongsTo(Currency::class);
    }

    /**
     * Function defined rules to validate
     *
     * @param Request $request
     * @return \ValidationException
     */
    public static function validateData(Request $request) {
        return $request->validate([
            'code' => 'required',
            'description' => 'required',
            'direction' => 'required',
            'identification' => 'required',
            'currency_id' => 'required|integer',
        ]);
    }
}
