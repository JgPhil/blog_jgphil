<?php

namespace App\src\constraint;

use App\Framework\Validation;

/**
 * Class BlogValidationComponent
 */
class BlogValidationComponent extends Validation
{
    protected $constraint;

    /**
     * @return void
     */
    public function __construct()
    {
        $this->constraint = new Constraint;
    }
}