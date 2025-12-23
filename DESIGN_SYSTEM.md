# 🎨 Design System - unforgettwblestuff

## 📋 Overview

Design system untuk website penjualan aksesori dengan fokus pada:
- **Modern & Clean**: Desain minimalis yang tidak ramai
- **User-Friendly**: Navigasi intuitif dan mudah digunakan
- **Conversion-Focused**: CTA yang jelas dan menarik
- **Responsive**: Optimal di semua device (mobile, tablet, desktop)

---

## 🎨 Color Palette

### Primary Colors (Aksen)
- **Rose 600**: `#e11d48` - Warna utama untuk CTA, hover states, dan aksen
- **Rose 500**: `#f43f5e` - Variasi untuk gradient dan highlights
- **Pink 500**: `#ec4899` - Untuk gradient dan accent

### Neutral Colors
- **Neutral 900**: `#171717` - Text utama (dark mode: Neutral 100)
- **Neutral 700**: `#404040` - Text sekunder
- **Neutral 500**: `#737373` - Text tersier
- **Neutral 200**: `#e5e5e5` - Border
- **Neutral 100**: `#f5f5f5` - Background sekunder
- **Neutral 50**: `#fafafa` - Background utama
- **White**: `#ffffff` - Card background

### Semantic Colors
- **Success (Emerald)**: `#10b981` - Stok tersedia, success states
- **Warning (Amber)**: `#f59e0b` - Perhatian
- **Error (Red)**: `#ef4444` - Stok habis, error states

---

## 📝 Typography

### Font Family
- **Primary**: `Instrument Sans` (sans-serif)
- **Fallback**: System UI fonts

### Font Sizes
- **Display (Hero)**: `text-4xl sm:text-5xl lg:text-6xl` (36-60px)
- **Heading 1**: `text-3xl sm:text-4xl` (30-36px)
- **Heading 2**: `text-2xl sm:text-3xl` (24-30px)
- **Heading 3**: `text-xl sm:text-2xl` (20-24px)
- **Body Large**: `text-lg` (18px)
- **Body**: `text-base` (16px)
- **Body Small**: `text-sm` (14px)
- **Caption**: `text-xs` (12px)

### Font Weights
- **Bold**: `font-bold` (700) - Headings, CTA
- **Semibold**: `font-semibold` (600) - Subheadings, buttons
- **Medium**: `font-medium` (500) - Navigation, labels
- **Regular**: `font-normal` (400) - Body text

---

## 🧩 Components

### ProductCard
**Lokasi**: `resources/js/components/ProductCard.vue`

**Features**:
- Hover effect dengan scale dan shadow
- Quick action overlay (Beli Sekarang) pada hover
- Badge untuk produk unggulan dan stok habis
- Responsive image dengan lazy loading
- Format harga otomatis (Rupiah)

**Usage**:
```vue
<ProductCard 
    :product="product" 
    :show-quick-action="true" 
/>
```

**Props**:
- `product`: Object produk (id, name, slug, featured_image, price, stock, is_featured)
- `show-quick-action`: Boolean untuk menampilkan quick action overlay

---

### EmptyState
**Lokasi**: `resources/js/components/EmptyState.vue`

**Features**:
- Icon yang dapat dikustomisasi
- Title dan description
- Slot untuk custom content

**Usage**:
```vue
<EmptyState 
    title="Tidak ada produk"
    description="Belum ada produk yang tersedia."
/>
```

---

### LoadingSpinner
**Lokasi**: `resources/js/components/LoadingSpinner.vue`

**Features**:
- 3 ukuran: sm, md, lg
- Optional text
- Smooth animation

**Usage**:
```vue
<LoadingSpinner size="md" text="Memuat produk..." />
```

---

## 🎯 Layout Components

### PublicLayout
**Lokasi**: `resources/js/layouts/PublicLayout.vue`

**Features**:
- Sticky navbar dengan backdrop blur
- Mobile menu yang responsif
- Footer dengan informasi lengkap
- Smooth scroll behavior

**Sections**:
1. **Navbar**: Logo, navigation links, CTA button
2. **Main Content**: Slot untuk page content
3. **Footer**: Brand info, quick links, contact info

---

## 📄 Page Templates

### Home Page
**Lokasi**: `resources/js/pages/public/Home.vue`

**Sections**:
1. **Hero Section**: 
   - Gradient background dengan blur effects
   - Headline dengan gradient text
   - Dual CTA buttons (Primary & Secondary)
   - Trust badges

2. **Features Section**:
   - 4 feature cards dengan icons
   - Grid layout (responsive)

3. **Featured Products**:
   - Grid of ProductCard components
   - Empty state jika tidak ada produk
   - Link ke full catalog

4. **How It Works**:
   - 3-step process dengan numbered badges
   - Visual separator lines

---

### Catalog Page
**Lokasi**: `resources/js/pages/public/Catalog.vue`

**Features**:
- Breadcrumb navigation
- View mode toggle (grid/list) - optional
- Product grid dengan ProductCard
- Pagination dengan styling konsisten
- Empty state

---

### Product Detail Page
**Lokasi**: `resources/js/pages/public/ProductDetail.vue`

**Sections**:
1. **Product Image**: Large image dengan placeholder
2. **Product Info**:
   - Title & price
   - Stock badge
   - Description
   - Metadata (bahan, ukuran, dll)
