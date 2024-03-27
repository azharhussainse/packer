<?php

namespace App\Models\Traits\Attributes;

trait TestmonialAttributes
{
    /**
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        if ($this->isActive()) {
            return "<label class='label label-success'>".trans('labels.general.active').'</label>';
        }

        return "<label class='label label-danger'>".trans('labels.general.inactive').'</label>';
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->show_on_home == 1;
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">'.
                $this->getEditButtonAttribute('edit-faq', 'admin.testmonials.edit').
                $this->getDeleteButtonAttribute('delete-faq', 'admin.testmonials.destroy').
                '</div>';
    }

    /**
     * Get Display Status Attribute.
     *
     * @var string
     */
    public function getDisplayStatusAttribute(): string
    {
        return $this->isActive() ? 'Active' : 'InActive';
    }
}
