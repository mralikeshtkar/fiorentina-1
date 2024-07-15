<?php

namespace App\Http\Forms;

use Botble\Base\Forms\FieldOptions\ContentFieldOption;
use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\FieldOptions\IsFeaturedFieldOption;
use Botble\Base\Forms\FieldOptions\NameFieldOption;
use Botble\Base\Forms\FieldOptions\RadioFieldOption;
use Botble\Base\Forms\FieldOptions\SelectFieldOption;
use Botble\Base\Forms\FieldOptions\StatusFieldOption;
use Botble\Base\Forms\FieldOptions\TagFieldOption;
use Botble\Base\Forms\FieldOptions\AdTypeFieldOption;
use Botble\Base\Forms\FieldOptions\DatePickerFieldOption;
use Botble\Base\Forms\Fields\EditorField;
use Botble\Base\Forms\Fields\DatePickerField;
use Botble\Base\Forms\Fields\MediaImageField;
use Botble\Base\Forms\Fields\OnOffField;
use Botble\Base\Forms\Fields\RadioField;
use Botble\Base\Forms\Fields\SelectField;
use Botble\Base\Forms\Fields\TagField;
use Botble\Base\Forms\Fields\TextareaField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Base\Forms\Fields\TreeCategoryField;
use Botble\Base\Forms\FormAbstract;
// use App\Http\Requests\PostRequest;
use App\Models\Ad;
use App\Models\AdPosition;
use App\Models\AdType;

class AdForms extends FormAbstract
{
    public function setup(): void
    {


        $this
            ->model(Ad::class)
            // ->setValidatorClass(PostRequest::class)
            ->add('name', TextField::class, NameFieldOption::make()->required()->toArray())
            ->add(
                'link',
                TextField::class,
                TextFieldOption::make()
                    ->label('Link')
                    ->required()
                    ->toArray()
            )
            ->add(
                'starts_at',
                DatePickerField::class, // Use DatePickerField if available
                DatePickerFieldOption::make()
                    ->label('Start Date')
                    ->toArray()
            )
            ->add(
                'expires_at',
                DatePickerField::class, // Use DatePickerField if available
                DatePickerFieldOption::make()
                    ->label('Expiration Date')
                    ->toArray()
            )
            ->add('status', SelectField::class, StatusFieldOption::make()->toArray())
            ->when(get_post_formats(true), function (AdForms $form, array $postFormats) {
                if (count($postFormats) > 1) {
                    $choices = [];

                    foreach ($postFormats as $postFormat) {
                        $choices[$postFormat[0]] = $postFormat[1];
                    }

                    $form
                        ->add(
                            'format_type',
                            RadioField::class,
                            RadioFieldOption::make()
                                ->label(trans('plugins/blog::posts.form.format_type'))
                                ->choices($choices)
                                ->toArray()
                        );
                }
            })
            
            ->add(
                'adTypes[]',
                SelectField::class, // Changed from TreeCategoryField if not hierarchical
                SelectFieldOption::make()
                    ->label("Type")
                    ->choices(
                        AdType::query()
                            ->pluck('name', 'id')  // Get ad types as 'name' => 'id' pairs
                            ->toArray()
                    )
                    ->when($this->getModel()->getKey(), function (SelectFieldOption $fieldOption) {
                        // When editing, select the current ad types associated with the model
                        return $fieldOption->selected(
                            $this->getModel()->adTypes()->pluck('id')->all()  // Assuming adTypes is the relationship name
                        );
                    }, function (SelectFieldOption $fieldOption) {
                        // When creating a new model instance
                        return $fieldOption
                            ->selected(
                                AdType::query()
                                    ->pluck('id')
                                    ->all()
                            );
                    })
                    ->toArray()
            )
            

            ->when(
                function () {
                    // Only add the image field if 'Google Ads' is not selected
                    $selectedAdTypes = $this->getModel()->getKey() ? 
                        $this->getModel()->adTypes->pluck('name')->all() : [];

                    return !in_array('Google Ads', $selectedAdTypes);
                },
                function (AdForms $form) {
                    $form->add('image', MediaImageField::class);
                }
            )            ->setBreakFieldPoint('status');
    }
}
