//autocomplete using JQuery UI
//credit: Benjamin Clifford, Codecademy
$(function() {

    //
    // Add the code for selecting the #tags input and set the source
    // for the autocomplete to be 'availableTags' which are set in 
    // autocomplete-options.js
    $('#tags').autocomplete({
        source: availableTags
    });

})