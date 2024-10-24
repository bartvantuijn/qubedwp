# QubedWP Theme

QubedWP is een op maat gemaakt WordPress thema dat gebruikmaakt van ACF Pro en WooCommerce. Het biedt een flexibele en herbruikbare structuur voor het bouwen van websites met consistente bouwblokken, met de mogelijkheid om aanpassingen per site te maken via het `qubedwp-child` thema.

## Inhoud
- [Installatie](#installatie)
- [Structuur](#structuur)
- [ACF Pro Bouwblokken](#acf-pro-bouwblokken)
- [Blokken Rendering](#blokken-rendering)
- [WooCommerce Integratie](#woocommerce-integratie)
- [QubedWP-child Thema](#qubedwp-child-thema)

## Installatie

1. **Download de repository**  
   Clone de repository naar je lokale omgeving:

   ```bash
   git clone https://github.com/bartvantuijn/wordpress.git
   ```

   Deze repository bevat de volledige `wp-content` map, inclusief de thema's en de ACF Pro plugin. Alle andere WordPress-bestanden worden genegeerd door de `.gitignore` in de root.

2. **Verplaats de inhoud naar je WordPress installatie**  
   Kopieer de inhoud van de `wp-content` map uit de repository naar de `wp-content` map van je WordPress installatie.

3. **Activeer het thema**  
   Activeer het `qubedwp` thema in het WordPress dashboard via **Weergave > Thema's**.

4. **Activeer het kindthema (optioneel)**  
   Het `qubedwp-child` thema kan worden gebruikt om site-specifieke aanpassingen te maken zonder het hoofdthema te wijzigen.

   Activeer daarna het kindthema via het WordPress dashboard.

## Structuur

Dit is de basisstructuur van het thema:

```
qubedwp/
├── template-parts/
│   └── blocks.php  // Bevat de logica voor het renderen van ACF blokken
├── functions.php   // Thema functies
├── style.css       // Thema stylesheet
├── woocommerce/    // WooCommerce template overrides
└── ... (andere bestanden)
```

### Bestanden en mappen

- **template-parts/blocks.php**: Dit bestand bevat de logica om bouwblokken dynamisch te laden.
- **functions.php**: Hier worden de kernfuncties van het thema geladen, inclusief het registreren van bouwblokken en thema-ondersteuning.
- **style.css**: Het hoofdbestand voor de thema-styling.
- **woocommerce/**: Bevat aangepaste WooCommerce templates voor productpagina’s, winkelmandjes, etc.

## ACF Pro Bouwblokken

QubedWP maakt gebruik van ACF Pro (Advanced Custom Fields) om herbruikbare bouwblokken te creëren die zijn geconfigureerd in de repository. Deze configuratie zorgt ervoor dat alle websites met dit thema dezelfde set bouwblokken hebben, wat een consistente opbouw van pagina’s mogelijk maakt.

### Blokken Types

Elke blok type dat in de ACF backend wordt ingesteld, kan worden toegevoegd aan de pagina's. Voorbeelden van blokken zijn:

- **Tekstblokken**
- **Afbeeldingen**
- **Video's**

## Blokken Rendering

Op elke pagina wordt het volgende template onderdeel aangeroepen om de blokken te renderen:

```php
<?php get_template_part('template-parts/blocks'); ?>
```

In `template-parts/blocks.php` wordt de blokken logica verwerkt op basis van de ingestelde blokken in WordPress. Een belangrijk onderdeel van deze logica is de variabele `$blockAccess`, die gebruikt wordt om per thema specifieke blokken aan en uit te kunnen zetten.

Een voorbeeld van de logica in `blocks.php`:

```php
<?php

if ( have_rows('blokken') ) :

    $blockAccess = get_field('instellingen_blokken', 'options');
    $blockCount = 0;

    while ( have_rows('blokken') ) : the_row();

        $blockCount++;
        $blockType = get_row_layout();

        $args = array(
            'blockCount' => $blockCount,
        );

        if ( $blockType == 'block-text' ) :

            if( $blockAccess && in_array('tekst', $blockAccess) ) :
                get_template_part('template-parts/blocks/block-text', null, $args);
            endif;

        elseif ( $blockType == 'block-image' ) :

            if( $blockAccess && in_array('afbeelding', $blockAccess) ) :
                get_template_part('template-parts/blocks/block-image', null, $args);
            endif;

        // Voeg meer blokken toe zoals nodig

    endwhile;

else :

    // No content blocks found
    echo '<div id="block" data-block-count="1"></div>';

endif;
```

## WooCommerce Integratie

QubedWP heeft ingebouwde ondersteuning voor WooCommerce, zodat je eenvoudig een webshop kunt toevoegen aan je WordPress website. Het thema bevat aangepaste templates voor productpagina’s, winkelmandjes, afrekeningen en meer.

De WooCommerce bestanden zijn te vinden in de map `woocommerce/`, waar je aanpassingen kunt maken zonder dat de kern WooCommerce bestanden worden overschreven.

## QubedWP-child Thema

Het `qubedwp-child` thema is bedoeld voor aanpassingen per specifieke website. Door het kindthema te gebruiken, kun je wijzigingen aanbrengen in de templates, functies of styling zonder het hoofdthema te wijzigen. Dit is de aanbevolen manier om site-specifieke aanpassingen door te voeren, zodat updates aan het hoofdthema geen wijzigingen overschrijven.
