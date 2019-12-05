<% include Banner %>
<div class="forum-page">
    <div class="container py-3">
      <div class="grid">
        <% loop $ForumSubmissions %>
          <div class="grid-item">
            <div class="name">
              $Name
            </div>
            <div>
              $Summary.LimitWordCount(50)
            </div>
          </div>
        <% end_loop %>
      </div>
  </div>
</div>
