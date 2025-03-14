<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class WordCountRule implements ValidationRule
{
    protected $count;

    function __construct($count){
        $this->count = $count;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(str_word_count($value)<$this->count){
            $fail('The bio must contain more than '.$this->count.' words.');
        }
        //
    }
}
