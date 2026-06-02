# Landing Page KPM - Vue Components Architecture

Dokumentasi lengkap untuk component structure yang modular dan SOLID-compliant.

## 📁 Struktur Folder

```
resources/js/
├── Components/
│   ├── Home/
│   │   ├── HomePage.vue              # Container utama
│   │   ├── TopBar.vue                # Bar informasi di atas
│   │   ├── Navigation.vue            # Menu navigasi
│   │   ├── AnnouncementTicker.vue    # Ticker berita berjalan
│   │   ├── HeroSliderFull.vue        # Hero section dengan slider
│   │   ├── BreadCrumb.vue            # Breadcrumb navigation
│   │   └── WelcomeSection.vue        # Section sambutan
│   └── UI/
│       ├── Button.vue                # Tombol reusable
│       ├── SlideBadge.vue            # Badge untuk slide
│       ├── StatCell.vue              # Satu statistik cell
│       └── StatPanel.vue             # Panel statistik grid
├── composables/
│   └── useSlider.js                  # Logic slider/carousel
├── utilities/
│   └── colorTokens.js                # Design tokens warna
└── Pages/
    └── Home.vue                      # Page Inertia (Contoh)
```

## 🎯 SOLID Principles Implementation

### Single Responsibility (S)

- **Button.vue**: Hanya render tombol dengan variant
- **SlideBadge.vue**: Hanya render badge dengan animasi
- **StatCell.vue**: Hanya satu cell statistik
- **AnnouncementTicker.vue**: Hanya ticker berjalan

### Open/Closed (O)

- Component menerima `props` untuk customization
- Easy extend dengan props baru tanpa modifikasi component

### Liskov Substitution (L)

- Component UI dapat saling menggantikan (Button → Button dengan variant berbeda)
- Section component kompatibel dengan container parent

### Interface Segregation (I)

- Props minimal dan relevan
- Hanya terima data yang dibutuhkan, tidak excess props

### Dependency Inversion (D)

- Composables (`useSlider`) terpisah dari component
- Component tidak tergantung pada implementasi detail
- Data flow top-down, event emission bottom-up

## 📦 Component Details

### UI Components

#### Button.vue

```vue
<Button variant="primary" size="md" @click="handleClick">
  Klik Saya
</Button>
```

Props: `variant`, `size`, `disabled`, `loading`

#### SlideBadge.vue

```vue
<SlideBadge label="Kantor Penjaminan Mutu" :blinking="true" theme="dark" />
```

Props: `label`, `icon`, `blinking`, `theme`

#### StatCell.vue

```vue
<StatCell icon="🎓" value="A" suffix="+" label="Akreditasi Institusi" />
```

#### StatPanel.vue

```vue
<StatPanel :items="statisticsData" theme="light" />
```

### Section Components

#### TopBar.vue

- Informasi di atas navigasi
- Links & Social media links
- Fully customizable via props

#### Navigation.vue

- Main navigation menu
- Brand logo & name
- Action buttons
- Sticky positioning

#### AnnouncementTicker.vue

- Scrolling announcement text
- Pause on hover
- Configurable speed
- Dynamic items array

#### HeroSliderFull.vue

- Hero banner dengan slider
- Automatic rotation
- Touch swipe support
- Navigation controls
- Embedded StatPanel

#### BreadCrumb.vue

- Navigational trail
- Active state indicator
- Link support

#### WelcomeSection.vue

- Sambutan dari ketua
- Photo + quote + content
- Flexible data structure

### Composables

#### useSlider.js

```javascript
const {
    currentSlide, // Index slide aktif
    isPaused, // Pause state
    progressBar, // Ref untuk progress bar
    nextSlide, // Function next
    prevSlide, // Function prev
    goTo, // Goto specific slide
    touchStart, // Touch handler
    touchEnd, // Touch handler
} = useSlider(3, 6000); // total slides, delay
```

## 🎨 Design Tokens

File `utilities/colorTokens.js` berisi semua design tokens:

```javascript
export const colorTokens = {
    primary: {
        yellow: "#fddb00",
        red: "#ea1f27",
        blue: "#0780c2",
    },
    text: {
        ink: "#1c1c22", // Primary text
        mid: "#5a5a6a", // Secondary text
        dim: "#9898a8", // Tertiary text
    },
    base: {
        white: "#ffffff",
        gray: "#efefef",
        border: "#dedede",
    },
};
```

## 💻 Usage Example

### Option 1: Menggunakan HomePage Container

```vue
<script setup>
import HomePage from "@/Components/Home/HomePage.vue";
</script>

<template>
    <HomePage
        :config="{
            /* custom config */
        }"
    />
</template>
```

### Option 2: Compose Custom Layout

```vue
<script setup>
import TopBar from "@/Components/Home/TopBar.vue";
import Navigation from "@/Components/Home/Navigation.vue";
import HeroSliderFull from "@/Components/Home/HeroSliderFull.vue";
import WelcomeSection from "@/Components/Home/WelcomeSection.vue";
</script>

<template>
    <div>
        <TopBar />
        <Navigation />
        <HeroSliderFull />
        <WelcomeSection />
    </div>
</template>
```

### Option 3: Custom Individual Components

```vue
<script setup>
import Button from "@/Components/UI/Button.vue";
import SlideBadge from "@/Components/UI/SlideBadge.vue";
</script>

<template>
    <div>
        <SlideBadge label="My Badge" />
        <Button variant="primary" @click="handleClick"> Click Me </Button>
    </div>
</template>
```

## 🔄 Data Flow

```
HomePage (Container)
├── TopBar (presentational)
├── Navigation (presentational)
├── AnnouncementTicker (presentational)
├── HeroSliderFull (smart)
│   ├── useSlider (composable)
│   └── StatPanel (presentational)
├── BreadCrumb (presentational)
└── WelcomeSection (presentational)
```

## 🧪 Testing

Setiap component dapat ditest secara independent:

```javascript
// Button.spec.js
import { mount } from "@vue/test-utils";
import Button from "@/Components/UI/Button.vue";

test("button renders with variant", () => {
    const wrapper = mount(Button, {
        props: { variant: "primary" },
        slots: { default: "Click Me" },
    });
    expect(wrapper.find("button").exists()).toBe(true);
});
```

## 🚀 Best Practices

1. **Props Validation**: Semua props memiliki validator
2. **Scoped Styles**: Semua style menggunakan `scoped` untuk CSS isolation
3. **Composition**: Prefer composition daripada inheritance
4. **Naming**: Descriptive component names (`HeroSliderFull` bukan `Slider1`)
5. **Comments**: Dokumentasi di JSDoc untuk public APIs

## 📝 Customization

### Mengubah Warna

Edit `utilities/colorTokens.js` atau gunakan CSS variables:

```css
:root {
    --Y: #fddb00; /* Yellow */
    --R: #ea1f27; /* Red */
    --B: #0780c2; /* Blue */
}
```

### Menambah Slide Baru

```vue
<HeroSliderFull
    :slides="[
  ...defaultSlides,
  {
    id: 4,
    theme: 'blue',
    badge: { label: 'New Slide', icon: '🔴' },
    title: 'New Title',
    description: 'Description',
    buttons: [...],
    stats: [...],
  }
]"
/>
```

## 🐛 Troubleshooting

**Hero Slider tidak berjalan?**

- Check ref `progressBar` sudah terikat dengan element yang tepat
- Pastikan composable `useSlider` di-mount dengan benar

**Ticker tidak smooth?**

- Sesuaikan `speed` prop, default 30s
- Check gap size di CSS `@keyframes ticker-scroll`

**Warna tidak sesuai?**

- Verify CSS variables di root element
- Check `theme` prop di component

## 📚 Resources

- Vue 3 Composition API: https://vuejs.org/guide/introduction.html
- SOLID Principles: https://en.wikipedia.org/wiki/SOLID
- Component Pattern: https://pattern.dev/

---

**Version**: 1.0.0  
**Last Updated**: 2026-06-02  
**Maintained By**: Development Team
