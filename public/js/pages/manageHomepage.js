// Default options
IconPicker.Init({
    // Required: You have to set the path of IconPicker JSON file to "jsonUrl" option. e.g. '/content/plugins/IconPicker/dist/iconpicker-1.5.0.json'
    jsonUrl: '/plugins/fontawesome-iconpicker/iconpicker-1.5.0.json',
    // Optional: Change the buttons or search placeholder text according to the language.
    searchPlaceholder: 'Search Icon',
    showAllButton: 'Show All',
    cancelButton: 'Cancel',
    noResultsFound: 'No results found.', // v1.5.0 and the next versions
    borderRadius: '20px', // v1.5.0 and the next versions
});
// Select your Button element (ID or Class)
IconPicker.Run('#icon1');
IconPicker.Run('#icon2');
IconPicker.Run('#icon3');
IconPicker.Run('#icon4');
