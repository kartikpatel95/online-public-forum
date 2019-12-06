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
      <% if $Campaigns %>
        <div class="campaign-text">
          Get involved...
        </div>
      <div class="row justify-content-center">
          <% loop $Campaigns %>
            <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
              <div class="campaigns">
                <a href="$Link">
                  <div class="d-flex justify-content-center">
                    <img src="$Teaser.Link" class="tile-images" alt="$Teaser.Title"/>
                  </div>
                  <div class="cpation-heading">
                    $TileCaption
                  </div>
                  <div class="open-close">
                    $getCampaignStatus($ID)
                  </div>
                </a>
              </div>
            </div>
          <% end_loop %>
      </div>
      <% else %>
        <div class="campaign-text">
          There are no campaigns
        </div>
      <% end_if %>
    </div>
</div>
