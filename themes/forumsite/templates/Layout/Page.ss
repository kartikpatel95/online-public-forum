<% include Banner %>
<div class="container mt-3">
    <% if $Title %>
        <h1>
            $Title
        </h1>
    <% end_if %>
    <% if $Content %>
        $Content
    <% end_if %>
    $Form
</div>
