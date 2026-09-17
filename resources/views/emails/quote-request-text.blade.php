@if($forCustomer)
We received your quote request: {{ $company['name'] }}

Hi {{ $quote['name'] }},

Thank you for contacting {{ $company['name'] }}. Here is a copy of the quote details you submitted. We will get back to you soon.
@else
New quote request: {{ $company['name'] }}

A customer submitted a quote request. Full details are below.
@endif

Name: {{ $quote['name'] }}
Phone: {{ $quote['phone'] }}
Email: {{ $quote['email'] }}
Subject: {{ $quote['title'] }}

Message:
{{ $quote['message'] }}

@if($forCustomer)
Need urgent help? Call {{ $company['phone'] }} ({{ $company['availability'] }}).
@else
Reply to this email or call {{ $quote['phone'] }} to follow up.
@endif
