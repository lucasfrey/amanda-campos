<?php

class ExperienceSlice extends ContentSlice
{
    private static $has_many = array(
        'Experiences' => 'Experience'
    );

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab(
            'Root.Main',
            new GridField('Experiences', 'Experiences', $this->Experiences(), new GridFieldConfig_RecordEditor(50))
        );

        return $fields;
    }

}
