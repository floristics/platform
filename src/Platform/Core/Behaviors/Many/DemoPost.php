<?php

namespace Orchid\Core\Behaviors\Many;

use Orchid\Platform\Fields\Field;
use Orchid\Platform\Behaviors\Many;
use Orchid\Platform\Http\Filters\SearchFilter;
use Orchid\Platform\Http\Filters\StatusFilter;
use Orchid\Platform\Http\Filters\CreatedFilter;
use Orchid\Platform\Http\Forms\Posts\BasePostForm;
use Orchid\Platform\Http\Forms\Posts\UploadPostForm;

class DemoPost extends Many
{
    /**
     * @var string
     */
    public $name = 'Demo post';

    /**
     * @var string
     */
    public $description = 'Demonstrative post';

    /**
     * @var string
     */
    public $slug = 'demo';

    /**
     * Slug url /news/{name}.
     *
     * @var string
     */
    public $slugFields = 'name';

    /**
     * Rules Validation.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'id'             => 'sometimes|integer|unique:posts',
            'content.*.name' => 'required|string',
            'content.*.body' => 'required|string',
        ];
    }

    /**
     * HTTP data filters.
     *
     * @return array
     */
    public function filters() : array
    {
        return [
            SearchFilter::class,
            StatusFilter::class,
            CreatedFilter::class,
        ];
    }

    /**
     * @return array
     * @throws \Orchid\Platform\Exceptions\TypeException
     */
    public function fields() : array
    {
        return [
            Field::tag('input')
                ->type('text')
                ->name('place')
                ->max(255)
                ->required()
                ->title('Name Articles')
                ->help('Article title'),

            Field::tag('wysiwyg')
                ->name('body')
                ->required()
                ->title('Name Articles')
                ->help('Article title'),

            Field::tag('markdown')
                ->name('body2')
                ->required()
                ->title('Name Articles')
                ->help('Article title'),

            Field::tag('picture')
                ->name('picture')
                ->width(500)
                ->height(300),

            Field::tag('datetime')
                ->type('text')
                ->name('open')
                ->title('Opening date')
                ->help('The opening event will take place'),

            Field::tag('checkbox')
                ->name('free')
                ->default(1)
                ->title('Free')
                ->placeholder('Event for free')
                ->help('Event for free'),

            Field::tag('code')
                ->name('block')
                ->title('Code Block')
                ->help('Simple web editor'),

            Field::tag('input')
                ->type('text')
                ->name('title')
                ->max(255)
                ->required()
                ->title('Article Title')
                ->help('SEO title'),

            Field::tag('textarea')
                ->name('description')
                ->max(255)
                ->row(5)
                ->required()
                ->title('Short description'),

            Field::tag('tags')
                ->name('keywords')
                ->title('Keywords')
                ->help('SEO keywords'),

            Field::tag('select')
                ->options([
                    'index' => 'Index',
                    'noindex' => 'No index',
                ])
                ->name('robot')
                ->title('Indexing')
                ->help('Allow search bots to index page'),

            Field::tag('list')
                ->name('list')
                ->title('Dynamic list')
                ->help('Dynamic list'),

            Field::tag('input')
                ->type('text')
                ->name('phone')
                ->mask('(999) 999-9999')
                ->title('Phone')
                ->help('Number Phone'),

            /* need api key 'place'
            Field::tag('place')
                ->name('place')
                ->title('Place')
                ->help('place for google maps'),
            */
        ];
    }

    /**
     * @return array
     */
    public function modules() : array
    {
        return [
            BasePostForm::class,
            UploadPostForm::class,
        ];
    }

    /**
     * Grid View for post type.
     */
    public function grid() : array
    {
        return [
            'name'       => 'Name',
            'publish_at' => 'Date of publication',
            'created_at' => 'Date of creation',
        ];
    }
}
