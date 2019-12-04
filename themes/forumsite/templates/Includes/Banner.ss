<div class="$BannerCheck" <% if $Banner %>style="background: url('$Banner.Link');
  background-position: $Banner.PercentageX% $Banner.PercentageY%;"<% end_if %>>
  <div class="banner-content-wrapper d-flex align-items-center">
    <div class="container">
      <% if $BannerContent %>
        <div class="header-spacer d-none d-md-block"></div>
        <div class="w-100 banner-content">
          $BannerContent
        </div>
      <% end_if %>
    </div>
  </div>
</div>
