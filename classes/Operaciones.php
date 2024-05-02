<?php

class Operaciones{
    public function sumar($n1, $n2) {
        if ($n1 == NULL || $n2 == NULL) throw new InvalidArgumentException('Los valores no pueden ser nulos');

        if (is_string($n1) || is_string($n2)) throw new InvalidArgumentException('Los valores deben ser numéricos');

        return $n1 + $n2;
    }
}

