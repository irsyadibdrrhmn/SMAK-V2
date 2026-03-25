# School Website Transformation Guide (Laravel + Filament)

This project already has a working **news portal** flow in the front-end and admin panel.
The goal is to **reposition it as a school website** while keeping news as one feature.

---

## 1) Reframe the Information Architecture

Use this top-level menu:

1. Home
2. Profile
3. Academic
4. News
5. Gallery
6. Contact

Recommended page purpose:

- **Home**: hero/banner, principal greeting, quick profile, latest announcements, latest news.
- **Profile**: school history, vision, mission, organizational structure, facilities.
- **Academic**: curriculum, programs/majors, extracurriculars, achievements.
- **News**: keep existing article/category/author pages.
- **Gallery**: photos/videos of school activities.
- **Contact**: address, map embed, phone/WA/email, contact form.

---

## 2) Keep Existing News Module, Add School Modules

Your existing routes and controller already cover index/details/category/author/search for news.
Keep those routes and move them under a school-focused navigation label such as **News**.

Add new data modules:

- `school_profiles` (single row or editable singleton)
- `academic_programs`
- `school_achievements`
- `gallery_photos`
- `announcements` (optional but recommended)

Suggested minimal schema fields:

- `school_profiles`: `school_name`, `tagline`, `history`, `vision`, `mission`, `principal_name`, `principal_photo`, `address`, `phone`, `email`, `maps_embed`, `logo`.
- `academic_programs`: `name`, `description`, `cover`, `is_active`.
- `school_achievements`: `title`, `description`, `level`, `achievement_date`, `photo`, `is_featured`.
- `gallery_photos`: `title`, `photo`, `event_date`, `album`, `is_published`.
- `announcements`: `title`, `slug`, `content`, `publish_at`, `is_published`.

---

## 3) Implementation Sequence (Safe and Incremental)

### Step A — Create migrations and models

Run in order:

```bash
php artisan make:model SchoolProfile -m
php artisan make:model AcademicProgram -m
php artisan make:model SchoolAchievement -m
php artisan make:model GalleryPhoto -m
php artisan make:model Announcement -m
```

Then fill migration columns and run:

```bash
php artisan migrate
```

### Step B — Create Filament resources

Generate resources:

```bash
php artisan make:filament-resource SchoolProfile
php artisan make:filament-resource AcademicProgram
php artisan make:filament-resource SchoolAchievement
php artisan make:filament-resource GalleryPhoto
php artisan make:filament-resource Announcement
```

Implementation notes:

- For `SchoolProfile`, make it singleton-like (one record only).
- Use `FileUpload` for logo/principal photo/gallery photo.
- Use `RichEditor` or `MarkdownEditor` for long content.
- Add table filters for publish/featured status.

### Step C — Add front-end routes

Add routes for school pages while preserving current news routes:

- `/` (home, school-first + latest news)
- `/profile`
- `/academic`
- `/gallery`
- `/contact`
- `/news` (optional alias to old article listing section)

### Step D — Expand `FrontController`

Add methods:

- `profile()`
- `academic()`
- `gallery()`
- `contact()`

Home method should combine:

- School profile summary
- Featured announcements
- Latest/featured articles (existing logic)

### Step E — Blade layout + components

Refactor into reusable components:

- `resources/views/components/navbar.blade.php`
- `resources/views/components/footer.blade.php`
- `resources/views/components/page-hero.blade.php`

Then update pages:

- `front/index.blade.php`
- new: `front/profile.blade.php`, `front/academic.blade.php`, `front/gallery.blade.php`, `front/contact.blade.php`

---

## 4) UI/Branding Adjustments for a School Identity

- Replace generic news hero with school hero image + school tagline.
- Use school colors consistently in Tailwind config and components.
- Put school identity in header/footer:
  - full school name
  - address
  - contact
  - social links
- On home, place **news lower than school profile blocks** so users read it as a school site first.

---

## 5) Content Migration Plan (Important)

Before redesigning templates, prepare real content so pages do not look empty:

1. Collect profile text (history, vision/mission, principal message).
2. Collect 10–20 gallery photos with titles and dates.
3. Collect achievements data (title, level, date, description).
4. Prepare 3–5 announcements.
5. Keep existing news content and map categories to school-relevant topics if needed.

---

## 6) Suggested 7-Day Execution Plan

- **Day 1**: DB schema + models + migrations.
- **Day 2**: Filament resources + admin forms.
- **Day 3**: Routes/controller methods for profile/academic/gallery/contact.
- **Day 4**: Blade page scaffolding + navbar/footer restructure.
- **Day 5**: Styling/branding + responsive polishing.
- **Day 6**: Data entry/seeding + QA content checks.
- **Day 7**: UAT, bug fixes, deployment.

---

## 7) Definition of Done Checklist

Mark done only if all are true:

- [ ] School pages are accessible from navbar.
- [ ] News module still works (category/author/detail/search).
- [ ] Admin can manage profile, programs, gallery, achievements, announcements from Filament.
- [ ] Home clearly presents school identity first, news second.
- [ ] Mobile layout is usable.
- [ ] Contact info and map are accurate.

---

## 8) Quick Technical Checklist for This Repository

Use this command list during implementation:

```bash
php artisan optimize:clear
php artisan migrate
php artisan route:list
php artisan test
npm run build
```

If you want, the next step can be a concrete patch set:

1. migration files,
2. model classes,
3. Filament resources,
4. route/controller updates,
5. starter Blade templates.

