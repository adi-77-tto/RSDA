# Welfare Template Integration Guide

## What Has Been Completed

### 1. Core Layout Updates
- ✅ Updated `resources/views/main.blade.php` with Welfare template dependencies
- ✅ Added Google Fonts (Dosis, Overpass)
- ✅ Added Bootstrap 4.6.2 (template uses BS4)
- ✅ Added Owl Carousel, AOS animations, Ionicons
- ✅ Updated JavaScript dependencies

### 2. Styling Framework
- ✅ Created `public/css/welfare-integration.css` with complete template styling
- ✅ Dark navbar styling (`.ftco_navbar`)
- ✅ Hero sections with overlays
- ✅ Card components (`.cause-entry`, `.blog-entry`)
- ✅ Counter sections (`.ftco-counter`)
- ✅ Footer styling (`.ftco-footer`)
- ✅ Buttons and utilities

### 3. Header/Navigation
- ✅ Updated `resources/views/header.blade.php` to dark navbar theme
- ✅ All existing menu items and links preserved
- ✅ Dropdown functionality maintained
- ✅ All routes unchanged

## Key Template Style Classes

### Layout Sections
```html
<!-- Full-width section -->
<section class="ftco-section">
    <div class="container">
        <!-- Content -->
    </div>
</section>

<!-- With background color -->
<section class="ftco-section bg-light">
    <!-- Light gray background -->
</section>

<!-- Hero section with background image -->
<div class="hero-wrap" style="background-image: url('...');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center">
            <!-- Hero content -->
        </div>
    </div>
</div>
```

### Card Components

#### Project/Cause Cards
```html
<div class="col-md-4 ftco-animate">
    <div class="cause-entry">
        <a href="#" class="img" style="background-image: url(...);"></a>
        <div class="text p-3 p-md-4">
            <h3><a href="#">Project Title</a></h3>
            <p>Description text...</p>
            
            <!-- Optional: Progress bar for projects -->
            <div class="progress custom-progress-success">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 28%"></div>
            </div>
        </div>
    </div>
</div>
```

#### Blog/News Cards
```html
<div class="col-md-4 d-flex ftco-animate">
    <div class="blog-entry align-self-stretch">
        <a href="#" class="block-20" style="background-image: url(...);"></a>
        <div class="text p-4 d-block">
            <div class="meta mb-3">
                <div><a href="#">Date</a></div>
                <div><a href="#">Author</a></div>
            </div>
            <h3 class="heading mt-3"><a href="#">Title</a></h3>
            <p>Description...</p>
        </div>
    </div>
</div>
```

#### Service/Feature Blocks
```html
<div class="col-md-4 d-flex align-self-stretch ftco-animate">
    <div class="media block-6 d-flex services p-3 py-4 d-block">
        <div class="icon d-flex mb-3">
            <span class="fas fa-heart"></span>
        </div>
        <div class="media-body pl-4">
            <h3 class="heading">Title</h3>
            <p>Description text...</p>
        </div>
    </div>
</div>
```

### Counter/Stats Section
```html
<section class="ftco-counter ftco-intro" id="section-counter">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 color-1 align-items-stretch">
                    <div class="text">
                        <span>Label</span>
                        <strong class="number" data-number="1432805">0</strong>
                        <span>Description</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
```

### Section Headings
```html
<div class="row justify-content-center mb-5 pb-3">
    <div class="col-md-7 heading-section ftco-animate text-center">
        <h2 class="mb-4">Section Title</h2>
        <p>Description of the section content...</p>
    </div>
</div>
```

## How to Apply to Existing Pages

### Pattern for List Pages (Projects, News, etc.)

1. **Wrap content in ftco-section:**
```html
<section class="ftco-section">
    <div class="container">
        <!-- Existing content -->
    </div>
</section>
```

2. **Replace card structure:**
OLD:
```html
<div class="col">
    <div class="card shadow border-0">
        <img src="..." class="card-img-top">
        <div class="card-body">
            <!-- Content -->
        </div>
    </div>
</div>
```

NEW:
```html
<div class="col-md-4 ftco-animate">
    <div class="cause-entry">
        <a href="#" class="img" style="background-image: url(...);"></a>
        <div class="text p-3 p-md-4">
            <!-- Content -->
        </div>
    </div>
</div>
```

3. **Add breadcrumbs for sub-pages:**
```html
<div class="hero-wrap" style="background-image: url('...');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-7 ftco-animate text-center">
                <p class="breadcrumbs">
                    <span class="mr-2"><a href="{{ url('/') }}">Home</a></span> 
                    <span>{{ $pageTitle }}</span>
                </p>
                <h1 class="mb-3 bread">{{ $pageTitle }}</h1>
            </div>
        </div>
    </div>
</div>
```

