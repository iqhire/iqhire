---
layout: page
section-id: partners
title: Partners
---

<div class="partners">
  {% for partner in site.data.partners %}
  <div class="partner">
    <h2 class="partner__name">{{ partner.name }}</h2>
    <div class="partner__logo"><img src="/assets/img/partners/{{ partner.id }}.png" alt="{{ partner.name }} Logo"></div>
    {% capture description %}{% include partners/{{partner.id}}.md %}{% endcapture %}
    <div class="partner__description">{{ description | markdownify }}</div>
    <div class="partner__cta"><a href="{{ partner.url }}">{{ partner.name }}'s Website</a></div>
  </div>
  {% endfor %}
</div>