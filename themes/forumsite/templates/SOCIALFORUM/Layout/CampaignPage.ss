<% include Banner %>
<div class="campaign">
    <% if $Content %>
        <div class="content-wrapper">
          <div class="container py-3">
            $Content
        </div>
      </div>
    <% end_if %>

    <div class="container py-3">
      <div class="d-flex justify-content-center">
        <% if $Forums %>
          <% loop $Forums %>
            <div class="campaigns">
              <a href="$Link">
                <div>
                  <img src="$Teaser.Link" class="tile-images"/>
                </div>
                <div class="cpation-heading">
                  $Caption
                </div>
              </a>
            </div>
          <% end_loop %>
        <% end_if %>
    </div>
  </div>
</div>
