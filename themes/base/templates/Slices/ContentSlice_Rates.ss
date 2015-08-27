<div class="slice__experiences h-clearfix container $SecondaryIdentifier">
    <h2>$Title</h2>

    <% loop $Experiences %>
        <div class="slice__experience-bloc <% if $Last %>last<% end_if %>">
            <% if $Image %>
                <div class="exprience-image l-col-2 l-padding">
                    $Image
                </div>
            <% end_if %>
            <% if $Content %>
                <div class="exprience-content l-col-8 l-padding">
                    $Content
                </div>
            <% end_if %>
        </div>
    <% end_loop %>
    </div>
</div>