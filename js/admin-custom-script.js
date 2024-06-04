jQuery(document).ready(function($) {
    // Ensure Select2 is loaded
    if (typeof $.fn.select2 === 'undefined') {
        return;
    }

    // Only execute if the citiesData is available
    if (typeof citiesData === 'undefined') {
        return;
    }

    // Function to create dropdown
    function createCityDropdown(cities, fieldName) {
        var cityDropdown = $('<select></select>').attr('name', fieldName).attr('id', fieldName).attr('class', 'select2');
        $.each(cities, function(index, city) {
            cityDropdown.append($('<option></option>').attr('value', city).text(city));
        });

        // Transform the dropdown into a searchable dropdown using Select2
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
                var cityDropdown = createCityDropdown(citiesData[initialCountry], fieldName);
                cityField.replaceWith(cityDropdown);
                cityField = $('#' + fieldName); // Update cityField to refer to the new dropdown
            }

            // Update city dropdown on country change
            countryField.on('change', function() {
                var selectedCountry = $(this).val();
                if (citiesData[selectedCountry]) {
                    var cityDropdown = createCityDropdown(citiesData[selectedCountry], fieldName);
                    cityField.replaceWith(cityDropdown);
                    cityField = $('#' + fieldName); // Update cityField to refer to the new dropdown
                } else {
                    var cityInput = $('<input>').attr('type', 'text').attr('name', fieldName).attr('id', fieldName);
                    cityField.replaceWith(cityInput);
                    cityField = $('#' + fieldName); // Update cityField to refer to the new input field
                }
            });
        }
    }

    // Billing city field
    replaceCityField($('#_billing_city_field input'), $('#_billing_country'), '_billing_city');

    // Shipping city field
    replaceCityField($('#_shipping_city_field input'), $('#_shipping_country'), '_shipping_city');
});
