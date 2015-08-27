<div class="slice__twocolumns container h-clearfix">
    <% if $LeadImage %>
        <div class="slice__twocolumns-image l-col-3 l-padding">
            $LeadImage
        </div>
    <% end_if %>

    <% if $Content %>
        <div class="slice__twocolumns-content l-col-8 l-padding">
            $Content
        </div>
    <% end_if %>
</div>