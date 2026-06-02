# 🎯 Components Quick Reference Card

## Component Hierarchy

```
HomePage (Container)
├── TopBar
├── Navigation
├── AnnouncementTicker
├── HeroSliderFull
│   ├── useSlider (composable)
│   ├── SlideBadge
│   └── StatPanel
│       ├── StatCell (×4)
├── BreadCrumb
└── WelcomeSection
```

---

## UI Components

| Component    | Purpose       | Props                                       | Events   |
| ------------ | ------------- | ------------------------------------------- | -------- |
| `Button`     | Action button | `variant`, `size`, `disabled`, `loading`    | `@click` |
| `SlideBadge` | Badge label   | `label`, `icon`, `blinking`, `theme`        | -        |
| `StatCell`   | Single stat   | `icon`, `value`, `suffix`, `label`, `theme` | -        |
| `StatPanel`  | Stat grid     | `items[]`, `theme`                          | -        |

---

## Section Components

| Component            | Purpose        | Key Props                                |
| -------------------- | -------------- | ---------------------------------------- |
| `TopBar`             | Info bar       | `links[]`, `socialLinks[]`               |
| `Navigation`         | Main nav       | `brand`, `navLinks[]`, `actionButtons[]` |
| `AnnouncementTicker` | Scrolling text | `items[]`, `speed`                       |
| `HeroSliderFull`     | Hero section   | `slides[]`                               |
| `BreadCrumb`         | Nav trail      | `items[]`                                |
| `WelcomeSection`     | Sambutan       | `data`                                   |
| `HomePage`           | Full layout    | `config`                                 |

---

## Quick Copy-Paste

### Basic Button

```vue
<Button variant="primary" @click="handleClick">
  Click Me
</Button>
```

### Button Variants

```vue
<Button variant="primary" />
<!-- Yellow bg -->
<Button variant="secondary" />
<!-- Red bg -->
<Button variant="outline" />
<!-- Border only -->
```

### Button Sizes

```vue
<Button size="sm" />
<!-- 12px -->
<Button size="md" />
<!-- 14px (default) -->
<Button size="lg" />
<!-- 16px -->
```

### Badge

```vue
<SlideBadge label="Status" icon="🔴" theme="light" />
<SlideBadge label="Active" :blinking="true" />
```

### Stat Cell

```vue
<StatCell icon="🎓" value="A" suffix="+" label="Akreditasi" theme="light" />
```

### Stat Panel

```vue
<StatPanel
    :items="[
        { icon: '🎓', value: 'A', suffix: '+', label: 'Akreditasi' },
        { icon: '🏛️', value: '40', suffix: '+', label: 'Prodi' },
    ]"
    theme="light"
/>
```

### Navigation

```vue
<Navigation
    :brand="{ name: 'KPM', fullName: 'Kantor Penjaminan Mutu' }"
    :navLinks="[
        { label: 'Beranda', href: '#', active: true },
        { label: 'Profile', href: '#' },
    ]"
/>
```

### Hero Slider

```vue
<HeroSliderFull
    :slides="[
        {
            id: 1,
            theme: 'blue',
            badge: { label: 'Title', icon: '🔴' },
            title: 'Main <em>Title</em>',
            description: 'Description text...',
            buttons: [
                { label: '📋 Action', variant: 'primary' },
                { label: 'Secondary →', variant: 'secondary' },
            ],
            stats: [{ icon: '🎓', value: 'A', suffix: '+', label: 'Stat 1' }],
        },
    ]"
/>
```

### Ticker

```vue
<AnnouncementTicker :items="['🔔 News 1', '🔔 News 2']" :speed="30" />
```

### Breadcrumb

```vue
<BreadCrumb
    :items="[
        { label: 'Home', href: '/' },
        { label: 'KPM', href: '/kpm' },
        { label: 'Page', current: true },
    ]"
/>
```

---

## Theme Values

### Variants

- `primary` - Yellow background
- `secondary` - Red background
- `outline` - Border only

### Themes (for badges/panels)

- `light` - White/transparent background
- `dark` - Black/transparent background
- `accent` - Colored background

### Slide Themes

- `blue` - Blue gradient
- `red` - Red/yellow gradient
- `gold` - Gold/tan gradient

---

## Design Tokens (CSS Variables)

```css
/* Colors */
--Y: #fddb00; /* Primary Yellow */
--R: #ea1f27; /* Secondary Red */
--B: #0780c2; /* Tertiary Blue */
--INK: #1c1c22; /* Text Primary */
--MID: #5a5a6a; /* Text Mid */
--DIM: #9898a8; /* Text Dim */

/* Sizing */
--space-xs: 0.25rem --space-sm: 0.5rem --space-md: 1rem --space-lg: 1.5rem
    --space-xl: 2rem /* Typography */ --font-serif: "DM Serif Display"
    --font-sans: "DM Sans";
```

