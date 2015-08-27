<div class="h-clearfix">
    <% if $Slices %>
        <% loop $Slices %>
            $forTemplate
        <% end_loop %>
    <% end_if %>
</div>

<div class="contact-form container h-clearfix">
    <h2>Interested in working with me ?</h2>

    <div class="contact-form__form">
        $ContactForm
    </div>

    <div class="contact-form__infos">
        $ContactInfos
    </div>
</div>