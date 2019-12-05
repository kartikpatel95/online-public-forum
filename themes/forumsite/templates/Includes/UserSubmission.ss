<% if $Submissions %>
  <% loop $Submissions %>
    <div class="grid-item">
      <div class="name">
        $Name
      </div>
      <div>
        $Summary.LimitWordCount(50)
      </div>
    </div>
  <% end_loop %>
<% end_if %>
