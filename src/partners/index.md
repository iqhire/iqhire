---
layout: page
title: Partners
id: partners
---

<div class="partners">
  {% for partner in site.data.partners %}

  {% capture descriptionpath %}partners/{{ partner.id }}.md{% endcapture %}
  {% capture description %}{% include {{descriptionpath}} %}{% endcapture %}

  <div class="partner">
    <h2 class="partner__name">{{ partner.name }}</h2>
    <div class="partner__logo"><img src="/assets/img/partners/{{ partner.id }}.png" alt="{{ partner.name }} Logo"></div>
    <div class="partner__description">{{ description | markdownify }}</div>
    <div class="partner__cta"><a href="{{ partner.url }}">{{ partner.name }}'s Website</a></div>
  </div>
  {% endfor %}
</div>