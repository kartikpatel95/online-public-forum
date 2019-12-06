<% include Banner %>
<div class="forum-page">
    <div class="container py-3">
        <div class="forum-text">
            Entries
        </div>
        <div class="grid">
            <% include UserSubmission %>
        </div>
    </div>

    <div class="form-wrapper">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-6">
                    <div id="submission-form" data-page="$ID">
                        <div class="alert alert-danger">
                            There seems to be an error loading the submission form. Please contact the admin.
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <h3 class="form-content-heading">Latest Submission</h3>
                        <% loop $LastSubmission %>
                            <div class="w-100 submission-content latest-submission">
                                <div class="submission-content-wrapper">
                                    <div class="name">
                                        $Name
                                    </div>
                                    <div>
                                        $Summary.LimitWordCount(350)
                                    </div>
                                </div>
                            </div>
                        <% end_loop %>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
