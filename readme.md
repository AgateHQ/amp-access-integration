# Agate amp-access integration


Check out a working [example](https://s3.eu-west-2.amazonaws.com/agate-amp/example.html) and the [source code](./src/example/index.html).


Please follow these intructions to integrate amp-access and Agate.

## Agate CSS
	<link href='https://s3.eu-west-2.amazonaws.com/agate-amp/agate.css' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
	
 ## Amp Access Configuration
   
	<script id="amp-access" type="application/json">
	{
		"authorization": "https://evening-springs-39131.herokuapp.com/api/authorization?rid=READER_ID&url=CANONICAL_URL",
		"noPingback": true,
		"login": {
			"sign-in": "https://evening-springs-39131.herokuapp.com/account/login?rid=READER_ID&url=CANONICAL_URL",
			"sign-out": "https://evening-springs-39131.herokuapp.com/account/logout?rid=READER_ID&url=CANONICAL_URL",
			"sign-up": "https://evening-springs-39131.herokuapp.com/account/login?rid=READER_ID&url=CANONICAL_URL"
		},
		"authorizationFallbackResponse": {
		"error": true,
		"user": false
		}
	}
	</script>
	
## Amp Components

	<script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
	<script async custom-element="amp-access" src="https://cdn.ampproject.org/v0/amp-access-0.1.js"></script>
	<script async custom-template="**amp-mustache**" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js"></script>
	<script async src="https://cdn.ampproject.org/v0.js"></script>

## Standfirst

The article preview can be achieved using the following markup, it will only be visible for user without premium access

	<div amp-access="NOT error AND NOT access”  amp-access-hide >
		<p class="standfirst">
		Lorem ipsum dolor sit amet, consectetur adipiscing elit.
		Curabitur ullamcorper turpis vel commodo scelerisque. Phasellus
		luctus nunc ut elit cursus, et imperdiet diam vehicula.
		</p>
	</div>

## Premium content

Premium article can  protected using the following markup, it will only be visible for authenticated users with sufficient funds.

	<div amp-access="access" amp-access-hide class="article-body" itemprop="articleBody">
		<p>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit.
		Curabitur ullamcorper turpis vel commodo scelerisque. Phasellus
		luctus nunc ut elit cursus, et imperdiet diam vehicula.
		</p>
	</div>

## Agate Dialog

Include the following Mustache template where the agate dialog should be displayed. This can be customised as required.

<div amp-access="NOT error" class="amp-access-agate__container">
		<template amp-access-template type="amp-mustache">
		{{^wallet}}
				<main class="amp-access-agate__notice amp-access-agate__main">
					<p> We recently ditched banner ads on our site in favour of a more sustainable, less intrusive solution.</p> 
					<p>Just create a wallet with our payment partner Agate and you'll be good to go.</p>
					<p>
					Pay {{publisher.article_cost}} per article, no more that {{publisher.cap_cost}} per week</p>
				<button  on="tap:amp-access.login-sign-up" class='amp-access-agate__button' role="button" ref="buttonLogin">Pay per article</button>
					<footer>
						<p>Already have an account?  <a  on="tap:amp-access.login-sign-in" ref="buttonLogin">Login here</a>.</p>
					</footer>
				</main>
		{{/wallet}}
		{{#wallet}}
			<section  class="amp-access-agate__wallet">
				<header class="amp-access-agate__header">
					<div class="amp-access-agate__balance">
							<span class="amp-access-agate__balance__title">Available:</span>
							<span class="amp-access-agate__balance__amount" ref="balance">{{wallet.balance}}</span>
						</div>
						<button  on="tap:amp-access.login-top-up" class='amp-access-agate__button amp-access-agate__button--thin' role="button">Top up</button>
				</header>
				<main class="amp-access-agate__main">
					<section class="amp-access-agate__pricing">
						<div class="amp-access-agate__pricing__item amp-access-agate__pricing__item--first ">
							<div class="amp-access-agate__pricing__item__title">Price:</div>
							<div class="amp-access-agate__pricing__item__price">{{publisher.article_cost}} /article</div>
						</div>
						<div class="amp-access-agate__pricing__item">
							<div class="amp-access-agate__pricing__item__title">Free point:</div>
							<div class="amp-access-agate__pricing__item__price">{{publisher.cap_cost}}/week</div>
						</div>
					</section>
					<section class="amp-access-agate__gauge">
						{{#subscriber}}
							<p class="highlight">Subscriber</p>
							{{#freeUntilDate}}
								<p class="sub-text">(Free until {{wallet.freeUntilDate}})</p>
							{{/freeUntilDate}}
							{{/subscriber}}
						{{^subscriber}}
						<p><span ref="remainingUntilFree">{{wallet.remainingUntilFree}}</span> until free this week</p>
						<p class="sub-text">(updates on {{wallet.freeUntilDate}})</p>
						{{/subscriber}}
					</section>
					<footer>
						{{#warning}}
						<section ref="warning" class="amp-access-agate__warning">
							<p ref="warningText"  class="amp-access-agate__warning__text">{{warning}}</p>
						</section>
						{{/warning}}
						<button  on="tap:amp-access.login-sign-out" class='amp-access-agate__button amp-access-agate__button--secondary'>Logout</button>
					</footer>
					</main>
			</section>
			{{/wallet}} 
			<footer class="amp-access-agate__footer">
				<a href="http://www.agate.one/"  target="_blank" class="amp-access-agate__footer__brand">agate</a>
				{{#user}}
				<a ref="account" target="_blank" href="https://account-staging.agate.io/my-agate/account?jwt_token={{jwt_token}}"class="amp-access-agate__footer__account">My Account</a>
				{{/user}}
			</footer>
		</template>
	</div>