---

## Composables

### useSlider

```javascript
import { useSlider } from "@/composables/useSlider";

const {
    currentSlide, // Current slide index
    isPaused, // Pause state
    progressBar, // Ref for progress element
    nextSlide, // Go to next
    prevSlide, // Go to previous
    goTo, // Go to specific index
    touchStart, // Touch handler
    touchEnd, // Touch handler
} = useSlider(3, 6000); // (totalSlides, delayMs)
```

---

## Utility Classes

```html
<!-- Flexbox -->
<div class="flex flex-center gap-md">...</div>
<div class="flex flex-between">...</div>

<!-- Grid -->
<div class="grid-2">...</div>
<div class="grid-3">...</div>

<!-- Typography -->
<h1 class="text-3xl font-serif">...</h1>
<p class="text-mid">...</p>

<!-- Spacing -->
<div class="p-lg mx-auto">...</div>

<!-- Colors -->
<div class="bg-primary-yellow text-ink">...</div>

<!-- Effects -->
<div class="shadow-lg rounded-lg">...</div>
<div class="hover-lift transition-base">...</div>
```

---

## Common Patterns

### Full Page Layout

```vue
<HomePage
    :config="{ 
    topbar: { links: [...] },
    breadcrumbs: [...] 
  }"
/>
```

### Custom Layout

```vue
<TopBar />
<Navigation />
<section class="container">
  <h1>Custom Content</h1>
</section>
<WelcomeSection />
```

### List of Stats

```vue
<div class="grid-4 gap-md">
  <StatCell 
    v-for="stat in stats"
    :key="stat.id"
    v-bind="stat"
  />
</div>
```

---

## Responsive Breakpoints

```css
/* Mobile First */
default        /* < 640px */
@media (md)    /* ≥ 768px */
@media (lg)    /* ≥ 1024px */
@media (xl)    /* ≥ 1280px */
```

---

## File Locations

```
components/
  ├── UI/
  │   ├── Button.vue
  │   ├── SlideBadge.vue
  │   ├── StatCell.vue
  │   └── StatPanel.vue
  └── Home/
      ├── TopBar.vue
      ├── Navigation.vue
      ├── AnnouncementTicker.vue
      ├── BreadCrumb.vue
      ├── HeroSliderFull.vue
      ├── WelcomeSection.vue
      └── HomePage.vue

composables/
  └── useSlider.js

utilities/
  └── colorTokens.js

css/
  ├── app.css
  └── components.css

Pages/
  ├── Home.vue
  └── ComponentsDemo.vue
```

---

## Import Statements

```javascript
// UI Components
import Button from "@/Components/UI/Button.vue";
import SlideBadge from "@/Components/UI/SlideBadge.vue";
import StatCell from "@/Components/UI/StatCell.vue";
import StatPanel from "@/Components/UI/StatPanel.vue";

// Section Components
import TopBar from "@/Components/Home/TopBar.vue";
import Navigation from "@/Components/Home/Navigation.vue";
import AnnouncementTicker from "@/Components/Home/AnnouncementTicker.vue";
import HeroSliderFull from "@/Components/Home/HeroSliderFull.vue";
import BreadCrumb from "@/Components/Home/BreadCrumb.vue";
import WelcomeSection from "@/Components/Home/WelcomeSection.vue";
import HomePage from "@/Components/Home/HomePage.vue";

// Composables
import { useSlider } from "@/composables/useSlider";

// Utilities
import { colorTokens } from "@/utilities/colorTokens";
```

---

## Tips & Tricks

1. **Theme Props**: Setiap component dengan theme support bisa customize
2. **Props Validation**: Semua props sudah ada validator
3. **Scoped Styles**: Semua styles terpisah per component
4. **Composition**: Build UI dengan composing components
5. **Reactive**: Perubahan props otomatis update UI
6. **Mobile First**: Design responsive dari awal

---

## Debugging

```javascript
// Vue DevTools inspect component
// Cek props: component props panel
// Check emits: events panel
// Check state: component state panel

// Console tricks
console.log(this.$refs); // Access refs
console.log(this.$props); // Check props
console.log(this.$emit); // Check events
```

---

**Print This Card** → Quick reference saat development  
**Share with Team** → Onboarding developers baru  
**Version**: 1.0.0  
**Last Updated**: June 2, 2026
