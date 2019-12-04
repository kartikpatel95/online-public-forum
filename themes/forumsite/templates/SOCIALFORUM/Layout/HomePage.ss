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
          <% loop $Campaigns %>
            <div class="campaigns">
              <a href="$Link">
                <div>
                  <img src="$Teaser.Link" class="tile-images"/>
                </div>
                <div class="cpation-heading">
                  $TileCaption
                </div>
                <div class="open-close">
                  $getCampaignStatus($ID)
                </div>
              </a>
            </div>
          <% end_loop %>
      <% end_if %>
    </div>
  </div>
</div>
