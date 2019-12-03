<div class="footer">
    <div class="footer-wrapper">
      <div class="container">
          <div class="row">
            <% with $SiteConfig %>
              <% if $Social %>
                  <div class="col-md-4">
                      <div class="footer-headings">
                        Social Media
                      </div>
                      <div class="text-center">
                        <% loop $Social.Sort('SortID') %>
                            <a href="$SocialLink.LinkURL" {$SocialLink.TargetAttr}><i class="$Icon social-icon"></i></a>
                        <% end_loop %>
                      </div>
                  </div>

                  <div class="col-md-4">
                  </div>
                  <% if $Logo %>
                    <div class="col-md-4 d-flex align-items-center justify-content-center pt-3 pt-md-0">
                      <a href="/"><img src="$Logo.Link" alt="$Logo.Title" class="logo"/></a>
                    </div>
                  <% end_if %>
              <% end_if %>
          <% end_with %>
        </div>
      </div>
    </div>
    <div class="py-1 text-center footer-tagline">
        &copy $SiteConfig.Tagline
    </div>
</div>
