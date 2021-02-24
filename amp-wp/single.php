<?php
/**
 * Single view template.
 * see: https://amp-wp.org/documentation/how-the-plugin-works/classic-templates/
 * @package AMP
 */

/**
 * Context.
 *
 * @var AMP_Post_Template $this
 */

$this->load_parts( [ 'html-start' ] );
?>

<?php $this->load_parts( [ 'header' ] ); ?>

    <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
    <script async custom-element="amp-access" src="https://cdn.ampproject.org/v0/amp-access-0.1.js"></script>
    <script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js"></script>
    <script async custom-element="amp-position-observer" src="https://cdn.ampproject.org/v0/amp-position-observer-0.1.js"></script>
    <script async custom-element="amp-animation" src="https://cdn.ampproject.org/v0/amp-animation-0.1.js"></script>

    <!-- AMP Axate -->
    <script id="amp-access" type="application/json">
        {
            "noPingback": true,
            "authorization": "https://axate.io/api/authorisation?domain=SOURCE_URL&rid=READER_ID&url=SOURCE_URL&premium=true",
            "login": {
                "sign-in": "https://accounts.axate.io/sign-on?rid=READER_ID&url=SOURCE_URL&url_from=SOURCE_URL&isIframe=true",
                "sign-out": "https://agate.io/api/amp_logout?url=SOURCE_URL&url_from=SOURCE_URL",
                "sign-up": "https://accounts.axate.io/sign-on?publication_name=localhost&pub_id=localhost&url_from=SOURCE_URL&isIframe=true",
                "top-up": "https://accounts.axate.io/payment-details?domain=localhost&url_from=SOURCE_URL&isIframe=true",
                "dismiss": "https://agate.io/amp/dismiss?domain=SOURCE_URL&rid=READER_ID&url=SOURCE_URL&url_from=SOURCE_URL",
                "set-threshold-yes": "https://agate.io/amp/set_threshold?domain=SOURCE_URL&rid=READER_ID&url=SOURCE_URL&url_from=SOURCE_URL&amount=100",
                "set-threshold-no": "https://agate.io/amp/set_threshold?domain=SOURCE_URL&rid=READER_ID&url=SOURCE_URL&url_from=SOURCE_URL&amount=0",
                "authorise-charge-true": "https://agate.io/amp/authorise_charge?charge_automatically=true&domain=SOURCE_URL&rid=READER_ID&url=SOURCE_URL&url_from=SOURCE_URL",
                "authorise-charge-false": "https://agate.io/amp/authorise_charge?charge_automatically=false&domain=SOURCE_URL&rid=READER_ID&url=SOURCE_URL&url_from=SOURCE_URL" },
                "authorizationFallbackResponse": { "error": true, "user": false
            }
        }
    </script>

    <style amp-boilerplate>
        body {
            -webkit-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            -moz-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            -ms-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            animation: -amp-start 8s steps(1, end) 0s 1 normal both
        }
        
        @-webkit-keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }
        
        @-moz-keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }
        
        @-ms-keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }
        
        @-o-keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }
        
        @keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }
    </style>
    <noscript>
        <style amp-boilerplate>
            body {
                -webkit-animation: none;
                -moz-animation: none;
                -ms-animation: none;
                animation: none
            }
        </style>
    </noscript>

