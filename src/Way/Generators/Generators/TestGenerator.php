<?php

namespace Way\Generators\Generators;

use Illuminate\Support\Pluralizer;

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
        $Model = $this->cache->getModelName();  // Post
        $Models = Pluralizer::plural($Model);   // Posts
        $models = strtolower($Models);          // posts
        $model = Pluralizer::singular($models); // post

        $template = $this->file->get($template);

        foreach(array('model', 'models', 'Models', 'Model', 'className') as $var)
        {
            $template = str_replace('{{'.$var.'}}', $$var, $template);
        }

        return $template;
    }

}
