<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@doubledip.se>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use InvalidArgumentException;
use WordPlate\Acf\Fields\Attributes\ConditionalLogic;
use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\Nullable;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\ReturnFormat;
use WordPlate\Acf\Fields\Attributes\Wrapper;

/**
 * This is the taxonomy field class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
class Taxonomy extends Field
{
    use ConditionalLogic, Instructions, Nullable, Required, ReturnFormat, Wrapper;

    /**
     * The field type.
     *
     * @var string
     */
    protected $type = 'taxonomy';

    /**
     * Set the appearance style.
     *
     * @param string $fieldType
     *
     * @return self
     */
    public function appearance(string $fieldType): self
    {
        if (!in_array($fieldType, ['checkbox', 'multi_select', 'select', 'radio'])) {
            throw new InvalidArgumentException("Invalid argument field type [$fieldType].");
        }

        $this->config->set('field_type', $fieldType);

        return $this;
    }

    /**
     * Allow new terms to be created whilst editing.
     *
     * @return self
     */
    public function createTerms(): self
    {
        $this->config->set('add_term', true);

        return $this;
    }

    /**
     * Load value from posts terms.
     *
     * @return self
     */
    public function loadTerms(): self
    {
        $this->config->set('load_terms', true);

        return $this;
    }

    /**
     * Connect selected terms to the post.
     *
     * @return self
     */
    public function saveTerms(): self
    {
        $this->config->set('save_terms', true);

        return $this;
    }

    /**
     * Set the select the taxonomy to be displayed.
     *
     * @param string $taxonomy
     *
     * @return self
     */
    public function taxonomy(string $taxonomy): self
    {
        $this->config->set('taxonomy', $taxonomy);

        return $this;
    }
}
