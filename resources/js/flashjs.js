// flashjs.js
// Central JS init file for flashjs-laravel-ui

import $ from 'jquery';
import 'select2';
import Choices from 'choices.js';
import flatpickr from 'flatpickr';
import Chart from 'chart.js/auto';
import ApexCharts from 'apexcharts';
import Quill from 'quill';
import SimpleMDE from 'simplemde';
import 'trix';

const FlashJS = {
    initDropdowns() {
        document.querySelectorAll('[data-flash-dropdown]').forEach(dropdown => {
            const toggle = dropdown.querySelector('[data-flash-dropdown-toggle]');
            const menu = dropdown.querySelector('[data-flash-dropdown-menu]');
            if (!toggle || !menu) return;

            toggle.addEventListener('click', e => {
                e.stopPropagation();
                menu.classList.toggle('hidden');
            });

            document.addEventListener('click', () => {
                menu.classList.add('hidden');
            });
        });
    },

    initModals() {
        document.querySelectorAll('[data-flash-modal]').forEach(modal => {
            const id = modal.id;

            document.querySelectorAll(`[data-flash-modal-open="${id}"]`)
                .forEach(btn => btn.addEventListener('click', () => {
                    modal.classList.remove('hidden');
                }));

            modal.querySelectorAll('[data-flash-modal-close]')
                .forEach(btn => btn.addEventListener('click', () => {
                    modal.classList.add('hidden');
                }));

            modal.addEventListener('click', e => {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });
    },

    initSelects() {
        document.querySelectorAll('[data-flash-select]').forEach(select => {
            const lib = select.dataset.flashSelectLib || 'select2';
            const search = select.dataset.flashSelectSearch === '1';

            if (lib === 'select2') {
                $(select).select2({
                    minimumResultsForSearch: search ? 0 : Infinity
                });
            } else if (lib === 'choices') {
                new Choices(select, {
                    searchEnabled: search
                });
            }
        });
    },

    initDatepickers() {
        document.querySelectorAll('[data-flash-datepicker]').forEach(input => {
            const lib = input.dataset.flashDatepickerLib || 'flatpickr';
            const mode = input.dataset.flashDatepickerMode || 'single';
            const enableTime = input.dataset.flashDatepickerTime === '1';

            if (lib === 'flatpickr') {
                flatpickr(input, {
                    mode,
                    enableTime
                });
            }
        });
    },

    initCharts() {
        document.querySelectorAll('[data-flash-chart]').forEach(el => {
            const engine = el.dataset.flashChartEngine || 'chartjs';
            const type = el.dataset.flashChartType || 'line';
            const data = JSON.parse(el.dataset.flashChartData || '{}');
            const options = JSON.parse(el.dataset.flashChartOptions || '{}');
            const id = el.dataset.flashChartId;

            if (engine === 'chartjs') {
                const canvas = document.getElementById(id);
                if (!canvas) return;
                const ctx = canvas.getContext('2d');
                new Chart(ctx, { type, data, options });
            } else if (engine === 'apex') {
                const target = document.getElementById(id);
                if (!target) return;
                const chart = new ApexCharts(target, {
                    chart: { type },
                    series: data.series || [],
                    xaxis: data.xaxis || {}
                });
                chart.render();
            }
        });
    },

    initEditors() {
        document.querySelectorAll('[data-flash-editor]').forEach(wrapper => {
            const engine = wrapper.dataset.flashEditorEngine || 'quill';
            const id = wrapper.dataset.flashEditorId;
            const textarea = wrapper.querySelector('textarea');
            const target = wrapper.querySelector('[data-flash-editor-target]');

            if (!textarea || !target) return;

            if (engine === 'quill') {
                const quill = new Quill(target, {
                    theme: 'snow'
                });
                quill.root.innerHTML = textarea.value;
                quill.on('text-change', () => {
                    textarea.value = quill.root.innerHTML;
                });
            } else if (engine === 'simplemde') {
                new SimpleMDE({ element: textarea });
            } else if (engine === 'trix') {
                // Basic Trix integration: you can expand this as needed.
                const hiddenInputId = id + '-trix-input';
                const hidden = document.createElement('input');
                hidden.type = 'hidden';
                hidden.id = hiddenInputId;
                hidden.value = textarea.value;
                textarea.after(hidden);

                const trix = document.createElement('trix-editor');
                trix.setAttribute('input', hiddenInputId);
                target.appendChild(trix);
            }
        });
    },

    initAll() {
        this.initDropdowns();
        this.initModals();
        this.initSelects();
        this.initDatepickers();
        this.initCharts();
        this.initEditors();
        // You can add Accordion, Tabs, Carousels, Tooltips, etc. later
    }
};

if (typeof window !== 'undefined') {
    window.FlashJS = FlashJS;
    document.addEventListener('DOMContentLoaded', () => {
        FlashJS.initAll();
    });
}

export default FlashJS;
