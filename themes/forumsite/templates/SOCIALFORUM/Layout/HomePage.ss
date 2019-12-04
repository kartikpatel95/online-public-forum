<% include Banner %>

<div class="home">
  <% if $Content %>
    <div class="content-wrapper">
      <div class="container pt-3 pb-2">
        $Content
      </div>
    </div>
  <% end_if %>

  <div class="container py-3">
    <div class="d-flex justify-content-center">
      <% if $Campaigns %>
        <div class="campaigns">
          <% loop $Campaigns %>
            <a href="$Link">
              <div>
                $Teaser.ScaleWidth(300)
              </div>
              <div class="cpation-heading">
                $TileCaption
              </div>
            </a>
          <% end_loop %>
        </div>
      <% end_if %>
    </div>
  </div>
</div>
