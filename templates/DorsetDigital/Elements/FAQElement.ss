<div class="faq__holder-top <% if $Style %>$CssStyle<% end_if %>">

    <% if $Title && $ShowTitle %>
        <div class="faq__title-holder">
            <h2 class="faqtitle">$Title</h2>
        </div>
    <% end_if %>

    <div class='faq__holder'>
        <div id="accordion{$ID}" class="accordion">
            <% loop $Questions %>
                <div class="card">
                    <div class="card-header" id="heading{$ID}">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{$ID}" aria-expanded="false"
                                    aria-controls="collapse{$ID}">
                                $Question
                            </button>
                        </h5>
                    </div>
                    <div id="collapse{$ID}" class="collapse" aria-labelledby="heading{$ID}" data-parent="#accordion{$Up.ID}">
                        <div class="card-body">
                            $Answer
                        </div>
                    </div>
                </div>
            <% end_loop %>
        </div>
    </div>

</div>




