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

        // Initialize Select2 on the dropdown
        cityDropdown.select2();

        return cityDropdown;
    }

    function replaceCityField(cityField, countryField, fieldName) {
        if (cityField.length > 0 && countryField.length > 0) {
            // Get the current city
            var currentCity = cityField.val();
    
            // Initial replacement
            var initialCountry = countryField.val();
            if (initialCountry && citiesData[initialCountry]) {
                cityField.replaceWith(createCityDropdown(citiesData[initialCountry], fieldName));
                cityField = $('select#' + fieldName); // Update the reference to the city field
    
                // Set the value of the dropdown to the current city
                cityField.val(currentCity);
    
                // Initialize Select2 on the dropdown
                cityField.select2();
            }
    
            // Update city dropdown on country change
            countryField.on('change', function() {
                var selectedCountry = $(this).val();
                if (citiesData[selectedCountry]) {
                    cityField.replaceWith(createCityDropdown(citiesData[selectedCountry], fieldName));
                    cityField = $('select#' + fieldName); // Update the reference to the city field
    
                    // Initialize Select2 on the dropdown
                    cityField.select2();
                } else {
                    cityField.replaceWith('<input type="text" name="' + fieldName + '" id="' + fieldName + '" />');
                    cityField = $('input#' + fieldName); // Update the reference to the city field
                }
            });
        }
    }
    // Billing city field
    replaceCityField($('#_billing_city'), $('#_billing_country'), '_billing_city');

    // Shipping city field
    replaceCityField($('#_shipping_city'), $('#_shipping_country'), '_shipping_city');
});