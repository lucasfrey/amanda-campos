
<% if $Title %>
    <h2 class="slice__multicolumns-header">$Title</h2>
<% end_if %>
<div class="slice__multicolumns <% if $Title %><% else %>last<% end_if %>h-clearfix">
    <div class="container">
        <% if $Content %>
            <div class="slice__multicolumns-content">
                <span class="icon icon--$RelationLink"></span>
                $Content
            </div>
        <% end_if %>

        <% if $SecondaryContent %>
            <div class="slice__multicolumns-content right">
                <span class="icon icon--$SecondaryIdentifier"></span>
                $SecondaryContent
            </div>
        <% end_if %>
    </div>
</div>