# FlashJS Laravel UI

## Configuration

Located at:

```
config/flashjs.php
```

Example:

```php
return [
    'default_chart' => 'chartjs',
    'editor' => 'quill',
];
```

## Roadmap

- Accordion component
- Tabs component
- Tooltips and Notifications
- Carousel support
- Tailwind/Bootstrap Themes
- FullCalendar integration

## Contributing

Contributions are welcome. Feel free to submit a Pull Request for new UI components or improvements.

## License

MIT License © Sandip Mandal

## Additional Links
- [Code](https://github.com/mrsandipmandal/flashjs-laravel-ui)
- [Issues](https://github.com/mrsandipmandal/flashjs-laravel-ui/issues)
- [Pull requests](https://github.com/mrsandipmandal/flashjs-laravel-ui/pulls)
- [Actions](https://github.com/mrsandipmandal/flashjs-laravel-ui/actions)
- [Projects](https://github.com/mrsandipmandal/flashjs-laravel-ui/projects)
- [Security](https://github.com/mrsandipmandal/flashjs-laravel-ui/security)
- [Insights](https://github.com/mrsandipmandal/flashjs-laravel-ui/pulse)

FlashJS Laravel UI is a reusable Laravel package that provides Blade components with automatic JavaScript initialization. It supports Dropdowns, Modals, Select inputs, Datepickers, Charts, and Rich Text Editors using a single JavaScript file (`flashjs.js`). This package is designed for Laravel 10 and 11 applications.

---

## Features

- Ready-to-use Blade components
- Single JavaScript initializer for all UI widgets
- Integration with popular frontend libraries:
  - Select2, Choices.js (Select Inputs)
  - Flatpickr (Datepicker)
  - Chart.js, ApexCharts (Charts)
  - Quill, Trix, SimpleMDE (Text Editors)
- Publishable Blade Views and Config
- Works smoothly with Vite

---

## Installation

### Install via Composer

```bash
composer require flashjs/flashjs-laravel-ui
```

If developing locally from cloned repository:

```jsonc
// composer.json of your Laravel project
"repositories": [
  {
    "type": "path",
    "url": "../flashjs-laravel-ui"
  }
]
```

```bash
composer require flashjs/flashjs-laravel-ui:"*"
```

### Publish Assets

```bash
php artisan vendor:publish --tag=flashjs-config
php artisan vendor:publish --tag=flashjs-js
php artisan vendor:publish --tag=flashjs-views
```

### JavaScript Setup (Vite)

Install frontend libraries:

```bash
npm install jquery select2 choices.js flatpickr chart.js apexcharts quill simplemde trix
```

Add FlashJS in `resources/js/app.js`:

```js
import './vendor/flashjs';
```

Build:

```bash
npm run dev
```

FlashJS automatically initializes components on load.

## Usage Examples

### Dropdown

```blade
<x-flash-dropdown label="Menu">
    <a href="#">Profile</a>
    <a href="#">Logout</a>
</x-flash-dropdown>
```

### Modal

```blade
<x-flash-modal id="exampleModal" title="Demo Modal">
    Modal content goes here.
</x-flash-modal>

<button data-flash-modal-open="exampleModal">Open Modal</button>
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
        'datasets' => [[ 'label' => 'Data', 'data' => [10,20,30] ]]
    ]"
/>
```

### Text Editor

```blade
<x-flash-editor name="content" engine="quill">
    {!! old('content') !!}
</x-flash-editor>
```

## Configuration

Located at:

```arduino
config/flashjs.php
```

Example:

```php
return [
    'default_chart' => 'chartjs',
    'editor' => 'quill',
];
```

## Roadmap

- Accordion component
- Tabs component
- Tooltips and Notifications
- Carousel support
- Tailwind/Bootstrap Themes
- FullCalendar integration

## Contributing

Contributions are welcome. Feel free to submit a Pull Request for new UI components or improvements.

## License

MIT License
© Sandip Mandal

---

All set! ✔  
If you want, I can:

✅ Commit this README.md directly to your GitHub repo  
✅ Add GitHub badges (version/downloads)  
✅ Add screenshots + examples folder  
✅ Publish to Packagist for global Composer installs

Would you like me to **push the update automatically** to your GitHub repo?