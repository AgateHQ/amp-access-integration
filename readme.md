# Agate amp-access integration


Check out a working [example](https://s3.eu-west-2.amazonaws.com/agate-amp/example.html) and the [source code](./src/example/index.html).


Please follow these intructions to integrate amp-access and Agate.

## Agate CSS
	<link href='https://s3.eu-west-2.amazonaws.com/agate-amp/style.css" rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
	
 ## Amp Access Configuration
   
	<script id="amp-access" type="application/json">
	{
		"authorization": "http://localhost:8002/api/authorization?rid=READER_ID&url=CANONICAL_URL",
		"noPingback": true,
		"login": {
			"sign-in": "http://localhost:8002/account/login?rid=READER_ID&url=CANONICAL_URL",
			"sign-out": "http://localhost:8002/account/logout?rid=READER_ID&url=CANONICAL_URL",
			"register": "http://localhost:8001/account/login?rid=READER_ID&url=CANONICAL_URL"
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

	<div class="amp-access-agate-container">
		<div class="amp-access-agate__main">
			
			// Page notice for authenticated user
			<section amp-access="NOT user" class="amp-access-agate__notice">
				<template amp-access-template type="amp-mustache">
					<p>We recently ditched banner ads on our site in favour of a more sustainable, less intrusive solution.</p>
					<p>Just create a wallet with our payment partner Agate and you'll be good to go.</p>
					<p>Pay {{publisher.article_cost}} per article, no more that {{publisher.cap_cost}} per week</p>
					<button  on="tap:amp-access.login-sign-in" class='amp-access-agate-button' role="button" ref="buttonLogin">Pay per article</button>
					<button  on="tap:amp-access.login-register" class='amp-access-agate-button' role="button" ref="buttonLogin">Register</button>
				</template>
			</section>
			
			// wallet view non authenticated user
			<section amp-access="user" >
				<template amp-access-template type="amp-mustache">
					<section class="amp-access-agate__balance">
						<h1 class="amp-access-agate__balance__title">Your Wallet balance:</h1>
						<p class="amp-access-agate__balance__amount" ref="balance" class="">{{wallet.balance}}</p>
						</section>
						<section class="amp-access-agate__gauge">
							<p><span ref="remainingUntilFree">{{wallet.remainingUntilFree}}</span>  until free</p>
					</section>
					<button  on="tap:amp-access.login-sign-out" class='amp-access-agate-button' role="button" ref="buttonLogout">Logout</button>
					{{#warning}}
						<section ref="warning" class="amp-access-agate__warning">
							<p ref="warningText"  class="amp-access-agate__warning__text">{{warning}}</p>
						</section>
					{{/warning}}
				</template>
			</section>
			
			// agate footer
			<section amp-access="publisher" >
				<template amp-access-template type="amp-mustache">
				<footer class="amp-access-agate__footer">
					<a href="http://www.agate.one/"  target="blank" class="amp-access-agate__footer__brand">agate</a>
					{{#user}}
						<a ref="account" target="blank" href=“{{account}}”class="amp-access-agate__footer__account">My Account</a>
					{{/user}}
				</footer>
				</template>
			</section>
			
		</div>
	</div>