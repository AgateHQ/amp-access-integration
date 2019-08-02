# AMP Notes


### Redirecting after a submission

You can redirect users to a new page after a successful form submission by setting the `AMP-Redirect-To` response header and specifying a redirect URL. The redirect URL must be a HTTPS URL, otherwise AMP will throw an error and redirection won't occur.  HTTP response headers are configured via your server.

Make sure to update your `Access-Control-Expose-Headers` response header to include `AMP-Redirect-To` to the list of allowed headers.  Learn more about these headers in [CORS Security in AMP](https://www.ampproject.org/docs/fundamentals/amp-cors-requests#cors-security-in-amp).

*Example response headers:*

```text
AMP-Redirect-To: https://example.com/forms/thank-you
Access-Control-Expose-Headers: AMP-Redirect-To
```

--

	Check out AMP By Example's [Form Submission with Update](https://amp.dev/documentation/examples/components/amp-form/#form-submission-with-page-update) and [Product Page](https://amp.dev/documentation/examples/e-commerce/product_page/#product-page) that demonstrate using redirection after a form submission.