### Pattern for Detail Pages

Replace breadcrumbs section with hero-wrap and style content with `.ftco-section`:

```html
<div class="hero-wrap" style="background-image: url('...');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-7 ftco-animate text-center">
                <p class="breadcrumbs">
                    <span class="mr-2"><a href="{{ url('/') }}">Home</a></span> 
                    <span class="mr-2"><a href="{{ route('ongoing.project') }}">Projects</a></span>
                    <span>{{ $project->title }}</span>
                </p>
                <h1 class="mb-3 bread">{{ $project->title }}</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <!-- Existing detail content -->
    </div>
</section>
```

## Button Styling

Update button classes:
- `btn-danger` remains the same (now styled as orange `#f86f2d`)
- `btn-primary` → Orange button
- `btn-white` → White button with hover effect

```html
<a href="#" class="btn btn-primary px-4 py-3">Learn More</a>
<a href="#" class="btn btn-white px-4 py-3">Get Started</a>
```

## Animation Classes

Add `ftco-animate` class to elements you want to animate on scroll:

```html
<div class="col-md-4 ftco-animate">
    <!-- Content will fade-in when scrolling -->
</div>
```

AOS is initialized automatically in main.blade.php.

## Color Scheme

Template primary colors (already in CSS):
- Primary Orange: `#f86f2d`
- Hover Orange: `#fe5810`
- Light Orange: `#ffa45c`
- Info Blue: `#17a2b8`
- Dark Background: `#000000`

## Next Steps - File-by-File

### Priority 1 - Homepage (`home.blade.php`)
1. Update slider section to use `.hero-wrap`
2. Convert "Who We Are" to `.ftco-section`
3. Update ongoing projects cards to `.cause-entry`
4. Update news cards to `.blog-entry`
5. Update footer reference to use new footer (when updated)

### Priority 2 - Project Pages
- `resources/views/frontend/ongoing_project.blade.php`
- `resources/views/frontend/project_view.blade.php`
- Apply breadcrumb hero section
- Convert cards to `.cause-entry` format

### Priority 3 - About Pages
- `resources/views/frontend/about_us.blade.php`
- `resources/views/frontend/mission_vision.blade.php`
- Add hero sections with breadcrumbs
- Use `.ftco-section` for content areas

### Priority 4 - Programs
- `resources/views/frontend/programs.blade.php`
- `resources/views/frontend/featured_prog_view.blade.php`
- Already partially updated with dynamic content

### Priority 5 - Contact & Forms
- `resources/views/frontend/contact.blade.php`
- `resources/views/frontend/donate.blade.php`
- Style forms with template form classes

## Footer Update (Recommended)

Update `resources/views/footer.blade.php` to use `.ftco-footer` class:

```html
<footer class="ftco-footer ftco-section img" style="background-color: #000;">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-4">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">About RSDA</h2>
                    <!-- Logo and description -->
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-4">
                        <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                        <!-- Other social links -->
                    </ul>
                </div>
            </div>
            <!-- Other footer columns -->
        </div>
    </div>
</footer>
```

## Testing Checklist

After applying changes:
- [ ] All navigation links work
- [ ] Dropdown menus function correctly
- [ ] Forms submit properly
- [ ] All images load
- [ ] Responsive design works on mobile
- [ ] Animations trigger on scroll
- [ ] Back-to-top button appears and functions
- [ ] All routes remain unchanged
- [ ] Database queries work

## Important Notes

1. **No Functionality Changes**: All Laravel routes, controllers, and business logic remain unchanged
2. **Bootstrap 4**: Template uses BS4, not BS5. Some class names differ (ml-auto vs ms-auto, etc.)
3. **Animations**: Elements with `ftco-animate` class animate on scroll via AOS
4. **Images**: Use `background-image` style for card images in template format
5. **Colors**: Template primary is orange, not your original green (#a1ae1c)

## Support Files Created

1. `public/css/welfare-integration.css` - Complete template styles
2. `resources/views/header.blade.php` - Updated dark navbar
3. `resources/views/main.blade.php` - Updated with template dependencies

## Quick Win: Homepage Hero Section Example

Replace your current slider section with:

```html
<div class="hero-wrap" style="background-image: url('{{ asset('images/slider/'.$slider->image) }}');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-7 ftco-animate text-center">
                <h1 class="mb-4">{{ $slider->title }}</h1>
                <p class="mb-5">{{ $slider->description }}</p>
                <p><a href="{{ route('donate') }}" class="btn btn-primary px-4 py-3">
                    <span class="fas fa-hand-holding-usd mr-2"></span>Donate Now
                </a></p>
            </div>
        </div>
    </div>
</div>
```

This guide provides the complete pattern for transforming your entire site to match the Welfare template styling while preserving all existing functionality.
