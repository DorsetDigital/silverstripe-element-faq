<div class="faq__holder-top <% if $Style %>$CssStyle<% end_if %>">

    <% if $Title && $ShowTitle %>
        <div class="faq__title-holder">
            <h2 class="faqtitle">$Title</h2>
        </div>
    <% end_if %>

    <dl class="faq__list">
        <% loop $Questions %>
            <dt id="question-$ID" class="faq__question" aria-controls="answer-$ID" aria-expanded="false">
                <button aria-expanded="false" aria-controls="answer-$ID">
                    $Question
                </button>
            </dt>
            <dd class="faq__answer" id="answer-$ID">
                $Answer
            </dd>
        <% end_loop %>
    </dl>

</div>




