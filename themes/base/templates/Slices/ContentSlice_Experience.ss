<div class="slice__experiences h-clearfix $SecondaryIdentifier">
    <div class="slice__experiences-title">
        <h2 class="container">$Title</h2>
    </div>
    <div class="container">
    <% loop $Experiences %>
        <div class="slice__experience-bloc <% if $Last %>last<% end_if %>">
            <% if $Image %>
                <div class="experience-image l-padding">
                    $Image
                </div>
            <% end_if %>
            <% if $Content %>
                <div class="experience-content l-padding">
                    <h3>$Title</h3>
                    $Content
                </div>
            <% end_if %>
        </div>
    <% end_loop %>
    </div>
</div>