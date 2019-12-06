<% include Banner %>
<div class="forum-page">
    <div class="container py-3">
      <div class="forum-text">
        Entries
      </div>
      <div class="row mb-4">
      	<div class="col-md-6">
      		<div id="submission-form">
                <div class="alert alert-danger">
                    There seems to be an error loading the submission form. Please contact the admin.
                </div>
            </div>
      	</div>
      	<div class="col-md-6">
      		<div>
                <h3>Latest Submission</h3>
                <% loop $getLastSubmission %>
                    <% include SubmissionData %>
                <% end_loop %>
      		</div>
      	</div>
      </div>
      <div class="grid">
          <% include UserSubmission %>
      </div>
  </div>
</div>
