<?php

namespace Way\Generators\Generators;

class TestGenerator extends Generator {

    /**
     * Fetch the compiled template for a test
     *
     * @param  string $template Path to template
     * @param  string $className
     * @return string Compiled template
     */
    protected function getTemplate($template, $className)
    {
        $models = strtolower(str_replace('Test', '', $className)); //  dogs
        $model = str_singular($models); // dog
        $Model = ucwords($model); // Dog

        $template = $this->file->get($template);

        foreach(array('model', 'Model', 'models', 'name') as $var)
        {
            $template = str_replace('{{'.$var.'}}', $$var, $template);
        }

        return $template;
    }

}
