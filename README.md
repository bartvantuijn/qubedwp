# QubedWP Theme

QubedWP is a modern WordPress theme designed for flexibility, reusability, and consistency.

It leverages **ACF Pro** for custom content blocks and includes built-in **WooCommerce** integration.  
For site-specific customization, a `qubedwp-child` theme is provided.

---

## Features

- **Reusable ACF Pro blocks** – build pages with consistent components.
- **WooCommerce support** – custom templates for product pages, cart, and checkout.
- **Child theme support** – safely extend and override for specific projects.
- **Lightweight structure** – optimized for performance and maintainability.

---

## Installation

1. Clone this repository onto your server:

```bash
git clone https://github.com/bartvantuijn/qubedwp.git
```

2. Copy into your WordPress setup

Move the contents of the `wp-content` folder into your WordPress installation’s `wp-content`.

3. Activate the theme

In your WordPress dashboard:
`Appearance → Themes → Activate QubedWP`

4. (Optional) Activate the child theme

Use the `qubedwp-child` theme for project-specific customizations without touching the core theme.

---

## Usage

### Rendering blocks

QubedWP uses ACF Pro flexible content fields to manage blocks.
In your template, include:

```php
<?php get_template_part('template-parts/blocks'); ?>
```

Blocks are defined in ACF and rendered dynamically.

---

## License

QubedWP is licensed under the _Functional Source License, Version 1.1, MIT Future License_. It's free to use for
internal and non-commercial purposes, but it's not allowed to use a release for commercial purposes (competing use). See our [full license][license] for more details.

---

[license]: LICENSE.md