<article class="amp-wp-article">
	<header class="amp-wp-article-header">
		<h1 class="amp-wp-title"><?php echo $this->get( 'post_title' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h1>
		<?php
		/**
		 * Filters the template parts loaded in the header area of the AMP legacy post template.
		 *
		 * @since 0.4
		 * @param string[] Templates to load.
		 */
		$this->load_parts( apply_filters( 'amp_post_article_header_meta', [ 'meta-author', 'meta-time' ] ) );
		?>
	</header>

	<?php $this->load_parts( [ 'featured-image' ] ); ?>
                  <div amp-access="NOT error AND NOT access" amp-access-hide>
                    <p class="standfirst">
                        Standfirst - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ullamcorper turpis vel commodo scelerisque. Phasellus luctus nunc ut elit cursus, et imperdiet diam vehicula.
                    </p>
                </div>

                <div amp-access="NOT error AND loggedIn">
                    <template amp-access-template type="amp-mustache">
                        <div data-axate-debug="messages">
                            <p data-axate-debug="msg">Gauge</p>
                            {{#isGaugeEmpty}}
                            <p data-axate-debug="msg">isEmpty</p>{{/isGaugeEmpty}} {{#isGaugeFull}}
                            <p data-axate-debug="msg">isFull</p>{{/isGaugeFull}} {{#isGaugeStateOne}}
                            <p data-axate-debug="msg">isStateOne</p>{{/isGaugeStateOne}} {{#isGaugeStateTwo}}
                            <p data-axate-debug="msg">isStateTwo</p>{{/isGaugeStateTwo}}
                        </div>
                    </template>
                </div>

	<div class="amp-wp-article-content" amp-access="access" amp-access-hide itemprop="articleBody">
		<?php echo $this->get( 'post_amp_content' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	</div>

	<footer class="amp-wp-article-footer">
		<?php
		/**
		 * Filters the template parts to load in the footer area of the AMP legacy post template.
		 *
		 * @since 0.4
		 * @param string[] Templates to load.
		 */
		$this->load_parts( apply_filters( 'amp_post_article_footer_meta', [ 'meta-taxonomy', 'meta-comments-link' ] ) );
		?>
	</footer>
</article>
                <!-- 
					Axate AMP
				-->
                <!-- Axate AMP - Component - Wallet Handle -->
                <div class="axate__wallet-handle">
                    <div amp-access="NOT error">
                        <template amp-access-template type="amp-mustache">
                            {{^notice.type.is_insuf_balance}}{{^notice.type.is_show_finish_no_funds_notice}}
                                <a class="axate-amp__status__default" href="#axate"></a>
                            {{/notice.type.is_show_finish_no_funds_notice}}{{/notice.type.is_insuf_balance}}
                            {{#notice.type.is_insuf_balance}}
                                <a class="axate-amp__status__balance-low" href="#axate"></a>
                            {{/notice.type.is_insuf_balance}}
                            {{#notice.type.is_show_finish_no_funds_notice}}
                                <a class="axate-amp__status__balance-nil" href="#axate"></a>
                            {{/notice.type.is_show_finish_no_funds_notice}}
                        </template>
                        <div amp-access="error">
                            <template amp-access-template type="amp-mustache">
                                <a class="axate-amp__status__error" href="#axate" amp-access="error"></a>
                            </template>
                        </div>
                    </div>
                </div>
                <div id="axate">
                    <div class="axate-amp__container" amp-access="NOT error AND NOT loggedIn">
                        <template amp-access-template type="amp-mustache">
                            <main class="axate-amp__notice">
                                <h2>{{notice.title}}</h2>
                                <p>{{{notice.description}}}</p>
                                <button class="axate-amp__button" on="tap:amp-access.login-sign-up" role="button">{{notice.ctaButtonText}}</button>
                                {{#publisher.pay_if_you_can}}
                                    {{^access}}
                                        <button class="axate-amp__button bg-grey" on="tap:amp-access.login-dismiss,scrollHereWhenUnlocked.scrollTo(duration=200)" role="button">No thanks</button>
                                    {{/access}}
                                {{/publisher.pay_if_you_can}}

                                <footer>
                                    <p>Already have an account? <a on="tap:amp-access.login-sign-in">Login here</a>.
                                    </p>
                                </footer>
                            </main>
                        </template>
                    </div>
                </div><a class="axate-amp__article-link" href="#">Jump to article</a>
                <div amp-access="NOT error AND loggedIn">
                    <template amp-access-template type="amp-mustache">
                        {{^dismissed}}
                            {{#isNotice}}
                            <main class="axate-amp__notice">
                                <h5 class="axate-amp__notice__logo">Axate</h5>
                                <h2>{{notice.title}}</h2>
                                <p>
                                    {{{notice.description}}}
                                    
                                    {{#notice.type.is_amount_gt_threshold}}
                                        <div class="axate-amp__notice-text">
                                            <div class="axate-amp__toggle-container">
                                                <p class="axate-amp__toggle-text"><span>Charge me automatically</span></p>
                                                <input class="axate-amp__toggle-checkbox" id="authorise-charge" type="checkbox">
                                                <label class="axate-amp__toggle-label" for="authorise-charge"></label>
                                                <div class="axate-amp__toggle-button-container">
                                                    <button class="axate-amp__button axate-amp__button--thin" data-axate-action="toggle-unchecked" role="button" on="tap:amp-access.login-authorise-charge-false" title="Autocharge = OFF">
                                                        {{notice.ctaButtonText}}
                                                    </button>
                                                    <button class="axate-amp__button axate-amp__button--thin" data-axate-action="toggle-checked" role="button" on="tap:amp-access.login-authorise-charge-true" title="Autocharge = ON">
                                                        {{notice.ctaButtonText}}
                                                    </button>
                                                </div>
                                            </div>
                                            {{#publisher.pay_if_you_can}}
                                                {{^access}}
                                                    <button class="axate-amp__button bg-grey axate-amp__button--thin" on="tap:amp-access.login-dismiss,scrollHereWhenUnlocked.scrollTo(duration=200)" role="button">No thanks</button>
                                                {{/access}}
                                            {{/publisher.pay_if_you_can}}
                                        </div>
                                    {{/notice.type.is_amount_gt_threshold}}
                                    
                                    {{#notice.type.is_insuf_balance}}
                                        <button class="axate-amp__button " on="tap:amp-access.login-top-up" role="button">
                                            {{notice.ctaButtonText}}
                                        </button>

                                        {{#publisher.pay_if_you_can}}
                                            {{^access}}
                                                <button class="axate-amp__button bg-grey" on="tap:amp-access.login-dismiss,scrollHereWhenUnlocked.scrollTo(duration=200)" role="button">No thanks</button>
                                            {{/access}}
                                        {{/publisher.pay_if_you_can}}
                                        <a class="axate-amp__status__balance-low" href="#axate"></a>
                                    {{/notice.type.is_insuf_balance}}

                                    {{#notice.type.is_new_pricing}}
                                        <p>Publication Pricing Updated</p>
                                        <div class="axate-amp__toggle-button-container">
                                            <button class="axate-amp__button axate-amp__button--thin" data-axate-action="toggle-checked" role="button" on="tap:amp-access.login-set-threshold-yes,scrollHereWhenUnlocked.scrollTo(duration=200)" title="Autocharge = ON">{{notice.ctaButtonText}}</button>
                                        </div>
                                        <button class="axate-amp__button axate-amp__button--thin" data-axate-action="toggle-unchecked" role="button" on="tap:amp-access.login-set-threshold-no,scrollHereWhenUnlocked.scrollTo(duration=200)" title="Autocharge = OFF">{{notice.ctaButtonText}}</button>
                                    
                                        {{#publisher.pay_if_you_can}}
                                            {{^access}}
                                                <button class="axate-amp__button bg-grey axate-amp__button--thin" on="tap:amp-access.login-dismiss,scrollHereWhenUnlocked.scrollTo(duration=200)" role="button">No thanks</button>
                                            {{/access}}
                                        {{/publisher.pay_if_you_can}}
                                    {{/notice.type.is_new_pricing}}

                                    {{#notice.type.is_new_publication}}
                                        <div class="axate-amp__notice-text">
                                            <div class="axate-amp__toggle-container">
                                                <p class="axate-amp__toggle-text">
                                                    <span>Charge me automatically for {{publisher.name}} from now on</span>
                                                    <input class="axate-amp__toggle-checkbox" id="set-threshold-toggle" type="checkbox" checked>
                                                    <label class="axate-amp__toggle-label" for="set-threshold-toggle"></label>
                                                    <div class="axate-amp__toggle-button-container">
                                                        <button class="axate-amp__button axate-amp__button--thin" data-axate-action="toggle-checked" role="button" on="tap:amp-access.login-set-threshold-yes,scrollHereWhenUnlocked.scrollTo(duration=200)" title="Autocharge = ON">
                                                            {{notice.ctaButtonText}}
                                                        </button>
                                                    </div>
                                                    <button class="axate-amp__button axate-amp__button--thin" data-axate-action="toggle-unchecked" role="button" on="tap:amp-access.login-set-threshold-no,scrollHereWhenUnlocked.scrollTo(duration=200)" title="Autocharge = OFF">
                                                        {{notice.ctaButtonText}}
                                                    </button>
                                                </p>
                                            </div>
                                            {{#publisher.pay_if_you_can}}
                                                {{^access}}
                                                    <button class="axate-amp__button axate-amp__button--thin bg-grey" on="tap:amp-access.login-dismiss,scrollHereWhenUnlocked.scrollTo(duration=200)" role="button">No thanks</button>
                                                {{/access}}
                                            {{/publisher.pay_if_you_can}}
                                        </div>
                                    {{/notice.type.is_new_publication}}

                                    {{#notice.type.is_show_finish_no_funds_notice}}
                                        <button class="axate-amp__button axate-amp__button--thin" on="tap:amp-access.login-top-up" role="button">
                                            {{notice.ctaButtonText}}
                                        </button>
                                        {{#publisher.pay_if_you_can}}
                                            {{^access}}
                                                <button class="axate-amp__button bg-grey axate-amp__button--thin" on="tap:amp-access.login-dismiss,scrollHereWhenUnlocked.scrollTo(duration=200)" role="button">No thanks</button>
                                            {{/access}}
                                        {{/publisher.pay_if_you_can}}
                                        <small>
                                            {{publicationName}} is published independently of Axate.
                                        </small>
                                    {{/notice.type.is_show_finish_no_funds_notice}}

                                    {{#notice.type.is_show_finish_notice}}
                                        <div class="axate-amp__notice-text">
                                            <h5>Tap OK to pay {{publisher.article_cost}}</h5>
                                            <p>You’ll never pay more than {{publisher.cap_cost}} per {{publisher.cap_period_text}} for {{publicationName}}.</p>
                                            <p>Do you want to approve all charges on this site?</p>
                                            <div class="axate-amp__toggle-container axate-amp__notice-bold">
                                                <p class="axate-amp__toggle-text"><strong>Yes, charge me automatically</strong>
                                                    <br>
                                                    <span>Switch off to approve each charge</span></p>
                                                <input class="axate-amp__toggle-checkbox" id="set-threshold-toggle" type="checkbox" checked>
                                                <label class="axate-amp__toggle-label" for="set-threshold-toggle"></label>
                                                <div class="axate-amp__toggle-button-container">
                                                    <button class="axate-amp__button axate-amp__button--thin" data-axate-action="toggle-checked" role="button" on="tap:amp-access.login-set-threshold-yes,scrollHereWhenUnlocked.scrollTo(duration=200)" title="OK - Yes, charge me automatically">
                                                        {{notice.ctaButtonText}}
                                                    </button>
                                                    <button class="axate-amp__button axate-amp__button--thin" data-axate-action="toggle-unchecked" role="button" on="tap:amp-access.login-set-threshold-no,scrollHereWhenUnlocked.scrollTo(duration=200)" title="OK - No, I would like to manually authorise charges">
                                                        {{notice.ctaButtonText}}
                                                    </button>
                                                </div>
                                            </div>
                                            <small>{{publicationName}} is published independently of Axate.</small>
                                        </div>
                                    {{/notice.type.is_show_finish_notice}}
                                    {{#notice.on_subscription}}
                                        <code>On Subscription</code>
                                    {{/notice.on_subscription}}
                                </p>
                            </main>
                            {{/isNotice}}
                        {{/dismissed}}
                    </template>
                    <section class="axate-amp__container" amp-access="NOT error AND loggedIn">
                        <template amp-access-template type="amp-mustache">{{#wallet}}
                            <label for="axate-amp__wallet-flip"></label>
                            <input class="axate-amp__wallet-flipper" id="axate-amp__wallet-flip" type="checkbox">
                            <section class="axate-amp__wallet">
                                <section class="axate-amp__flip-face axate-amp__front">
                                    <header class="axate-amp__header">
                                        <div class="axate-amp__balance">
                                            <div amp-access="NOT error AND loggedIn">
                                                <h4 class="amp-access-axate-logo__container">Axate</h4>
                                                <div class="axate-amp__balance__container"><span class="axate-amp__balance__amount">{{wallet.balance}}</span><span class="axate-amp__balance__subtitle">Total balance</span></div>
                                            </div>
                                            <button class="axate-amp__button axate-amp__button--thin" on="tap:amp-access.login-top-up" role="button">Top up</button>
                                            <main class="axate-amp__main">
                                                <div class="axate-amp__information">
                                                    <div class="axate-pricing-container">
                                                        <p class="axate-pricing-per-article"><strong>{{publisher.article_cost}}</strong><span>per
																article</span></p>
                                                        <p class="axate-pricing-per-week"><strong>{{publisher.cap_cost}}</strong><span>free
																point/per {{publisher.cap_period_text}}</span></p>
                                                    </div>
                                                    <div class="axate-gauge-container">
                                                        <svg class="axate-gauge" width="120" height="120" viewBox="0 0 120 120">
                                                            <circle class="axate-gauge-progress__meter" cx="60" cy="60" r="56" stroke-width="5">
                                                            </circle>
                                                            <circle class="axate-gauge-progress__value" cx="60" cy="60" r="56" stroke-width="5" style="stroke-dasharray: 399.992; stroke-dashoffset: {{wallet.gaugeSVGStrokeDashOffset}};">
                                                            </circle>
                                                        </svg>{{#isGaugeEmpty}}
                                                        <p class="axate-gauge-inner-text" title="isEmpty">
                                                            <strong>{{wallet.remainingUntilFree}}</strong><span>until free</span></p>
                                                        {{/isGaugeEmpty}} {{#isGaugeStateOne}}
                                                        <p class="axate-gauge-inner-text" title="isGaugeStateOne">
                                                            <strong>{{wallet.remainingUntilFree}}</strong><span>until free</span></p>
                                                        {{/isGaugeStateOne}} {{#isGaugeStateTwo}}
                                                        <p class="axate-gauge-inner-text" title="isGaugeStateTwo">
                                                            <strong>{{wallet.remainingUntilFree}}</strong><span>until free</span></p>
                                                        {{/isGaugeStateTwo}} {{#isGaugeFull}}
                                                        <p class="axate-gauge-inner-text"><strong>Free</strong><span>until<br/>{{wallet.freeUntilDate}}</span>
                                                        </p>
                                                        {{/isGaugeFull}}</div>
                                                </div>
                                                <footer></footer>{{#warning}}
                                                <section class="axate-amp__warning">
                                                    <p class="axate-amp__warning__text">{{warning}}</p>
                                                </section>
                                                {{/warning}}
                                            </main>
                                        </div>
                                    </header>
                                </section>
                                <section class="axate-amp__flip-face axate-amp__back">
                                    <header class="axate-amp__header">
                                        <div class="axate-amp__balance">
                                            <h4 class="amp-access-axate-logo__container">Axate</h4>
                                            <div class="axate-amp__settings-panel">
                                                <ul>
                                                    <li class="axate-amp__setting-icon__account">
                                                        <a data-ui="button" title="Account" href="https://{{accountUrl}}/my-agate/account" target="_blank">
                                                            <div></div><span>Account</span>
                                                        </a>
                                                    </li>
                                                    <li class="axate-amp__setting-icon__help">
                                                        <a data-ui="button" title="Help" href="mailto:support@axate.com?subject=I have feedback or a question (My ID is: {{wallet.id}})">
                                                            <div></div><span>Help</span>
                                                        </a>
                                                    </li>
                                                    <li class="axate-amp__setting-icon__feedback">
                                                        <a data-ui="button" title="Feedback" href="mailto:support@axate.com?subject=Report a bug">
                                                            <div></div><span>Feedback</span>
                                                        </a>
                                                    </li>
                                                    <li class="axate-amp__setting-icon__log-out">
                                                        <a data-ui="button" title="Log out" href="#" on="tap:amp-access.login-sign-out">
                                                            <div></div><span>Log out</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </header>
                                    <main class="axate-amp__main">
                                        <div class="axate-amp__section_publication_name">
                                            <h3>{{publicationName}}</h3>
                                        </div>
                                        <div class="axate-amp__section_cost">
                                            <p>Free point/{{publisher.cap_period_text}}:</p><span class="axate-amp__currency_amount">{{publisher.cap_cost}}</span>
                                            <p class="axate-amp__section_smalltext">(updates on {{wallet.freeUntilDate}})</p>
                                            <p class="axate-amp__section_description">Once you spend {{publisher.cap_cost}} in a {{publisher.cap_period_text}} your free reading continues until {{wallet.freeUntilDate}}.
                                            </p>
                                        </div>
                                    </main>
                                </section>
                            </section>
                            {{/wallet}}
                            <footer class="axate-amp__footer">
                                {{#wallet}}
                                <a class="axate-amp__footer__center" href="#">
									Go back to article
								</a> {{/wallet}}
                            </footer>
                        </template>
                        <section class="axate-amp__container" amp-access="error" amp-access-hide>
                            <section class="axate-amp__warning">
                                <p class="axate-amp__warning__text">TODO - Improve this error message</p>
                                <p class="axate-amp__warning__text">Oops... Something broke.</p>
                            </section>
                        </section>
                    </section>
                </div>
                <!-- Axate AMP - End -->
<?php $this->load_parts( [ 'footer' ] ); ?>

<?php
$this->load_parts( [ 'html-end' ] );
