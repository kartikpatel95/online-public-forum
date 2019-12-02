<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <% loop $Menu(1) %>
                    <li class="nav-item <% if $Children %>dropdown<% end_if %>">
                        <a class=" nav-link $LinkingMode <% if $Children %>dropdown-toggle<% end_if %>"
                            <% if $Children %>role="button" aria-expanded="false" data-toggle="dropdown"<% end_if %>
                           href="$Link" title="Go to the $Title page">$MenuTitle</a>
                        <% if $Children %>
                            <div class="dropdown-menu">
                                <% loop $Children %>
                                    <a class="dropdown-item" href="$Link" title="Go to the $Title page">$MenuTitle</a>
                                <% end_loop %>
                            </div>
                        <% end_if %>
                    </li>
                <% end_loop %>
            </ul>
        </div>
    </div>
</nav>