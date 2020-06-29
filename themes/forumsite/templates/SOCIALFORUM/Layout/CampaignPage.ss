<% include Banner %>
<div class="campaign">
    <div class="container py-3 mb-0 mb-md-3">
        <div class="breadcrumb">
            $Breadcrumbs
        </div>
    </div>
    <% if $Content %>
        <div class="content-wrapper">
          <div class="container py-3">
            $Content
        </div>
      </div>
    <% end_if %>

    <div class="container py-3">
      <div class="row justify-content-center">
        <% if $Forums %>
          <% loop $Forums %>
            <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
              <div class="campaigns">
                <a href="$Link">
                  <div class="justify-content-center d-flex">
                    <img src="$Teaser.Link" class="tile-images" alt="$Teaser.Title"/>
                  </div>
                  <div class="cpation-heading">
                    $Caption
                  </div>
                  <div class="open-close">
                    Submissions: $SubmissionCount
                  </div>
                  <div class="text-center pt-2">
                    $OpenClosedStatus
                  </div>
                </a>
              </div>
            </div>
          <% end_loop %>
        <% end_if %>
    </div>
  </div>
</div>
