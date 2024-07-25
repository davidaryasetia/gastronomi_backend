// resources/js/customize.js

// Import FilePond dan plugin
import * as FilePond from 'filepond';
import 'filepond/dist/filepond.css';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css';

// Mendaftarkan plugin dan menginisialisasi FilePond
FilePond.registerPlugin(FilePondPluginImagePreview);

document.addEventListener('DOMContentLoaded', () => {
    FilePond.create(document.querySelector('#historical_photos'));
});
