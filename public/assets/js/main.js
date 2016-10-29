$(document).ready(function(){

    var states = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        // `states` is an array of state names defined in "The Basics"
        local: ['abcd','aaa']
    });

    $('.typeahead').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        },
        {
            name: 'states',
            source: states
        });

});