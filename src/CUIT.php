<?php

namespace GlobalInnovation\Validation\Rules;

use Illuminate\Contracts\Validation\Rule;

class CUIT implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function validate($attribute, $value)
    {
        $passes = false;
        $acumulado = 0;
        $base = '5432765432';
        $bases = array_map('intval', str_split($this->base));
        $cuit = array_map('intval', str_replace(["-", "+"], "", filter_var($value, FILTER_SANITIZE_NUMBER_INT)));
        $digitoVerificador = array_pop($cuit);

        if (count($cuit) === count($bases)) {
            foreach ($bases as $base) {
                $acumulado += array_shift($cuit) * $base;
            }

            $verificador = 11 - ($acumulado % 11);
            // $verificador puede ser 10 u 11
            if ($verificador > 10) {
                $verificador = $verificador === 10 ? 9 : 0;
            }
            $passes = ($digitoVerificador === $verificador);
        }

        return $passes;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El CUIT es inválido.';
    }
}