3. **CTA Buttons**:
   - Primary: Beli via WhatsApp (disabled jika stok habis)
   - Secondary: Tambah ke Wishlist
4. **Trust Badges**: Original, Pengiriman, Garansi

---

## 🎭 States & Interactions

### Hover States
- **Cards**: `hover:-translate-y-1 hover:shadow-xl` - Lift effect
- **Buttons**: `hover:scale-105 hover:shadow-lg` - Scale & shadow
- **Links**: `hover:text-rose-600` - Color change
- **Images**: `group-hover:scale-110` - Zoom effect

### Active States
- **Buttons**: `active:scale-95` - Press effect
- **Navigation**: Active link dengan underline atau background

### Loading States
- Skeleton loaders untuk images
- Spinner untuk async operations
- Disabled state untuk buttons

### Empty States
- Icon + message
- Optional CTA button
- Friendly, helpful messaging

---

## 📱 Responsive Breakpoints

Menggunakan Tailwind CSS default breakpoints:

- **sm**: `640px` - Mobile landscape, small tablets
- **md**: `768px` - Tablets
- **lg**: `1024px` - Desktop
- **xl**: `1280px` - Large desktop
- **2xl**: `1536px` - Extra large desktop

### Grid Layouts
- **Mobile**: 1 column
- **Tablet (sm)**: 2 columns
- **Desktop (lg)**: 3-4 columns
- **Large Desktop (xl)**: 4 columns

---

## 🎨 Spacing System

Menggunakan Tailwind spacing scale (4px base):

- **xs**: `0.5rem` (8px) - Tight spacing
- **sm**: `1rem` (16px) - Small spacing
- **md**: `1.5rem` (24px) - Medium spacing
- **lg**: `2rem` (32px) - Large spacing
- **xl**: `3rem` (48px) - Extra large spacing
- **2xl**: `4rem` (64px) - Section spacing

---

## 🎯 CTA (Call-to-Action) Guidelines

### Primary CTA
- **Color**: Rose 600 background, white text
- **Size**: `px-8 py-4` (large), `px-6 py-3` (medium)
- **Style**: Rounded-full, shadow-lg
- **Hover**: Scale 105%, shadow-xl, darker background
- **Usage**: Main actions (Beli, Hubungi, Lihat Katalog)

### Secondary CTA
- **Color**: White/transparent background, border, dark text
- **Size**: Same as primary
- **Style**: Rounded-full, border-2
- **Hover**: Border color change, background tint
- **Usage**: Alternative actions (Wishlist, Learn More)

### Button Icons
- Always include icon untuk visual clarity
- Icon size: `h-5 w-5` untuk buttons
- Gap: `gap-2` atau `gap-3` antara icon dan text

---

## 🖼️ Image Guidelines

### Product Images
- **Aspect Ratio**: 1:1 (square) untuk consistency
- **Format**: WebP preferred, fallback JPG/PNG
- **Loading**: Lazy loading untuk performance
- **Placeholder**: Neutral background dengan icon
- **Hover**: Scale 110% dengan smooth transition

### Image Sizes
- **Thumbnail**: 200x200px
- **Card**: 400x400px
- **Detail**: 800x800px atau lebih besar

---

## ✨ Animation Guidelines

### Transitions
- **Duration**: 300ms untuk most interactions
- **Easing**: Default (ease-in-out)
- **Properties**: transform, opacity, colors

### Key Animations
1. **Card Hover**: Translate Y + Shadow
2. **Button Hover**: Scale + Shadow
3. **Image Hover**: Scale (zoom)
4. **Menu Toggle**: Opacity + Transform
5. **Page Load**: Fade in

---

## 🎨 Dark Mode Support

Semua komponen mendukung dark mode melalui:
- CSS variables dengan `.dark` class
- Automatic color switching
- Maintained contrast ratios
- Consistent styling

**Toggle**: Via `useAppearance` composable (jika diperlukan)

---

## 📋 Best Practices

### Do's ✅
- Gunakan komponen reusable (ProductCard, EmptyState, dll)
- Konsisten dengan spacing dan typography
- Test di berbagai screen sizes
- Gunakan semantic HTML
- Optimize images (lazy loading, proper sizes)
- Include loading dan empty states
- Clear CTA buttons dengan icons

### Don'ts ❌
- Jangan hardcode colors (gunakan CSS variables)
- Jangan skip hover states
- Jangan lupa empty states
- Jangan gunakan terlalu banyak warna
- Jangan buat spacing yang tidak konsisten
- Jangan lupa test di mobile

---

## 🔧 Customization

### Mengubah Warna Aksen
Edit `resources/css/app.css`:
```css
--primary: hsl(346 77% 50%); /* Rose 600 */
--accent: hsl(346 77% 50%);
```

### Mengubah Border Radius
Edit `resources/css/app.css`:
```css
--radius: 0.75rem; /* Default: 12px */
```

### Mengubah Font
Edit `resources/css/app.css`:
```css
--font-sans: 'Your Font', ui-sans-serif, system-ui, sans-serif;
```

---

## 📚 Resources

- **Tailwind CSS**: https://tailwindcss.com
- **Lucide Icons**: https://lucide.dev
- **Reka UI**: https://reka-ui.com
- **Color Palette**: Tailwind CSS Rose & Neutral scales

---

**Last Updated**: 2025-01-XX
**Version**: 1.0.0

