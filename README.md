# FlashJS Laravel UI

Reusable Laravel Blade components + a single JS library (`flashjs.js`) that wires up
Dropdowns, Modals, Select inputs (Select2 / Choices.js), Datepickers (Flatpickr),
Charts (Chart.js / ApexCharts) and Editors (Quill / Trix / SimpleMDE).

## Install

```bash
composer require sandip/flashjs-laravel-ui
```

If needed, add the service provider manually to `config/app.php`:

```php
Sandip\FlashJsUi\FlashJsServiceProvider::class,
```

Then publish assets:

```bash
php artisan vendor:publish --tag=flashjs-config
php artisan vendor:publish --tag=flashjs-js
php artisan vendor:publish --tag=flashjs-views
```

Install JS dependencies (example with Vite):

```bash
npm install jquery select2 choices.js flatpickr chart.js apexcharts quill simplemde trix
```

In `resources/js/app.js`:

```js
import './vendor/flashjs';
```

Then:

```bash
npm run dev
```

## Basic Usage

### Dropdown

```blade
<x-flash-dropdown label="User Menu">
    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Logout</a>
</x-flash-dropdown>
```

### Modal

```blade
<x-flash-modal id="deleteModal" title="Delete record?">
    <p>Are you sure?</p>
</x-flash-modal>
```

### Select

```blade
<x-flash-select name="tags[]" multiple lib="choices">
    <option value="php">PHP</option>
    <option value="laravel">Laravel</option>
</x-flash-select>
```

### Datepicker

```blade
<x-flash-datepicker name="event_date" mode="single" />
```

### Chart

```blade
<x-flash-chart
    type="bar"
    :data="[
        'labels' => ['Jan', 'Feb', 'Mar'],
        'datasets' => [[ 'label' => 'Sales', 'data' => [10, 20, 30] ]]
    ]"
/>
```

### Editor

```blade
<x-flash-editor name="body" engine="quill">
    {!! old('body') !!}
</x-flash-editor>
```

You can extend this package with Accordion, Tabs, Tooltips, Carousels, Notifications
by following the existing pattern: Blade component + `data-flash-*` attributes + JS init in `flashjs.js`.
