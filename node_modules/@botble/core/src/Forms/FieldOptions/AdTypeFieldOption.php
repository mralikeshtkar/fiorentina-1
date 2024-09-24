<?php

namespace Botble\Base\Forms\FieldOptions;

class AdTypeFieldOption extends HtmlFieldOption
{
    protected string $type = 'info';
    protected array $adOptions = [];  // Array to hold ad options

    public function type(string $type): static
    {
        $this->type = $type;
        return $this;
    }

    // Method to set options for Google Ads
    public function setGoogleAdsOptions(array $options): static
    {
        $this->adOptions['googleAds'] = $options;
        return $this;
    }

    // Method to set options for manual ads
    public function setManualAdsOptions(array $options): static
    {
        $this->adOptions['manualAds'] = $options;
        return $this;
    }

    public function toArray(): array
    {
        $data = parent::toArray();

        $data['attr'] = $this->getAttributes();
        $data['type'] = $this->type;

        if ($this->colspan) {
            $data['colspan'] = $this->getColspan();
        }

        // Include ad options in the output array
        $data['adOptions'] = $this->adOptions;

        return $data;
    }
}
