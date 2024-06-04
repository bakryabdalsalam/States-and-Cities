jQuery(document).ready(function($) {
    // Only execute if the citiesData is available
    if (typeof citiesData === 'undefined') {
        return;
    }

    // Function to create dropdown
function createCityDropdown(cities, fieldName) {
    var cityDropdown = $('<select></select>').attr('name', fieldName).attr('id', fieldName);
    $.each(cities, function(index, city) {
        cityDropdown.append($('<option></option>').attr('value', city).text(city));
    });

    // Transform the dropdown into a searchable dropdown using select2
    cityDropdown.select2({
        placeholder: 'Select a city',
        allowClear: true
    });

    return cityDropdown;
}

    // Replace city input field with dropdown
    function replaceCityField(cityField, countryField, fieldName) {
        if (cityField.length > 0 && countryField.length > 0) {
            // Initial replacement
            var initialCountry = countryField.val();
            if (initialCountry && citiesData[initialCountry]) {
                cityField.replaceWith(createCityDropdown(citiesData[initialCountry], fieldName));
            }

            // Update city dropdown on country change
            countryField.on('change', function() {
                var selectedCountry = $(this).val();
                if (citiesData[selectedCountry]) {
                    cityField.replaceWith(createCityDropdown(citiesData[selectedCountry], fieldName));
                } else {
                    cityField.replaceWith('<input type="text" name="' + fieldName + '" id="' + fieldName + '" />');
                }
            });
        }
    }

    // Billing city field
    replaceCityField($('#_billing_city'), $('#_billing_country'), '_billing_city');

    // Shipping city field
    replaceCityField($('#_shipping_city'), $('#_shipping_country'), '_shipping_city');
});
