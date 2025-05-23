<div class="modal fade" id="iconModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen p-4">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex mb-4 gap-2 justify-content-between align-items-center ">
                    <div id="iconContainer">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to load all Bootstrap icons
    function loadIcons() {
        const iconContainer = document.getElementById('iconContainer');
        iconContainer.innerHTML = ''; // Clear previous icons


        bootstrapIcons.forEach(icon => {
            const iconElement = document.createElement('i');
            iconElement.classList.add('bi', icon);
            iconElement.classList.add('icon', 'p-1', 'm-1');
            iconElement.style.fontSize = '50px';
            iconElement.setAttribute('data-icon', icon);
            iconElement.addEventListener('click', handleClick);
            iconContainer.appendChild(iconElement);
        });
    }

    // Function to handle icon click event
    function handleClick(event) {
        const iconDisplay = document.getElementById('icon-display');
        const iconLayanan = document.getElementById('icon');
        const clickedIcon = event.target.getAttribute('data-icon');
        iconDisplay.classList.add(clickedIcon);
        iconLayanan.value = clickedIcon;
        alert('Icon Selected');
    }

    // Execute the function to load icons when the page is ready
    document.addEventListener('DOMContentLoaded', loadIcons);

    // List of Bootstrap icons (You can fetch this dynamically or have a static list)
    const bootstrapIcons = [
        "bi-alarm", "bi-align-bottom", "bi-align-center", "bi-align-end", "bi-align-middle", "bi-align-start",
        "bi-align-top", "bi-app", "bi-app-indicator", "bi-archive", "bi-arrow-90deg-down", "bi-arrow-90deg-left",
        "bi-arrow-90deg-right",
        "bi-arrow-90deg-up", "bi-arrow-bar-down", "bi-arrow-bar-left", "bi-arrow-bar-right", "bi-arrow-bar-up",
        "bi-arrow-clockwise", "bi-arrow-counterclockwise", "bi-arrow-down", "bi-arrow-down-circle",
        "bi-arrow-down-left", "bi-arrow-down-right", "bi-arrow-left", "bi-arrow-left-circle", "bi-arrow-left-right",
        "bi-arrow-right", "bi-arrow-right-circle", "bi-arrow-split", "bi-arrow-up", "bi-arrow-up-circle",
        "bi-arrow-up-left", "bi-arrow-up-right", "bi-arrows-angle-contract", "bi-arrows-angle-expand",
        "bi-arrows-collapse", "bi-arrows-expand", "bi-arrows-fullscreen", "bi-arrows-move", "bi-aspect-ratio",
        "bi-asterisk", "bi-at", "bi-award", "bi-back", "bi-backspace", "bi-backspace-reverse",
        "bi-backspace-reverse-fill", "bi-backspace-reverse-outline", "bi-backspace-reverse-rtl",
        "bi-backspace-reverse-solid", "bi-backspace-reverse-square", "bi-backward", "bi-badge", "bi-badge-3d",
        "bi-badge-4k", "bi-badge-4k-fill", "bi-badge-4k-outline", "bi-badge-4k-rtl", "bi-badge-4k-solid",
        "bi-badge-8k", "bi-badge-8k-fill", "bi-badge-8k-outline", "bi-badge-8k-rtl", "bi-badge-8k-solid",
        "bi-badge-ad", "bi-badge-ad-fill", "bi-badge-ad-outline", "bi-badge-ad-rtl", "bi-badge-ad-solid",
        "bi-badge-ar", "bi-badge-ar-fill", "bi-badge-ar-outline", "bi-badge-ar-rtl", "bi-badge-ar-solid",
        "bi-badge-cc", "bi-badge-cc-fill", "bi-badge-cc-outline", "bi-badge-cc-rtl", "bi-badge-cc-solid",
        "bi-badge-hd", "bi-badge-hd-fill", "bi-badge-hd-outline", "bi-badge-hd-rtl", "bi-badge-hd-solid",
        "bi-badge-tm", "bi-badge-tm-fill", "bi-badge-tm-outline", "bi-badge-tm-rtl", "bi-badge-tm-solid",
        "bi-badge-vo", "bi-badge-vo-fill", "bi-badge-vo-outline", "bi-badge-vo-rtl", "bi-badge-vo-solid",
        "bi-badge-vr", "bi-badge-vr-fill", "bi-badge-vr-outline", "bi-badge-vr-rtl", "bi-badge-vr-solid", "bi-bank",
        "bi-bank2", "bi-bar-chart", "bi-bar-chart-fill", "bi-bar-chart-line", "bi-bar-chart-steps",
        "bi-bar-chart-steps-alt", "bi-barcode", "bi-barcode-fill", "bi-barcode-scan", "bi-barcode-scan-fill",
        "bi-bar-chart-line-fill", "bi-basket", "bi-basket-fill", "bi-basket2", "bi-basket3", "bi-basket3-fill",
        "bi-basket2-fill", "bi-basket-fill", "bi-battery", "bi-battery-charging", "bi-battery-full",
        "bi-battery-half", "bi-bell", "bi-bell-fill", "bi-bell-slash", "bi-bell-slash-fill", "bi-bezier",
        "bi-bezier2", "bi-bicycle", "bi-binoculars", "bi-blockquote-left", "bi-blockquote-right", "bi-book",
        "bi-book-fill", "bi-book-half", "bi-bookmark", "bi-bookmark-check", "bi-bookmark-check-fill",
        "bi-bookmark-dash", "bi-bookmark-dash-fill", "bi-bookmark-fill", "bi-bookmark-heart",
        "bi-bookmark-heart-fill", "bi-bookmark-minus", "bi-bookmark-minus-fill", "bi-bookmark-plus",
        "bi-bookmark-plus-fill", "bi-bookmark-star", "bi-bookmark-star-fill", "bi-bookmark-x", "bi-bookmark-x-fill",
        "bi-bookmarks", "bi-bookmarks-fill", "bi-bookshelf", "bi-bootstrap", "bi-bootstrap-fill",
        "bi-bootstrap-reboot", "bi-bootstrap-reboot-fill", "bi-border", "bi-border-all", "bi-border-bottom",
        "bi-border-center", "bi-border-inner", "bi-border-left", "bi-border-middle", "bi-border-outer",
        "bi-border-right", "bi-border-style", "bi-border-top", "bi-box", "bi-box-arrow-down",
        "bi-box-arrow-down-left", "bi-box-arrow-down-right", "bi-box-arrow-in-down", "bi-box-arrow-in-down-left",
        "bi-box-arrow-in-down-right", "bi-box-arrow-in-left", "bi-box-arrow-in-right", "bi-box-arrow-in-up",
        "bi-box-arrow-in-up-left", "bi-box-arrow-in-up-right", "bi-box-arrow-left", "bi-box-arrow-right",
        "bi-box-arrow-up", "bi-box-arrow-up-left", "bi-box-arrow-up-right", "bi-box-seam", "bi-braces", "bi-bricks",
        "bi-briefcase", "bi-briefcase-fill", "bi-brightness-alt-high", "bi-brightness-alt-high-fill",
        "bi-brightness-alt-low", "bi-brightness-alt-low-fill", "bi-brightness-high", "bi-brightness-high-fill",
        "bi-brightness-low", "bi-brightness-low-fill", "bi-broadcast", "bi-broadcast-pin", "bi-broadcast-pin-fill",
        "bi-brush", "bi-bug", "bi-bug-fill", "bi-building", "bi-bullseye", "bi-calculator", "bi-calendar",
        "bi-calendar-check", "bi-calendar-check-fill", "bi-calendar-date", "bi-calendar-date-fill",
        "bi-calendar-day", "bi-calendar-day-fill", "bi-calendar-event", "bi-calendar-event-fill",
        "bi-calendar-fill", "bi-calendar-minus", "bi-calendar-minus-fill", "bi-calendar-month",
        "bi-calendar-month-fill", "bi-calendar-plus", "bi-calendar-plus-fill", "bi-calendar-range",
        "bi-calendar-range-fill", "bi-calendar-week", "bi-calendar-week-fill", "bi-calendar-x",
        "bi-calendar-x-fill", "bi-calendar2", "bi-calendar2-check", "bi-calendar2-check-fill", "bi-calendar2-date",
        "bi-calendar2-date-fill", "bi-calendar2-day", "bi-calendar2-day-fill", "bi-calendar2-event",
        "bi-calendar2-event-fill", "bi-calendar2-fill", "bi-calendar2-minus", "bi-calendar2-minus-fill",
        "bi-calendar2-month", "bi-calendar2-month-fill", "bi-calendar2-plus", "bi-calendar2-plus-fill",
        "bi-calendar2-range", "bi-calendar2-range-fill", "bi-calendar2-week", "bi-calendar2-week-fill",
        "bi-calendar2-x", "bi-calendar2-x-fill", "bi-calendar3", "bi-calendar3-event", "bi-calendar3-event-fill",
        "bi-calendar3-fill", "bi-calendar3-range", "bi-calendar3-range-fill", "bi-calendar3-week",
        "bi-calendar3-week-fill", "bi-calendar4", "bi-camera", "bi-camera-fill", "bi-camera-reels",
        "bi-camera-reels-fill", "bi-camera-video", "bi-camera-video-fill", "bi-camera-video-off",
        "bi-camera-video-off-fill", "bi-camera-video-reverse", "bi-camera-video-reverse-fill",
        "bi-camera-video-reverse-off", "bi-camera-video-reverse-off-fill", "bi-camera-video-rewind",
        "bi-camera-video-rewind-fill", "bi-camera-video-rewind-off", "bi-camera-video-rewind-off-fill",
        "bi-camera-video-split", "bi-camera-video-split-fill", "bi-camera-video-switch",
        "bi-camera-video-switch-fill", "bi-camera2", "bi-camera2-fill", "bi-capslock", "bi-capslock-fill",
        "bi-card-checklist", "bi-card-checklist-fill", "bi-card-heading", "bi-card-heading-fill", "bi-card-image",
        "bi-card-image-fill", "bi-card-list", "bi-card-list-fill", "bi-card-text", "bi-card-text-fill",
        "bi-caret-down", "bi-caret-down-fill", "bi-caret-down-square", "bi-caret-down-square-fill", "bi-caret-left",
        "bi-caret-left-fill", "bi-caret-left-square", "bi-caret-left-square-fill", "bi-caret-right",
        "bi-caret-right-fill", "bi-caret-right-square", "bi-caret-right-square-fill", "bi-caret-up",
        "bi-caret-up-fill", "bi-caret-up-square", "bi-caret-up-square-fill", "bi-cart", "bi-cart-check",
        "bi-cart-check-fill", "bi-cart-dash", "bi-cart-dash-fill", "bi-cart-fill", "bi-cart-plus",
        "bi-cart-plus-fill", "bi-cart-x", "bi-cart-x-fill", "bi-cart2", "bi-cart3", "bi-cart4", "bi-cart4-check",
        "bi-cart4-check-fill", "bi-cart4-dash", "bi-cart4-dash-fill", "bi-cart4-fill", "bi-cart4-plus",
        "bi-cart4-plus-fill", "bi-cart4-x", "bi-cart4-x-fill", "bi-cart5", "bi-cart5-fill", "bi-cast", "bi-chat",
        "bi-chat-dots", "bi-chat-dots-fill", "bi-chat-fill", "bi-chat-left", "bi-chat-left-dots",
        "bi-chat-left-dots-fill", "bi-chat-left-fill", "bi-chat-left-quote", "bi-chat-left-quote-fill",
        "bi-chat-left-text", "bi-chat-left-text-fill", "bi-chat-quote", "bi-chat-quote-fill", "bi-chat-right",
        "bi-chat-right-dots", "bi-chat-right-dots-fill", "bi-chat-right-fill", "bi-chat-right-quote",
        "bi-chat-right-quote-fill", "bi-chat-right-text", "bi-chat-right-text-fill", "bi-chat-square",
        "bi-chat-square-dots", "bi-chat-square-dots-fill", "bi-chat-square-fill", "bi-chat-square-quote",
        "bi-chat-square-quote-fill", "bi-chat-square-text", "bi-chat-square-text-fill", "bi-chat-text",
        "bi-chat-text-fill", "bi-check", "bi-check2", "bi-check2-all", "bi-check2-circle", "bi-check2-circle-fill",
        "bi-check2-square", "bi-check2-square-fill", "bi-check-all", "bi-check-circle", "bi-check-circle-fill",
        "bi-check-square", "bi-check-square-fill", "bi-chevron-bar-contract", "bi-chevron-bar-down",
        "bi-chevron-bar-expand", "bi-chevron-bar-left", "bi-chevron-bar-right", "bi-chevron-bar-up",
        "bi-chevron-compact-down", "bi-chevron-compact-left", "bi-chevron-compact-right", "bi-chevron-compact-up",
        "bi-chevron-contract", "bi-chevron-double-down", "bi-chevron-double-left", "bi-chevron-double-right",
        "bi-chevron-double-up", "bi-chevron-down", "bi-chevron-expand", "bi-chevron-left", "bi-chevron-right",
        "bi-chevron-up", "bi-circle", "bi-circle-fill", "bi-circle-half", "bi-circular-left", "bi-circular-right",
        "bi-clipboard", "bi-clipboard-check", "bi-clipboard-data", "bi-clipboard-minus", "bi-clipboard-plus",
        "bi-clipboard-x", "bi-clock", "bi-clock-fill", "bi-clock-history", "bi-cloud", "bi-cloud-arrow-down",
        "bi-cloud-arrow-down-fill", "bi-cloud-arrow-up", "bi-cloud-arrow-up-fill", "bi-cloud-check",
        "bi-cloud-check-fill", "bi-cloud-download", "bi-cloud-download-fill", "bi-cloud-drizzle",
        "bi-cloud-drizzle-fill", "bi-cloud-fill", "bi-cloud-fog", "bi-cloud-fog-fill", "bi-cloud-hail",
        "bi-cloud-hail-fill", "bi-cloud-haze", "bi-cloud-haze-1", "bi-cloud-haze-2", "bi-cloud-haze-fill",
        "bi-cloud-haze-fill-1", "bi-cloud-haze-fill-2", "bi-cloud-lightning", "bi-cloud-lightning-fill",
        "bi-cloud-minus", "bi-cloud-minus-fill", "bi-cloud-minus-fill-1", "bi-cloud-minus-fill-2", "bi-cloud-moon",
        "bi-cloud-moon-fill", "bi-cloud-plus", "bi-cloud-plus-fill", "bi-cloud-plus-fill-1", "bi-cloud-plus-fill-2",
        "bi-cloud-rain", "bi-cloud-rain-fill", "bi-cloud-rain-heavy", "bi-cloud-rain-heavy-fill", "bi-cloud-slash",
        "bi-cloud-slash-fill", "bi-cloud-sleet", "bi-cloud-sleet-fill", "bi-cloud-snow", "bi-cloud-snow-fill",
        "bi-cloud-sun", "bi-cloud-sun-fill", "bi-cloud-upload", "bi-cloud-upload-fill", "bi-clouds",
        "bi-clouds-fill", "bi-cloudy", "bi-cloudy-fill", "bi-code", "bi-code-slash", "bi-code-square",
        "bi-collection", "bi-collection-fill", "bi-collection-play", "bi-collection-play-fill", "bi-columns",
        "bi-columns-gap", "bi-comma", "bi-comma-fill", "bi-command", "bi-compass", "bi-compass-fill", "bi-cone",
        "bi-cone-striped", "bi-controller", "bi-credit-card", "bi-credit-card-2-back", "bi-credit-card-2-back-fill",
        "bi-credit-card-2-front", "bi-credit-card-2-front-fill", "bi-credit-card-fill", "bi-crop", "bi-cup",
        "bi-cup-fill", "bi-cup-straw", "bi-currency-bitcoin", "bi-currency-dollar", "bi-currency-euro",
        "bi-currency-exchange", "bi-currency-pound", "bi-currency-yen", "bi-cursor", "bi-cursor-fill", "bi-dash",
        "bi-dash-circle", "bi-dash-circle-fill", "bi-dash-square", "bi-dash-square-fill", "bi-diamond",
        "bi-diamond-fill", "bi-diamond-half", "bi-dice-1", "bi-dice-1-fill", "bi-dice-2", "bi-dice-2-fill",
        "bi-dice-3", "bi-dice-3-fill", "bi-dice-4", "bi-dice-4-fill", "bi-dice-5", "bi-dice-5-fill", "bi-dice-6",
        "bi-dice-6-fill", "bi-disc", "bi-disc-fill", "bi-discord", "bi-display", "bi-display-fill",
        "bi-distribute-horizontal", "bi-distribute-vertical", "bi-door-closed", "bi-door-closed-fill",
        "bi-door-open", "bi-door-open-fill", "bi-dot", "bi-download", "bi-droplet", "bi-droplet-fill",
        "bi-droplet-half", "bi-earbuds", "bi-earbuds-fill", "bi-easel", "bi-easel-fill", "bi-egg", "bi-egg-fill",
        "bi-egg-fried", "bi-eject", "bi-eject-fill", "bi-envelope", "bi-envelope-fill", "bi-envelope-open",
        "bi-envelope-open-fill", "bi-equal", "bi-equal-circle", "bi-equal-circle-fill", "bi-equal-square",
        "bi-equal-square-fill", "bi-eraser", "bi-eraser-fill", "bi-exclamation", "bi-exclamation-circle",
        "bi-exclamation-circle-fill", "bi-exclamation-diamond", "bi-exclamation-diamond-fill",
        "bi-exclamation-octagon", "bi-exclamation-octagon-fill", "bi-exclamation-square",
        "bi-exclamation-square-fill", "bi-exclude", "bi-eye", "bi-eye-fill", "bi-eye-slash", "bi-eye-slash-fill",
        "bi-eyedropper", "bi-eyedropper-variant", "bi-facebook", "bi-file", "bi-file-arrow-down",
        "bi-file-arrow-down-fill", "bi-file-arrow-up", "bi-file-arrow-up-fill", "bi-file-bar-graph",
        "bi-file-bar-graph-fill", "bi-file-binary", "bi-file-binary-fill", "bi-file-break", "bi-file-break-fill",
        "bi-file-check", "bi-file-check-fill", "bi-file-code", "bi-file-code-fill", "bi-file-diff",
        "bi-file-diff-fill", "bi-file-earmark", "bi-file-earmark-arrow-down", "bi-file-earmark-arrow-down-fill",
        "bi-file-earmark-arrow-up", "bi-file-earmark-arrow-up-fill", "bi-file-earmark-bar-graph",
        "bi-file-earmark-bar-graph-fill", "bi-file-earmark-binary", "bi-file-earmark-binary-fill",
        "bi-file-earmark-break", "bi-file-earmark-break-fill", "bi-file-earmark-check",
        "bi-file-earmark-check-fill", "bi-file-earmark-code", "bi-file-earmark-code-fill", "bi-file-earmark-diff",
        "bi-file-earmark-diff-fill", "bi-file-earmark-excel", "bi-file-earmark-excel-fill", "bi-file-earmark-fill",
        "bi-file-earmark-font", "bi-file-earmark-font-fill", "bi-file-earmark-image", "bi-file-earmark-image-fill",
        "bi-file-earmark-lock", "bi-file-earmark-lock-fill", "bi-file-earmark-lock2", "bi-file-earmark-lock2-fill",
        "bi-file-earmark-medical", "bi-file-earmark-medical-fill", "bi-file-earmark-minus",
        "bi-file-earmark-minus-fill", "bi-file-earmark-minus2", "bi-file-earmark-minus2-fill",
        "bi-file-earmark-music", "bi-file-earmark-music-fill", "bi-file-earmark-pdf", "bi-file-earmark-pdf-fill",
        "bi-file-earmark-person", "bi-file-earmark-person-fill", "bi-file-earmark-play",
        "bi-file-earmark-play-fill", "bi-file-earmark-plus", "bi-file-earmark-plus-fill", "bi-file-earmark-plus2",
        "bi-file-earmark-plus2-fill", "bi-file-earmark-post", "bi-file-earmark-post-fill", "bi-file-earmark-ppt",
        "bi-file-earmark-ppt-fill", "bi-file-earmark-richtext", "bi-file-earmark-richtext-fill",
        "bi-file-earmark-ruled", "bi-file-earmark-ruled-fill", "bi-file-earmark-slides",
        "bi-file-earmark-slides-fill", "bi-file-earmark-spreadsheet", "bi-file-earmark-spreadsheet-fill",
        "bi-file-earmark-text", "bi-file-earmark-text-fill", "bi-file-earmark-word", "bi-file-earmark-word-fill",
        "bi-file-earmark-x", "bi-file-earmark-x-fill", "bi-file-earmark-x2", "bi-file-earmark-x2-fill",
        "bi-file-earmark-zip", "bi-file-earmark-zip-fill", "bi-file-easel", "bi-file-easel-fill", "bi-file-excel",
        "bi-file-excel-fill", "bi-file-fill", "bi-file-font", "bi-file-font-fill", "bi-file-image",
        "bi-file-image-fill", "bi-file-lock", "bi-file-lock-fill", "bi-file-lock2", "bi-file-lock2-fill",
        "bi-file-medical", "bi-file-medical-fill", "bi-file-minus", "bi-file-minus-fill", "bi-file-minus2",
        "bi-file-minus2-fill", "bi-file-music", "bi-file-music-fill", "bi-file-pdf", "bi-file-pdf-fill",
        "bi-file-person", "bi-file-person-fill", "bi-file-play", "bi-file-play-fill", "bi-file-plus",
        "bi-file-plus-fill", "bi-file-plus2", "bi-file-plus2-fill", "bi-file-post", "bi-file-post-fill",
        "bi-file-ppt", "bi-file-ppt-fill", "bi-file-richtext", "bi-file-richtext-fill", "bi-file-ruled",
        "bi-file-ruled-fill", "bi-file-slides", "bi-file-slides-fill", "bi-file-spreadsheet",
        "bi-file-spreadsheet-fill", "bi-file-text", "bi-file-text-fill", "bi-file-word", "bi-file-word-fill",
        "bi-file-x", "bi-file-x-fill", "bi-file-x2", "bi-file-x2-fill", "bi-file-zip", "bi-file-zip-fill",
        "bi-files", "bi-files-alt", "bi-film", "bi-filter", "bi-filter-circle", "bi-filter-circle-fill",
        "bi-filter-left", "bi-filter-right", "bi-flag", "bi-flag-fill", "bi-flower", "bi-folder", "bi-folder-check",
        "bi-folder-fill", "bi-folder-minus", "bi-folder-plus", "bi-folder-symlink", "bi-folder-symlink-fill",
        "bi-folder-symlink-2", "bi-folder-symlink-2-fill", "bi-folder-x", "bi-folder-x-fill", "bi-folder2",
        "bi-folder2-open", "bi-fonts", "bi-fonts-slash", "bi-forward", "bi-front", "bi-fullscreen",
        "bi-fullscreen-exit", "bi-funnel", "bi-funnel-fill", "bi-gear", "bi-gear-fill", "bi-gem", "bi-gem-fill",
        "bi-gender-ambiguous", "bi-gender-ambiguous-fill", "bi-gender-female", "bi-gender-female-fill",
        "bi-gender-male", "bi-gender-male-fill", "bi-gender-trans", "bi-gender-trans-fill", "bi-geo", "bi-geo-alt",
        "bi-geo-alt-fill", "bi-geo-fill", "bi-gift", "bi-gift-fill", "bi-github", "bi-globe", "bi-globe2",
        "bi-google", "bi-graph-down", "bi-graph-up", "bi-grid", "bi-grid-1x2", "bi-grid-1x2-fill", "bi-grid-3x2",
        "bi-grid-3x2-gap", "bi-grid-3x2-gap-fill", "bi-grid-3x2-fill", "bi-grid-3x3", "bi-grid-3x3-gap",
        "bi-grid-3x3-gap-fill", "bi-grid-3x3-fill", "bi-grid-fill", "bi-grip-horizontal", "bi-grip-horizontal-fill",
        "bi-grip-vertical", "bi-grip-vertical-fill", "bi-hammer", "bi-hand-index", "bi-hand-index-fill",
        "bi-hand-index-thumb", "bi-hand-index-thumb-fill", "bi-hand-thumbs-down", "bi-hand-thumbs-down-fill",
        "bi-hand-thumbs-up", "bi-hand-thumbs-up-fill", "bi-handbag", "bi-handbag-fill", "bi-hdd", "bi-hdd-fill",
        "bi-hdd-network", "bi-hdd-network-fill", "bi-hdd-rack", "bi-hdd-rack-fill", "bi-hdd-stack",
        "bi-hdd-stack-fill", "bi-headphones", "bi-headphones-vr", "bi-heart", "bi-heart-fill", "bi-heart-half",
        "bi-heptagon", "bi-heptagon-fill", "bi-heptagon-half", "bi-heptagon-minus", "bi-heptagon-minus-fill",
        "bi-heptagon-plus", "bi-heptagon-plus-fill", "bi-heptagon-x", "bi-heptagon-x-fill", "bi-hexagon",
        "bi-hexagon-fill", "bi-hexagon-half", "bi-hexagon-minus", "bi-hexagon-minus-fill", "bi-hexagon-plus",
        "bi-hexagon-plus-fill", "bi-hexagon-x", "bi-hexagon-x-fill", "bi-hourglass", "bi-hourglass-bottom",
        "bi-hourglass-bottom-half", "bi-hourglass-split", "bi-hourglass-top", "bi-hourglass-top-half", "bi-house",
        "bi-house-fill", "bi-hr", "bi-hr-square", "bi-humidity", "bi-humidity-fill", "bi-hurricane", "bi-image",
        "bi-image-alt", "bi-image-fill", "bi-images", "bi-images-alt", "bi-inbox", "bi-inboxes", "bi-inboxes-fill",
        "bi-info", "bi-info-circle", "bi-info-circle-fill", "bi-info-square", "bi-info-square-fill",
        "bi-input-cursor", "bi-input-cursor-text", "bi-instagram", "bi-intersect", "bi-journal", "bi-journal-album",
        "bi-journal-arrow-down", "bi-journal-arrow-down-fill", "bi-journal-arrow-up", "bi-journal-arrow-up-fill",
        "bi-journal-bookmark", "bi-journal-bookmark-fill", "bi-journal-check", "bi-journal-check-fill",
        "bi-journal-code", "bi-journal-code-fill", "bi-journal-medical", "bi-journal-medical-fill",
        "bi-journal-minus", "bi-journal-minus-fill", "bi-journal-plus", "bi-journal-plus-fill",
        "bi-journal-richtext", "bi-journal-richtext-fill", "bi-journal-text", "bi-journal-text-fill",
        "bi-journal-x", "bi-journal-x-fill", "bi-journals", "bi-journals-bookmark", "bi-journals-bookmark-fill",
        "bi-journals-fill", "bi-kettle", "bi-key", "bi-key-fill", "bi-keyboard", "bi-keyboard-fill",
        "bi-keyboard-hide", "bi-keyboard-show", "bi-ladder", "bi-lamp", "bi-laptop", "bi-laptop-fill", "bi-layer",
        "bi-layers", "bi-layers-fill", "bi-layers-half", "bi-layout", "bi-layout-sidebar",
        "bi-layout-sidebar-inset", "bi-layout-sidebar-inset-reverse", "bi-layout-sidebar-reverse",
        "bi-layout-sidebar-right", "bi-layout-sidebar-right-fill", "bi-layout-split", "bi-layout-text-sidebar",
        "bi-layout-text-sidebar-reverse", "bi-layout-text-window", "bi-layout-three-columns", "bi-layout-wtf",
        "bi-life-preserver", "bi-lightbulb", "bi-lightbulb-fill", "bi-lightning", "bi-lightning-charge",
        "bi-lightning-charge-fill", "bi-lightning-fill", "bi-lightning-slash", "bi-lightning-slash-fill", "bi-line",
        "bi-line-dashed", "bi-link", "bi-link-45deg", "bi-link-45deg-fill", "bi-link-90deg", "bi-link-90deg-fill",
        "bi-link-bold", "bi-link-break", "bi-linkedin", "bi-list", "bi-list-check", "bi-list-nested", "bi-list-ol",
        "bi-list-stars", "bi-list-task", "bi-list-ul", "bi-lock", "bi-lock-fill", "bi-lock-open",
        "bi-lock-open-fill", "bi-mailbox", "bi-mailbox2", "bi-map", "bi-map-fill", "bi-markdown",
        "bi-markdown-fill", "bi-mask", "bi-mask-fill", "bi-megaphone", "bi-megaphone-fill", "bi-menu-app",
        "bi-menu-app-fill", "bi-menu-button", "bi-menu-button-fill", "bi-menu-button-wide",
        "bi-menu-button-wide-fill", "bi-menu-down", "bi-menu-down-fill", "bi-menu-up", "bi-menu-up-fill", "bi-mic",
        "bi-mic-fill", "bi-mic-mute", "bi-mic-mute-fill", "bi-minecart", "bi-minecart-loaded",
        "bi-minecart-loaded-fill", "bi-minecart-simple", "bi-minecart-simple-fill", "bi-moisture",
        "bi-moisture-fill", "bi-moon", "bi-moon-fill", "bi-moon-stars", "bi-moon-stars-fill", "bi-mouse",
        "bi-mouse-fill", "bi-mouse2", "bi-mouse2-fill", "bi-mouse3", "bi-mouse3-fill", "bi-music-note",
        "bi-music-note-beamed", "bi-music-note-list", "bi-music-player", "bi-music-player-fill", "bi-newspaper",
        "bi-newspaper-fill", "bi-node-minus", "bi-node-minus-fill", "bi-node-plus", "bi-node-plus-fill",
        "bi-notifications", "bi-notifications-fill", "bi-notifications-off", "bi-notifications-off-fill",
        "bi-octagon", "bi-octagon-fill", "bi-octagon-half", "bi-option", "bi-outlet", "bi-paint-bucket",
        "bi-paint-bucket-fill", "bi-paint-roller", "bi-palette", "bi-palette-fill", "bi-palette2",
        "bi-palette2-fill", "bi-paperclip", "bi-parachute", "bi-patch-check", "bi-patch-check-fill",
        "bi-patch-exclamation", "bi-patch-exclamation-fill", "bi-patch-minus", "bi-patch-minus-fill",
        "bi-patch-plus", "bi-patch-plus-fill", "bi-patch-question", "bi-patch-question-fill", "bi-pause",
        "bi-pause-fill", "bi-pause-btn", "bi-pause-circle", "bi-pause-circle-fill", "bi-pause-circle-fill-btn",
        "bi-pause-circle-btn", "bi-pause-fill-btn", "bi-peace", "bi-pen", "bi-pen-fill", "bi-pencil",
        "bi-pencil-fill", "bi-pencil-square", "bi-pencil-square-fill", "bi-pentagon", "bi-pentagon-fill",
        "bi-pentagon-half", "bi-percent", "bi-person", "bi-person-badge", "bi-person-badge-fill",
        "bi-person-bounding-box", "bi-person-bounding-box-fill", "bi-person-check", "bi-person-check-fill",
        "bi-person-circle", "bi-person-circle-fill", "bi-person-dash", "bi-person-dash-fill", "bi-person-fill",
        "bi-person-lines-fill", "bi-person-plus", "bi-person-plus-fill", "bi-person-square",
        "bi-person-square-fill", "bi-phone", "bi-phone-fill", "bi-phone-landscape", "bi-phone-landscape-fill",
        "bi-phone-vibrate", "bi-phone-vibrate-fill", "bi-pie-chart", "bi-pie-chart-fill", "bi-pin", "bi-pin-angle",
        "bi-pin-angle-fill", "bi-pin-fill", "bi-pip", "bi-pip-fill", "bi-play", "bi-play-btn", "bi-play-btn-fill",
        "bi-play-circle", "bi-play-circle-fill", "bi-play-fill", "bi-play-fill-btn", "bi-plug", "bi-plug-fill",
        "bi-plus", "bi-plus-circle", "bi-plus-circle-dotted", "bi-plus-circle-dotted-fill", "bi-plus-circle-fill",
        "bi-plus-lg", "bi-plus-square", "bi-plus-square-dotted", "bi-plus-square-dotted-fill",
        "bi-plus-square-fill", "bi-power", "bi-printer", "bi-printer-fill", "bi-puzzle", "bi-puzzle-fill",
        "bi-question", "bi-question-circle", "bi-question-circle-fill", "bi-question-diamond",
        "bi-question-diamond-fill", "bi-question-lg", "bi-question-octagon", "bi-question-octagon-fill",
        "bi-question-square", "bi-question-square-fill", "bi-rainbow", "bi-raindrops", "bi-receipt",
        "bi-receipt-cutoff", "bi-receipt-cutoff-fill", "bi-receipt-fill", "bi-reception-0", "bi-reception-1",
        "bi-reception-2", "bi-reception-3", "bi-reception-4", "bi-record", "bi-record-btn", "bi-record-btn-fill",
        "bi-record-circle", "bi-record-circle-fill", "bi-record-fill", "bi-record2", "bi-record2-fill",
        "bi-recycle", "bi-recycle-fill", "bi-reddit", "bi-reply", "bi-reply-all", "bi-reply-all-fill",
        "bi-reply-fill", "bi-rss", "bi-rss-fill", "bi-rulers", "bi-safe", "bi-safe-fill", "bi-safe2",
        "bi-safe2-fill", "bi-save", "bi-save-fill", "bi-save2", "bi-save2-fill", "bi-scissors", "bi-screwdriver",
        "bi-screwdriver-fill", "bi-sd-card", "bi-sd-card-fill", "bi-search", "bi-search-fill", "bi-segmented-nav",
        "bi-server", "bi-share", "bi-share-fill", "bi-shield", "bi-shield-check", "bi-shield-check-fill",
        "bi-shield-exclamation", "bi-shield-exclamation-fill", "bi-shield-fill", "bi-shield-lock",
        "bi-shield-lock-fill", "bi-shield-minus", "bi-shield-minus-fill", "bi-shield-plus", "bi-shield-plus-fill",
        "bi-shield-shaded", "bi-shield-shaded-fill", "bi-shield-slash", "bi-shield-slash-fill", "bi-shield-x",
        "bi-shield-x-fill", "bi-shift", "bi-shift-fill", "bi-shop", "bi-shop-window", "bi-shuffle", "bi-signpost",
        "bi-signpost-2", "bi-signpost-2-fill", "bi-signpost-fill", "bi-sim", "bi-sim-fill", "bi-skip-backward",
        "bi-skip-backward-btn", "bi-skip-backward-btn-fill", "bi-skip-backward-circle",
        "bi-skip-backward-circle-fill", "bi-skip-backward-fill", "bi-skip-end", "bi-skip-end-btn",
        "bi-skip-end-btn-fill", "bi-skip-end-circle", "bi-skip-end-circle-fill", "bi-skip-end-fill",
        "bi-skip-forward", "bi-skip-forward-btn", "bi-skip-forward-btn-fill", "bi-skip-forward-circle",
        "bi-skip-forward-circle-fill", "bi-skip-forward-fill", "bi-skype", "bi-slack", "bi-slack-square",
        "bi-slack-square-fill", "bi-sliders", "bi-sliders-fill", "bi-smartwatch", "bi-snow", "bi-snow2", "bi-snow3",
        "bi-sort-alpha-down", "bi-sort-alpha-down-alt", "bi-sort-alpha-up", "bi-sort-alpha-up-alt", "bi-sort-down",
        "bi-sort-down-alt", "bi-sort-numeric-down", "bi-sort-numeric-down-alt", "bi-sort-numeric-up",
        "bi-sort-numeric-up-alt", "bi-sort-up", "bi-sort-up-alt", "bi-soundwave", "bi-speaker", "bi-speaker-fill",
        "bi-speedometer", "bi-speedometer-fill", "bi-speedometer2", "bi-speedometer2-fill", "bi-spellcheck",
        "bi-square", "bi-square-fill", "bi-square-half", "bi-stack", "bi-star", "bi-star-fill", "bi-star-half",
        "bi-star-half-fill", "bi-stars", "bi-stickies", "bi-stickies-fill", "bi-sticky", "bi-sticky-fill",
        "bi-stop", "bi-stop-btn", "bi-stop-btn-fill", "bi-stop-circle", "bi-stop-circle-fill", "bi-stop-fill",
        "bi-stoplights", "bi-stoplights-fill", "bi-stopwatch", "bi-stopwatch-fill", "bi-strikethrough",
        "bi-subtract", "bi-suit-club", "bi-suit-club-fill", "bi-suit-diamond", "bi-suit-diamond-fill",
        "bi-suit-heart", "bi-suit-heart-fill", "bi-suit-spade", "bi-suit-spade-fill", "bi-sun", "bi-sun-fill",
        "bi-sunglasses", "bi-table", "bi-tablet", "bi-tablet-fill", "bi-tablet-landscape",
        "bi-tablet-landscape-fill", "bi-tag", "bi-tag-fill", "bi-tags", "bi-tags-fill", "bi-telegram",
        "bi-telephone", "bi-telephone-fill", "bi-telephone-forward", "bi-telephone-forward-fill",
        "bi-telephone-inbound", "bi-telephone-inbound-fill", "bi-telephone-minus", "bi-telephone-minus-fill",
        "bi-telephone-outbound", "bi-telephone-outbound-fill", "bi-telephone-plus", "bi-telephone-plus-fill",
        "bi-telephone-x", "bi-telephone-x-fill", "bi-terminal", "bi-terminal-fill", "bi-thermometer",
        "bi-thermometer-half", "bi-thermometer-high", "bi-thermometer-low", "bi-thermometer-snow",
        "bi-thermometer-sun", "bi-three-dots", "bi-three-dots-vertical", "bi-ticket", "bi-ticket-fill",
        "bi-toggles", "bi-toggles-fill", "bi-toggles2", "bi-toggles2-fill", "bi-tools", "bi-tools-alt",
        "bi-tornado", "bi-train", "bi-train-fill", "bi-triangle", "bi-triangle-fill", "bi-triangle-half",
        "bi-trophy", "bi-trophy-fill", "bi-tropical-storm", "bi-tv", "bi-tv-fill", "bi-twitch", "bi-twitter",
        "bi-type", "bi-type-bold", "bi-type-h1", "bi-type-h2", "bi-type-h3", "bi-type-italic",
        "bi-type-strikethrough", "bi-type-underline", "bi-ui-checks", "bi-ui-checks-grid", "bi-ui-checks-grid-fill",
        "bi-umbrella", "bi-umbrella-fill", "bi-union", "bi-unlock", "bi-unlock-fill", "bi-upc", "bi-upc-scan",
        "bi-upc-scan-fill", "bi-upc-slash", "bi-upload", "bi-vector-pen", "bi-vector-pen-fill", "bi-view-list",
        "bi-view-stacked", "bi-voicemail", "bi-volume-down", "bi-volume-down-fill", "bi-volume-mute",
        "bi-volume-mute-fill", "bi-volume-off", "bi-volume-off-fill", "bi-volume-up", "bi-volume-up-fill", "bi-vr",
        "bi-wallet", "bi-wallet-fill", "bi-wallet2", "bi-watch", "bi-watch-fill", "bi-water", "bi-whatsapp",
        "bi-wifi", "bi-wifi-1", "bi-wifi-2", "bi-wifi-off", "bi-wifi-strength-1", "bi-wifi-strength-1-alert",
        "bi-wifi-strength-1-lock", "bi-wifi-strength-2", "bi-wifi-strength-2-alert", "bi-wifi-strength-2-lock",
        "bi-wifi-strength-3", "bi-wifi-strength-3-alert", "bi-wifi-strength-3-lock", "bi-wifi-strength-4",
        "bi-wifi-strength-4-alert", "bi-wifi-strength-4-lock", "bi-wifi-strength-alert-outline",
        "bi-wifi-strength-lock-outline", "bi-wifi-strength-off", "bi-wifi-strength-off-outline",
        "bi-wifi-strength-outline", "bi-wind", "bi-window", "bi-window-dock", "bi-window-sidebar", "bi-wrench",
        "bi-wrench-fill", "bi-x", "bi-x-circle", "bi-x-circle-fill", "bi-x-diamond", "bi-x-diamond-fill", "bi-x-lg",
        "bi-x-octagon", "bi-x-octagon-fill", "bi-x-square", "bi-x-square-fill", "bi-yin-yang"
    ]
</script>
