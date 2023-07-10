<?php

declare(strict_types=1);

/**
 * Класс решения квадратного уравнения
 */
class QuadraticEquationSolver
{
    /**
     * @param float $a
     * @param float $b
     * @param float $c
     * @return float[]
     */
    public function solve(float $a, float $b, float $c): array
    {
        if (is_finite($a) === false || is_finite($b) === false || is_finite($c) === false) {
            throw new TypeError('Аргументы не могут принимать значения NAN и INF');
        }

        if (abs($a) < PHP_FLOAT_EPSILON) {
            throw new RuntimeException('а не может быть равно 0');
        }

        $solutions = [];

        $d = $b * $b - 4 * $a * $c;

        if (abs($d) < PHP_FLOAT_EPSILON) {
            $solutions[] = -$b / 2 * $a;
        } elseif ($d > 0) {
            $solutions[] = (-$b + sqrt($d)) / (2 * $a);
            $solutions[] = (-$b - sqrt($d)) / (2 * $a);
        }

        return $solutions;
    }
}